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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig extends Google_Collection
{
  protected $collection_key = 'containerCommand';
  protected $acceleratorConfigType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AcceleratorConfig';
  protected $acceleratorConfigDataType = '';
  public $containerArgs;
  public $containerCommand;
  protected $diskConfigType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1DiskConfig';
  protected $diskConfigDataType = '';
  public $imageUri;
  public $tpuTfVersion;

  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AcceleratorConfig
   */
  public function setAcceleratorConfig(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AcceleratorConfig $acceleratorConfig)
  {
    $this->acceleratorConfig = $acceleratorConfig;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AcceleratorConfig
   */
  public function getAcceleratorConfig()
  {
    return $this->acceleratorConfig;
  }
  public function setContainerArgs($containerArgs)
  {
    $this->containerArgs = $containerArgs;
  }
  public function getContainerArgs()
  {
    return $this->containerArgs;
  }
  public function setContainerCommand($containerCommand)
  {
    $this->containerCommand = $containerCommand;
  }
  public function getContainerCommand()
  {
    return $this->containerCommand;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1DiskConfig
   */
  public function setDiskConfig(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1DiskConfig $diskConfig)
  {
    $this->diskConfig = $diskConfig;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1DiskConfig
   */
  public function getDiskConfig()
  {
    return $this->diskConfig;
  }
  public function setImageUri($imageUri)
  {
    $this->imageUri = $imageUri;
  }
  public function getImageUri()
  {
    return $this->imageUri;
  }
  public function setTpuTfVersion($tpuTfVersion)
  {
    $this->tpuTfVersion = $tpuTfVersion;
  }
  public function getTpuTfVersion()
  {
    return $this->tpuTfVersion;
  }
}
