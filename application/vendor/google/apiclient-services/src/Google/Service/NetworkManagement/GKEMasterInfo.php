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

class Google_Service_NetworkManagement_GKEMasterInfo extends Google_Model
{
  public $clusterNetworkUri;
  public $clusterUri;
  public $externalIp;
  public $internalIp;

  public function setClusterNetworkUri($clusterNetworkUri)
  {
    $this->clusterNetworkUri = $clusterNetworkUri;
  }
  public function getClusterNetworkUri()
  {
    return $this->clusterNetworkUri;
  }
  public function setClusterUri($clusterUri)
  {
    $this->clusterUri = $clusterUri;
  }
  public function getClusterUri()
  {
    return $this->clusterUri;
  }
  public function setExternalIp($externalIp)
  {
    $this->externalIp = $externalIp;
  }
  public function getExternalIp()
  {
    return $this->externalIp;
  }
  public function setInternalIp($internalIp)
  {
    $this->internalIp = $internalIp;
  }
  public function getInternalIp()
  {
    return $this->internalIp;
  }
}
