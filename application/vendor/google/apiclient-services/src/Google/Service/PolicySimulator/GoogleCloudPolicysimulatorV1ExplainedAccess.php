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

class Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1ExplainedAccess extends Google_Collection
{
  protected $collection_key = 'policies';
  public $accessState;
  protected $errorsType = 'Google_Service_PolicySimulator_GoogleRpcStatus';
  protected $errorsDataType = 'array';
  protected $policiesType = 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1ExplainedPolicy';
  protected $policiesDataType = 'array';

  public function setAccessState($accessState)
  {
    $this->accessState = $accessState;
  }
  public function getAccessState()
  {
    return $this->accessState;
  }
  /**
   * @param Google_Service_PolicySimulator_GoogleRpcStatus[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleRpcStatus[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1ExplainedPolicy[]
   */
  public function setPolicies($policies)
  {
    $this->policies = $policies;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1ExplainedPolicy[]
   */
  public function getPolicies()
  {
    return $this->policies;
  }
}
