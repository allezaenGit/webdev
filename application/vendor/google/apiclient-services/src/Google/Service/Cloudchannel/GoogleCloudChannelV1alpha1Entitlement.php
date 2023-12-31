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

class Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1Entitlement extends Google_Collection
{
  protected $collection_key = 'suspensionReasons';
  public $assignedUnits;
  protected $associationInfoType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1AssociationInfo';
  protected $associationInfoDataType = '';
  public $channelPartnerId;
  protected $commitmentSettingsType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1CommitmentSettings';
  protected $commitmentSettingsDataType = '';
  public $createTime;
  public $maxUnits;
  public $name;
  public $numUnits;
  public $offer;
  protected $parametersType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1Parameter';
  protected $parametersDataType = 'array';
  protected $provisionedServiceType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1ProvisionedService';
  protected $provisionedServiceDataType = '';
  public $provisioningState;
  public $purchaseOrderId;
  public $suspensionReasons;
  protected $trialSettingsType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1TrialSettings';
  protected $trialSettingsDataType = '';
  public $updateTime;

  public function setAssignedUnits($assignedUnits)
  {
    $this->assignedUnits = $assignedUnits;
  }
  public function getAssignedUnits()
  {
    return $this->assignedUnits;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1AssociationInfo
   */
  public function setAssociationInfo(Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1AssociationInfo $associationInfo)
  {
    $this->associationInfo = $associationInfo;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1AssociationInfo
   */
  public function getAssociationInfo()
  {
    return $this->associationInfo;
  }
  public function setChannelPartnerId($channelPartnerId)
  {
    $this->channelPartnerId = $channelPartnerId;
  }
  public function getChannelPartnerId()
  {
    return $this->channelPartnerId;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1CommitmentSettings
   */
  public function setCommitmentSettings(Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1CommitmentSettings $commitmentSettings)
  {
    $this->commitmentSettings = $commitmentSettings;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1CommitmentSettings
   */
  public function getCommitmentSettings()
  {
    return $this->commitmentSettings;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setMaxUnits($maxUnits)
  {
    $this->maxUnits = $maxUnits;
  }
  public function getMaxUnits()
  {
    return $this->maxUnits;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNumUnits($numUnits)
  {
    $this->numUnits = $numUnits;
  }
  public function getNumUnits()
  {
    return $this->numUnits;
  }
  public function setOffer($offer)
  {
    $this->offer = $offer;
  }
  public function getOffer()
  {
    return $this->offer;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1Parameter[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1Parameter[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1ProvisionedService
   */
  public function setProvisionedService(Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1ProvisionedService $provisionedService)
  {
    $this->provisionedService = $provisionedService;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1ProvisionedService
   */
  public function getProvisionedService()
  {
    return $this->provisionedService;
  }
  public function setProvisioningState($provisioningState)
  {
    $this->provisioningState = $provisioningState;
  }
  public function getProvisioningState()
  {
    return $this->provisioningState;
  }
  public function setPurchaseOrderId($purchaseOrderId)
  {
    $this->purchaseOrderId = $purchaseOrderId;
  }
  public function getPurchaseOrderId()
  {
    return $this->purchaseOrderId;
  }
  public function setSuspensionReasons($suspensionReasons)
  {
    $this->suspensionReasons = $suspensionReasons;
  }
  public function getSuspensionReasons()
  {
    return $this->suspensionReasons;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1TrialSettings
   */
  public function setTrialSettings(Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1TrialSettings $trialSettings)
  {
    $this->trialSettings = $trialSettings;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1TrialSettings
   */
  public function getTrialSettings()
  {
    return $this->trialSettings;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
