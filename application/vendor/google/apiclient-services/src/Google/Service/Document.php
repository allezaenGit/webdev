<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * Service definition for Document (v1).
 *
 * <p>
 * Service to parse structured information from unstructured or semi-structured
 * documents using state-of-the-art Google AI such as natural language, computer
 * vision, translation, and AutoML.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/document-ai/docs/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Document extends Google_Service
{
  /** See, edit, configure, and delete your Google Cloud Platform data. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $operations;
  public $projects_locations;
  public $projects_locations_operations;
  public $projects_locations_processors;
  public $projects_locations_processors_humanReviewConfig;
  public $projects_locations_processors_processorVersions;
  public $projects_operations;
  public $uiv1beta3_projects_locations;
  public $uiv1beta3_projects_locations_operations;

  /**
   * Constructs the internal representation of the Document service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://documentai.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'documentai';

    $this->operations = new Google_Service_Document_Resource_Operations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'cancel' => array(
              'path' => 'v1/{+name}:cancel',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations = new Google_Service_Document_Resource_ProjectsLocations(
        $this,
        $this->serviceName,
        'locations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/{+name}/locations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_operations = new Google_Service_Document_Resource_ProjectsLocationsOperations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_processors = new Google_Service_Document_Resource_ProjectsLocationsProcessors(
        $this,
        $this->serviceName,
        'processors',
        array(
          'methods' => array(
            'batchProcess' => array(
              'path' => 'v1/{+name}:batchProcess',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'process' => array(
              'path' => 'v1/{+name}:process',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_processors_humanReviewConfig = new Google_Service_Document_Resource_ProjectsLocationsProcessorsHumanReviewConfig(
        $this,
        $this->serviceName,
        'humanReviewConfig',
        array(
          'methods' => array(
            'reviewDocument' => array(
              'path' => 'v1/{+humanReviewConfig}:reviewDocument',
              'httpMethod' => 'POST',
              'parameters' => array(
                'humanReviewConfig' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_processors_processorVersions = new Google_Service_Document_Resource_ProjectsLocationsProcessorsProcessorVersions(
        $this,
        $this->serviceName,
        'processorVersions',
        array(
          'methods' => array(
            'batchProcess' => array(
              'path' => 'v1/{+name}:batchProcess',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'process' => array(
              'path' => 'v1/{+name}:process',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_operations = new Google_Service_Document_Resource_ProjectsOperations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->uiv1beta3_projects_locations = new Google_Service_Document_Resource_Uiv1beta3ProjectsLocations(
        $this,
        $this->serviceName,
        'locations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'uiv1beta3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'uiv1beta3/{+name}/locations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->uiv1beta3_projects_locations_operations = new Google_Service_Document_Resource_Uiv1beta3ProjectsLocationsOperations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'uiv1beta3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
