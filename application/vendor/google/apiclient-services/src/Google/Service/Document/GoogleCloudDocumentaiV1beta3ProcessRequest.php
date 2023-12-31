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

class Google_Service_Document_GoogleCloudDocumentaiV1beta3ProcessRequest extends Google_Model
{
  protected $documentType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3Document';
  protected $documentDataType = '';
  protected $inlineDocumentType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3Document';
  protected $inlineDocumentDataType = '';
  protected $rawDocumentType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3RawDocument';
  protected $rawDocumentDataType = '';
  public $skipHumanReview;

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
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3Document
   */
  public function setInlineDocument(Google_Service_Document_GoogleCloudDocumentaiV1beta3Document $inlineDocument)
  {
    $this->inlineDocument = $inlineDocument;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3Document
   */
  public function getInlineDocument()
  {
    return $this->inlineDocument;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3RawDocument
   */
  public function setRawDocument(Google_Service_Document_GoogleCloudDocumentaiV1beta3RawDocument $rawDocument)
  {
    $this->rawDocument = $rawDocument;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3RawDocument
   */
  public function getRawDocument()
  {
    return $this->rawDocument;
  }
  public function setSkipHumanReview($skipHumanReview)
  {
    $this->skipHumanReview = $skipHumanReview;
  }
  public function getSkipHumanReview()
  {
    return $this->skipHumanReview;
  }
}
