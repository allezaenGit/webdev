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

class Google_Service_Apigee_GoogleCloudApigeeV1TraceConfigOverride extends Google_Model
{
  public $apiProxy;
  public $name;
  protected $samplingConfigType = 'Google_Service_Apigee_GoogleCloudApigeeV1TraceSamplingConfig';
  protected $samplingConfigDataType = '';

  public function setApiProxy($apiProxy)
  {
    $this->apiProxy = $apiProxy;
  }
  public function getApiProxy()
  {
    return $this->apiProxy;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1TraceSamplingConfig
   */
  public function setSamplingConfig(Google_Service_Apigee_GoogleCloudApigeeV1TraceSamplingConfig $samplingConfig)
  {
    $this->samplingConfig = $samplingConfig;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1TraceSamplingConfig
   */
  public function getSamplingConfig()
  {
    return $this->samplingConfig;
  }
}
