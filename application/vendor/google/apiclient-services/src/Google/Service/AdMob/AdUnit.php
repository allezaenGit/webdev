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

class Google_Service_AdMob_AdUnit extends Google_Collection
{
  protected $collection_key = 'adTypes';
  public $adFormat;
  public $adTypes;
  public $adUnitId;
  public $appId;
  public $displayName;
  public $name;

  public function setAdFormat($adFormat)
  {
    $this->adFormat = $adFormat;
  }
  public function getAdFormat()
  {
    return $this->adFormat;
  }
  public function setAdTypes($adTypes)
  {
    $this->adTypes = $adTypes;
  }
  public function getAdTypes()
  {
    return $this->adTypes;
  }
  public function setAdUnitId($adUnitId)
  {
    $this->adUnitId = $adUnitId;
  }
  public function getAdUnitId()
  {
    return $this->adUnitId;
  }
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  public function getAppId()
  {
    return $this->appId;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
