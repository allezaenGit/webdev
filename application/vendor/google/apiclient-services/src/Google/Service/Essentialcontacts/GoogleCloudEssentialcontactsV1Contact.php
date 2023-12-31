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

class Google_Service_Essentialcontacts_GoogleCloudEssentialcontactsV1Contact extends Google_Collection
{
  protected $collection_key = 'notificationCategorySubscriptions';
  public $email;
  public $languageTag;
  public $name;
  public $notificationCategorySubscriptions;
  public $validateTime;
  public $validationState;

  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setLanguageTag($languageTag)
  {
    $this->languageTag = $languageTag;
  }
  public function getLanguageTag()
  {
    return $this->languageTag;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNotificationCategorySubscriptions($notificationCategorySubscriptions)
  {
    $this->notificationCategorySubscriptions = $notificationCategorySubscriptions;
  }
  public function getNotificationCategorySubscriptions()
  {
    return $this->notificationCategorySubscriptions;
  }
  public function setValidateTime($validateTime)
  {
    $this->validateTime = $validateTime;
  }
  public function getValidateTime()
  {
    return $this->validateTime;
  }
  public function setValidationState($validationState)
  {
    $this->validationState = $validationState;
  }
  public function getValidationState()
  {
    return $this->validationState;
  }
}
