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

class Google_Service_CloudHealthcare_CheckDataAccessResponse extends Google_Model
{
  protected $consentDetailsType = 'Google_Service_CloudHealthcare_ConsentEvaluation';
  protected $consentDetailsDataType = 'map';
  public $consented;

  /**
   * @param Google_Service_CloudHealthcare_ConsentEvaluation[]
   */
  public function setConsentDetails($consentDetails)
  {
    $this->consentDetails = $consentDetails;
  }
  /**
   * @return Google_Service_CloudHealthcare_ConsentEvaluation[]
   */
  public function getConsentDetails()
  {
    return $this->consentDetails;
  }
  public function setConsented($consented)
  {
    $this->consented = $consented;
  }
  public function getConsented()
  {
    return $this->consented;
  }
}
