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

class Google_Service_PeopleService_BatchCreateContactsRequest extends Google_Collection
{
  protected $collection_key = 'sources';
  protected $contactsType = 'Google_Service_PeopleService_ContactToCreate';
  protected $contactsDataType = 'array';
  public $readMask;
  public $sources;

  /**
   * @param Google_Service_PeopleService_ContactToCreate[]
   */
  public function setContacts($contacts)
  {
    $this->contacts = $contacts;
  }
  /**
   * @return Google_Service_PeopleService_ContactToCreate[]
   */
  public function getContacts()
  {
    return $this->contacts;
  }
  public function setReadMask($readMask)
  {
    $this->readMask = $readMask;
  }
  public function getReadMask()
  {
    return $this->readMask;
  }
  public function setSources($sources)
  {
    $this->sources = $sources;
  }
  public function getSources()
  {
    return $this->sources;
  }
}
