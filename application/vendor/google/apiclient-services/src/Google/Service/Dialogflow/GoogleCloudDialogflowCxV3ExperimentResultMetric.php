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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExperimentResultMetric extends Google_Model
{
  protected $confidenceIntervalType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExperimentResultConfidenceInterval';
  protected $confidenceIntervalDataType = '';
  public $count;
  public $countType;
  public $ratio;
  public $type;

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExperimentResultConfidenceInterval
   */
  public function setConfidenceInterval(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExperimentResultConfidenceInterval $confidenceInterval)
  {
    $this->confidenceInterval = $confidenceInterval;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExperimentResultConfidenceInterval
   */
  public function getConfidenceInterval()
  {
    return $this->confidenceInterval;
  }
  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  public function setCountType($countType)
  {
    $this->countType = $countType;
  }
  public function getCountType()
  {
    return $this->countType;
  }
  public function setRatio($ratio)
  {
    $this->ratio = $ratio;
  }
  public function getRatio()
  {
    return $this->ratio;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
