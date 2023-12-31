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

class Google_Service_Adsense_Account extends Google_Collection
{
  protected $collection_key = 'pendingTasks';
  public $createTime;
  public $displayName;
  public $name;
  public $pendingTasks;
  public $premium;
  protected $timeZoneType = 'Google_Service_Adsense_TimeZone';
  protected $timeZoneDataType = '';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
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
  public function setPendingTasks($pendingTasks)
  {
    $this->pendingTasks = $pendingTasks;
  }
  public function getPendingTasks()
  {
    return $this->pendingTasks;
  }
  public function setPremium($premium)
  {
    $this->premium = $premium;
  }
  public function getPremium()
  {
    return $this->premium;
  }
  /**
   * @param Google_Service_Adsense_TimeZone
   */
  public function setTimeZone(Google_Service_Adsense_TimeZone $timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return Google_Service_Adsense_TimeZone
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}
