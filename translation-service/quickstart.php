<?php
/**
 * Copyright 2016 Google Inc.
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

# [START translate_quickstart]
# Includes the autoloader for libraries installed with composer
require __DIR__ . '/../vendor/autoload.php';

# Imports the Google Cloud client library
use Google\Cloud\Translate\TranslateClient;
use Google\Cloud\Translate\V3\TranslationServiceClient;

/**
 * Authenticate to a cloud client library using a service account explicitly.
 *
 * @param string $projectId           The Google project ID.
 * @param string $serviceAccountPath  Path to service account credentials JSON.
 */
function auth_cloud_translate_explicit($projectId, $serviceAccountPath) {
  # Explicitly use service account credentials by specifying the private key
  # file.
  $config = [
    'keyFilePath' => $serviceAccountPath,
    'projectId' => $projectId,
  ];
  # Instantiates a client
  $translate = new TranslateClient($config);
  return $translate;
}

function auth_cloud_translate_service_explicit($projectId, $serviceAccountPath) {
  # Explicitly use service account credentials by specifying the private key
  # file.
  $config = [
    'keyFilePath' => $serviceAccountPath,
    'projectId' => $projectId,
  ];
  # Instantiates a client
  $service = new TranslationServiceClient(['credentials'=> $serviceAccountPath]);
  return $service;
}
