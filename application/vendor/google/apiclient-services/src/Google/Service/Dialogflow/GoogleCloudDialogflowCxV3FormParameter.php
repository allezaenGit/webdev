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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FormParameter extends Google_Model
{
  public $defaultValue;
  public $displayName;
  public $entityType;
  protected $fillBehaviorType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FormParameterFillBehavior';
  protected $fillBehaviorDataType = '';
  public $isList;
  public $redact;
  public $required;

  public function setDefaultValue($defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEntityType($entityType)
  {
    $this->entityType = $entityType;
  }
  public function getEntityType()
  {
    return $this->entityType;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FormParameterFillBehavior
   */
  public function setFillBehavior(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FormParameterFillBehavior $fillBehavior)
  {
    $this->fillBehavior = $fillBehavior;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FormParameterFillBehavior
   */
  public function getFillBehavior()
  {
    return $this->fillBehavior;
  }
  public function setIsList($isList)
  {
    $this->isList = $isList;
  }
  public function getIsList()
  {
    return $this->isList;
  }
  public function setRedact($redact)
  {
    $this->redact = $redact;
  }
  public function getRedact()
  {
    return $this->redact;
  }
  public function setRequired($required)
  {
    $this->required = $required;
  }
  public function getRequired()
  {
    return $this->required;
  }
}
