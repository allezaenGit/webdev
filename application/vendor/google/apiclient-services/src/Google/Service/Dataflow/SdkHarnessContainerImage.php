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

class Google_Service_Dataflow_SdkHarnessContainerImage extends Google_Model
{
  public $containerImage;
  public $environmentId;
  public $useSingleCorePerContainer;

  public function setContainerImage($containerImage)
  {
    $this->containerImage = $containerImage;
  }
  public function getContainerImage()
  {
    return $this->containerImage;
  }
  public function setEnvironmentId($environmentId)
  {
    $this->environmentId = $environmentId;
  }
  public function getEnvironmentId()
  {
    return $this->environmentId;
  }
  public function setUseSingleCorePerContainer($useSingleCorePerContainer)
  {
    $this->useSingleCorePerContainer = $useSingleCorePerContainer;
  }
  public function getUseSingleCorePerContainer()
  {
    return $this->useSingleCorePerContainer;
  }
}
