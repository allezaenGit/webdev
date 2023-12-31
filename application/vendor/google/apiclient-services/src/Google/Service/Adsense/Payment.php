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

class Google_Service_Adsense_Payment extends Google_Model
{
  public $amount;
  protected $dateType = 'Google_Service_Adsense_Date';
  protected $dateDataType = '';
  public $name;

  public function setAmount($amount)
  {
    $this->amount = $amount;
  }
  public function getAmount()
  {
    return $this->amount;
  }
  /**
   * @param Google_Service_Adsense_Date
   */
  public function setDate(Google_Service_Adsense_Date $date)
  {
    $this->date = $date;
  }
  /**
   * @return Google_Service_Adsense_Date
   */
  public function getDate()
  {
    return $this->date;
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
