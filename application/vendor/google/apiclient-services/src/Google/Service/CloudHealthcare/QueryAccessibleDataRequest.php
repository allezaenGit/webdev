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

class Google_Service_CloudHealthcare_QueryAccessibleDataRequest extends Google_Model
{
  protected $gcsDestinationType = 'Google_Service_CloudHealthcare_GoogleCloudHealthcareV1ConsentGcsDestination';
  protected $gcsDestinationDataType = '';
  public $requestAttributes;
  public $resourceAttributes;

  /**
   * @param Google_Service_CloudHealthcare_GoogleCloudHealthcareV1ConsentGcsDestination
   */
  public function setGcsDestination(Google_Service_CloudHealthcare_GoogleCloudHealthcareV1ConsentGcsDestination $gcsDestination)
  {
    $this->gcsDestination = $gcsDestination;
  }
  /**
   * @return Google_Service_CloudHealthcare_GoogleCloudHealthcareV1ConsentGcsDestination
   */
  public function getGcsDestination()
  {
    return $this->gcsDestination;
  }
  public function setRequestAttributes($requestAttributes)
  {
    $this->requestAttributes = $requestAttributes;
  }
  public function getRequestAttributes()
  {
    return $this->requestAttributes;
  }
  public function setResourceAttributes($resourceAttributes)
  {
    $this->resourceAttributes = $resourceAttributes;
  }
  public function getResourceAttributes()
  {
    return $this->resourceAttributes;
  }
}
