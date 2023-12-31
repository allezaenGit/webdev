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

class Google_Service_CloudHealthcare_UserDataMapping extends Google_Collection
{
  protected $collection_key = 'resourceAttributes';
  public $archiveTime;
  public $archived;
  public $dataId;
  public $name;
  protected $resourceAttributesType = 'Google_Service_CloudHealthcare_Attribute';
  protected $resourceAttributesDataType = 'array';
  public $userId;

  public function setArchiveTime($archiveTime)
  {
    $this->archiveTime = $archiveTime;
  }
  public function getArchiveTime()
  {
    return $this->archiveTime;
  }
  public function setArchived($archived)
  {
    $this->archived = $archived;
  }
  public function getArchived()
  {
    return $this->archived;
  }
  public function setDataId($dataId)
  {
    $this->dataId = $dataId;
  }
  public function getDataId()
  {
    return $this->dataId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudHealthcare_Attribute[]
   */
  public function setResourceAttributes($resourceAttributes)
  {
    $this->resourceAttributes = $resourceAttributes;
  }
  /**
   * @return Google_Service_CloudHealthcare_Attribute[]
   */
  public function getResourceAttributes()
  {
    return $this->resourceAttributes;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}
