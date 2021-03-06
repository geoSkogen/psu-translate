<?php
/**
 * Copyright 2017 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require __DIR__ . '/quickstart.php';
//header("Access-Control-Allow-Origin: *");
define('SERVICE_ID','psu-translate-337220');
define('KEY_SLUG','-434fbc1ed320');
define('KEY_PATH','');
//
$illegal_methods = ['PUT','PATCH','DELETE'];
if (in_array($_SERVER['REQUEST_METHOD'],$illegal_methods)) {
  die(json_encode(['error'=>'invalid HTTP request']));
}

if (isset($_SERVER['HTTP_ORIGIN'])) {
  // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
  // you want to allow, and if so:
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  header('Access-Control-Allow-Credentials: true');
  header('Access-Control-Max-Age: 86400');    // cache for 1 day
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
}
//create and configure the translation clients
$translate = auth_cloud_translate_explicit(
  SERVICE_ID,
  KEY_PATH . SERVICE_ID . KEY_SLUG .'.json'
);
$service = auth_cloud_translate_service_explicit(
  SERVICE_ID,
  KEY_PATH . SERVICE_ID . KEY_SLUG .'.json'
);
$formattedParent = $service->locationName(SERVICE_ID, 'global');
//
$err_msg = '';
$err = false;
$lang = '';
$content_arr = [];
$api_resp = [];
// build an API response

switch($_SERVER['REQUEST_METHOD']) {

  case 'GET' :

  if ( !empty($_GET) ) {
    if (empty($_GET['lang'])) {
      $err_msg .= 'translator-error: no language is specified; ';
      $err = true;
    } else {
      $lang = $_GET['lang'];
    }
    if (!empty($_GET['content_0']) && !$err) {
      // create indexed array if query formatting contains integer suffixes
      $index = 0;
      while (!empty($_GET['content_'.strval($index)])) {
        $content_arr[] = $_GET['content_'.strval($index)];
        $index++;
      }
    } else if (!empty($_GET['content']) && !$err) {
      //
      $content_arr = [ $_GET['content'] ];
    } else {
      $err_msg .= (empty($_GET['lang'])) ?
        '' : 'translator-error: no content was submitted; ';
      $err = true;
    }
  } else {
    $err_msg .= 'translator-error: no operands were sent; ';
    $err = true;
  }
  break;

  case 'POST' :

  $data = json_decode(file_get_contents("php://input"),true);
  //error_log(print_r($data, true));
  if (!is_array($data)) {
    $err = true;
    $err_msg .= 'translator-error: no input strings were sent';
  } else if (empty($data['lang']) || !is_array($data['content']) || !count($data['content'])) {
    $err = true;
    $err_msg .= 'translator-error: malformed reqeust object';
  } else {
    $content_arr = $data['content'];
    $lang = $data['lang'];
  }
  break;
  //
  default :
    $err =  true;
    $err_msg .= 'translator-error: unknown HTTP method; ';
}

if (!$err) {
  // call the Google cloud translator
  $response = $service->translateText(
      $content_arr,
      $lang,
      $formattedParent
  );
  // get the translation for each input text provided
  foreach ($response->getTranslations() as $translation) {
      $api_resp[] = $translation->getTranslatedText();
  }
  // respond to the http request
  print( json_encode($api_resp));
} else {
  print( json_encode(['error:'=>$err_msg]));
}
?>
