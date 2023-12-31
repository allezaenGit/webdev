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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3NluSettings extends Google_Model
{
  public $classificationThreshold;
  public $modelTrainingMode;
  public $modelType;

  public function setClassificationThreshold($classificationThreshold)
  {
    $this->classificationThreshold = $classificationThreshold;
  }
  public function getClassificationThreshold()
  {
    return $this->classificationThreshold;
  }
  public function setModelTrainingMode($modelTrainingMode)
  {
    $this->modelTrainingMode = $modelTrainingMode;
  }
  public function getModelTrainingMode()
  {
    return $this->modelTrainingMode;
  }
  public function setModelType($modelType)
  {
    $this->modelType = $modelType;
  }
  public function getModelType()
  {
    return $this->modelType;
  }
}
