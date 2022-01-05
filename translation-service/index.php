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

// Install composer dependencies with "composer install --no-dev"
// @see http://getcomposer.org for more information.
require __DIR__ . '/quickstart.php';

$translate = auth_cloud_translate_explicit(
  'psu-translate-337220',
  'psu-translate-337220-434fbc1ed320.json'
);

$service = auth_cloud_translate_service_explicit(
  'psu-translate-337220',
  'psu-translate-337220-434fbc1ed320.json'
);

$formattedParent = $service->locationName('psu-translate-337220', 'global');

$err_msg = '';
$err = false;
$content_arr = [];

if ( !empty($_GET) ) {
  if (empty($_GET['lang'])) {
    $err_msg .= 'translator-error: no language is specified; ';
    $err = true;
  }

  if (!empty($_GET['content_0'])) {

    $index = 0;
    while (!empty($_GET['content_'.strval($index)])) {
      $content_arr[] = $_GET['content_'.strval($index)];
      $index++;
    }
  } else if (!empty($_GET['content'])) {

    $content_arr = [ $_GET['content'] ];

  } else {
    $err_msg .= 'translator-error: no content was submitted; ';
    $err = true;
  }
} else {
  $err_msg .= 'translator-error: no operands were sent; ';
  $err = true;
}
if (!$err) {

  $response = $service->translateText(
      $content_arr,
      $_GET['lang'],
      $formattedParent
  );
  $index = 0;
  // Display the translation for each input text provided
  foreach ($response->getTranslations() as $translation) {
      print(strval($index) .') ' . $translation->getTranslatedText());
      print('<br/>');
      $index++;
  }
} else {
  print($err_msg);
}





?>
