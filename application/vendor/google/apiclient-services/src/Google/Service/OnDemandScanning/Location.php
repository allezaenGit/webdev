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

class Google_Service_OnDemandScanning_Location extends Google_Model
{
  public $cpeUri;
  public $path;
  protected $versionType = 'Google_Service_OnDemandScanning_Version';
  protected $versionDataType = '';

  public function setCpeUri($cpeUri)
  {
    $this->cpeUri = $cpeUri;
  }
  public function getCpeUri()
  {
    return $this->cpeUri;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param Google_Service_OnDemandScanning_Version
   */
  public function setVersion(Google_Service_OnDemandScanning_Version $version)
  {
    $this->version = $version;
  }
  /**
   * @return Google_Service_OnDemandScanning_Version
   */
  public function getVersion()
  {
    return $this->version;
  }
}
