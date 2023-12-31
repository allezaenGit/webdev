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

class Google_Service_Document_GoogleCloudDocumentaiV1beta3ProcessResponse extends Google_Model
{
  protected $documentType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3Document';
  protected $documentDataType = '';
  public $humanReviewOperation;
  protected $humanReviewStatusType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3HumanReviewStatus';
  protected $humanReviewStatusDataType = '';

  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3Document
   */
  public function setDocument(Google_Service_Document_GoogleCloudDocumentaiV1beta3Document $document)
  {
    $this->document = $document;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3Document
   */
  public function getDocument()
  {
    return $this->document;
  }
  public function setHumanReviewOperation($humanReviewOperation)
  {
    $this->humanReviewOperation = $humanReviewOperation;
  }
  public function getHumanReviewOperation()
  {
    return $this->humanReviewOperation;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3HumanReviewStatus
   */
  public function setHumanReviewStatus(Google_Service_Document_GoogleCloudDocumentaiV1beta3HumanReviewStatus $humanReviewStatus)
  {
    $this->humanReviewStatus = $humanReviewStatus;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3HumanReviewStatus
   */
  public function getHumanReviewStatus()
  {
    return $this->humanReviewStatus;
  }
}
