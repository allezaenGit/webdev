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

class Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1RenewalSettings extends Google_Model
{
  public $disableCommitment;
  public $enableRenewal;
  protected $paymentCycleType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1Period';
  protected $paymentCycleDataType = '';
  public $paymentOption;
  public $paymentPlan;
  public $resizeUnitCount;

  public function setDisableCommitment($disableCommitment)
  {
    $this->disableCommitment = $disableCommitment;
  }
  public function getDisableCommitment()
  {
    return $this->disableCommitment;
  }
  public function setEnableRenewal($enableRenewal)
  {
    $this->enableRenewal = $enableRenewal;
  }
  public function getEnableRenewal()
  {
    return $this->enableRenewal;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1Period
   */
  public function setPaymentCycle(Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1Period $paymentCycle)
  {
    $this->paymentCycle = $paymentCycle;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1Period
   */
  public function getPaymentCycle()
  {
    return $this->paymentCycle;
  }
  public function setPaymentOption($paymentOption)
  {
    $this->paymentOption = $paymentOption;
  }
  public function getPaymentOption()
  {
    return $this->paymentOption;
  }
  public function setPaymentPlan($paymentPlan)
  {
    $this->paymentPlan = $paymentPlan;
  }
  public function getPaymentPlan()
  {
    return $this->paymentPlan;
  }
  public function setResizeUnitCount($resizeUnitCount)
  {
    $this->resizeUnitCount = $resizeUnitCount;
  }
  public function getResizeUnitCount()
  {
    return $this->resizeUnitCount;
  }
}
