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

class Google_Service_OnDemandScanning_DiscoveryOccurrence extends Google_Model
{
  public $analysisStatus;
  protected $analysisStatusErrorType = 'Google_Service_OnDemandScanning_Status';
  protected $analysisStatusErrorDataType = '';
  public $continuousAnalysis;
  public $cpe;
  public $lastScanTime;

  public function setAnalysisStatus($analysisStatus)
  {
    $this->analysisStatus = $analysisStatus;
  }
  public function getAnalysisStatus()
  {
    return $this->analysisStatus;
  }
  /**
   * @param Google_Service_OnDemandScanning_Status
   */
  public function setAnalysisStatusError(Google_Service_OnDemandScanning_Status $analysisStatusError)
  {
    $this->analysisStatusError = $analysisStatusError;
  }
  /**
   * @return Google_Service_OnDemandScanning_Status
   */
  public function getAnalysisStatusError()
  {
    return $this->analysisStatusError;
  }
  public function setContinuousAnalysis($continuousAnalysis)
  {
    $this->continuousAnalysis = $continuousAnalysis;
  }
  public function getContinuousAnalysis()
  {
    return $this->continuousAnalysis;
  }
  public function setCpe($cpe)
  {
    $this->cpe = $cpe;
  }
  public function getCpe()
  {
    return $this->cpe;
  }
  public function setLastScanTime($lastScanTime)
  {
    $this->lastScanTime = $lastScanTime;
  }
  public function getLastScanTime()
  {
    return $this->lastScanTime;
  }
}
