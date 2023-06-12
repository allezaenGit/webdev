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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExperimentResultConfidenceInterval extends Google_Model
{
  public $confidenceLevel;
  public $lowerBound;
  public $ratio;
  public $upperBound;

  public function setConfidenceLevel($confidenceLevel)
  {
    $this->confidenceLevel = $confidenceLevel;
  }
  public function getConfidenceLevel()
  {
    return $this->confidenceLevel;
  }
  public function setLowerBound($lowerBound)
  {
    $this->lowerBound = $lowerBound;
  }
  public function getLowerBound()
  {
    return $this->lowerBound;
  }
  public function setRatio($ratio)
  {
    $this->ratio = $ratio;
  }
  public function getRatio()
  {
    return $this->ratio;
  }
  public function setUpperBound($upperBound)
  {
    $this->upperBound = $upperBound;
  }
  public function getUpperBound()
  {
    return $this->upperBound;
  }
}
