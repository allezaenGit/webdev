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

class Google_Service_GKEHub_MembershipEndpoint extends Google_Model
{
  protected $gkeClusterType = 'Google_Service_GKEHub_GkeCluster';
  protected $gkeClusterDataType = '';
  protected $kubernetesMetadataType = 'Google_Service_GKEHub_KubernetesMetadata';
  protected $kubernetesMetadataDataType = '';

  /**
   * @param Google_Service_GKEHub_GkeCluster
   */
  public function setGkeCluster(Google_Service_GKEHub_GkeCluster $gkeCluster)
  {
    $this->gkeCluster = $gkeCluster;
  }
  /**
   * @return Google_Service_GKEHub_GkeCluster
   */
  public function getGkeCluster()
  {
    return $this->gkeCluster;
  }
  /**
   * @param Google_Service_GKEHub_KubernetesMetadata
   */
  public function setKubernetesMetadata(Google_Service_GKEHub_KubernetesMetadata $kubernetesMetadata)
  {
    $this->kubernetesMetadata = $kubernetesMetadata;
  }
  /**
   * @return Google_Service_GKEHub_KubernetesMetadata
   */
  public function getKubernetesMetadata()
  {
    return $this->kubernetesMetadata;
  }
}
