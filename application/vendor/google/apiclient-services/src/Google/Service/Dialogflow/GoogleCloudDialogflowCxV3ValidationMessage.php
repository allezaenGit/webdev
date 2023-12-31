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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ValidationMessage extends Google_Collection
{
  protected $collection_key = 'resources';
  public $detail;
  protected $resourceNamesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResourceName';
  protected $resourceNamesDataType = 'array';
  public $resourceType;
  public $resources;
  public $severity;

  public function setDetail($detail)
  {
    $this->detail = $detail;
  }
  public function getDetail()
  {
    return $this->detail;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResourceName[]
   */
  public function setResourceNames($resourceNames)
  {
    $this->resourceNames = $resourceNames;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResourceName[]
   */
  public function getResourceNames()
  {
    return $this->resourceNames;
  }
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  public function getResourceType()
  {
    return $this->resourceType;
  }
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  public function getResources()
  {
    return $this->resources;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
}
