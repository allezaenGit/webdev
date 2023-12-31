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

class Google_Service_Directory_FailureInfo extends Google_Model
{
  public $errorCode;
  public $errorMessage;
  protected $printerType = 'Google_Service_Directory_Printer';
  protected $printerDataType = '';
  public $printerId;

  public function setErrorCode($errorCode)
  {
    $this->errorCode = $errorCode;
  }
  public function getErrorCode()
  {
    return $this->errorCode;
  }
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  /**
   * @param Google_Service_Directory_Printer
   */
  public function setPrinter(Google_Service_Directory_Printer $printer)
  {
    $this->printer = $printer;
  }
  /**
   * @return Google_Service_Directory_Printer
   */
  public function getPrinter()
  {
    return $this->printer;
  }
  public function setPrinterId($printerId)
  {
    $this->printerId = $printerId;
  }
  public function getPrinterId()
  {
    return $this->printerId;
  }
}
