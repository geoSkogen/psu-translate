<?php
require __DIR__ . '/schema.php';
require __DIR__ . '/../translation-service/quickstart.php';

define('SERVICE_ID','psu-translate-337220');
define('KEY_SLUG','-434fbc1ed320');
define('KEY_PATH', __DIR__ . '/../translation-service/');

$filename = !empty($argv[1]) ? $argv[1] : null;
$language = !empty($argv[2]) ? $argv[2] : null;
$export_table = [];

if ($filename) {
  $string_scheme = new Schema($filename, '../imports');
  if ($string_scheme->data_index) {

    $service = auth_cloud_translate_service_explicit(
      SERVICE_ID,
      KEY_PATH . SERVICE_ID . KEY_SLUG .'.json'
    );
    $formattedParent = $service->locationName(SERVICE_ID, 'global');

    foreach($string_scheme->data_index as $csv_row) {
      $api_resp = [];

      $response = $service->translateText(
          $csv_row,
          $language,
          $formattedParent
      );
      // get the translation for each input text provided
      foreach ($response->getTranslations() as $translation) {
          $api_resp[] = $translation->getTranslatedText();
      }
      $export_table[] = $api_resp;
    }
    $export_str = Schema::make_export_str($export_table);
    Schema::export_csv($export_str,$filename,'../exports');
  } else {
    error_log('The requested file was not found');
  }
} else {
  error_log('This script requires a target file name.');
}


?>
