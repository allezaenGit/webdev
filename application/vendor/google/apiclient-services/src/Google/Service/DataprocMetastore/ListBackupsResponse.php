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

class Google_Service_DataprocMetastore_ListBackupsResponse extends Google_Collection
{
  protected $collection_key = 'unreachable';
  protected $backupsType = 'Google_Service_DataprocMetastore_Backup';
  protected $backupsDataType = 'array';
  public $nextPageToken;
  public $unreachable;

  /**
   * @param Google_Service_DataprocMetastore_Backup[]
   */
  public function setBackups($backups)
  {
    $this->backups = $backups;
  }
  /**
   * @return Google_Service_DataprocMetastore_Backup[]
   */
  public function getBackups()
  {
    return $this->backups;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setUnreachable($unreachable)
  {
    $this->unreachable = $unreachable;
  }
  public function getUnreachable()
  {
    return $this->unreachable;
  }
}
