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

class Google_Service_Area120Tables_Table extends Google_Collection
{
  protected $collection_key = 'savedViews';
  protected $columnsType = 'Google_Service_Area120Tables_ColumnDescription';
  protected $columnsDataType = 'array';
  public $createTime;
  public $displayName;
  public $name;
  protected $savedViewsType = 'Google_Service_Area120Tables_SavedView';
  protected $savedViewsDataType = 'array';
  public $updateTime;

  /**
   * @param Google_Service_Area120Tables_ColumnDescription[]
   */
  public function setColumns($columns)
  {
    $this->columns = $columns;
  }
  /**
   * @return Google_Service_Area120Tables_ColumnDescription[]
   */
  public function getColumns()
  {
    return $this->columns;
  }
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
  /**
   * @param Google_Service_Area120Tables_SavedView[]
   */
  public function setSavedViews($savedViews)
  {
    $this->savedViews = $savedViews;
  }
  /**
   * @return Google_Service_Area120Tables_SavedView[]
   */
  public function getSavedViews()
  {
    return $this->savedViews;
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
