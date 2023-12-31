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

class Google_Service_AIPlatformNotebooks_RuntimeSoftwareConfig extends Google_Model
{
  public $customGpuDriverPath;
  public $enableHealthMonitoring;
  public $idleShutdown;
  public $idleShutdownTimeout;
  public $installGpuDriver;
  public $notebookUpgradeSchedule;
  public $postStartupScript;

  public function setCustomGpuDriverPath($customGpuDriverPath)
  {
    $this->customGpuDriverPath = $customGpuDriverPath;
  }
  public function getCustomGpuDriverPath()
  {
    return $this->customGpuDriverPath;
  }
  public function setEnableHealthMonitoring($enableHealthMonitoring)
  {
    $this->enableHealthMonitoring = $enableHealthMonitoring;
  }
  public function getEnableHealthMonitoring()
  {
    return $this->enableHealthMonitoring;
  }
  public function setIdleShutdown($idleShutdown)
  {
    $this->idleShutdown = $idleShutdown;
  }
  public function getIdleShutdown()
  {
    return $this->idleShutdown;
  }
  public function setIdleShutdownTimeout($idleShutdownTimeout)
  {
    $this->idleShutdownTimeout = $idleShutdownTimeout;
  }
  public function getIdleShutdownTimeout()
  {
    return $this->idleShutdownTimeout;
  }
  public function setInstallGpuDriver($installGpuDriver)
  {
    $this->installGpuDriver = $installGpuDriver;
  }
  public function getInstallGpuDriver()
  {
    return $this->installGpuDriver;
  }
  public function setNotebookUpgradeSchedule($notebookUpgradeSchedule)
  {
    $this->notebookUpgradeSchedule = $notebookUpgradeSchedule;
  }
  public function getNotebookUpgradeSchedule()
  {
    return $this->notebookUpgradeSchedule;
  }
  public function setPostStartupScript($postStartupScript)
  {
    $this->postStartupScript = $postStartupScript;
  }
  public function getPostStartupScript()
  {
    return $this->postStartupScript;
  }
}
