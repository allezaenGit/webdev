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

class Google_Service_Document_GoogleCloudDocumentaiV1DocumentRevision extends Google_Collection
{
  protected $collection_key = 'parent';
  public $agent;
  public $createTime;
  protected $humanReviewType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentRevisionHumanReview';
  protected $humanReviewDataType = '';
  public $id;
  public $parent;
  public $processor;

  public function setAgent($agent)
  {
    $this->agent = $agent;
  }
  public function getAgent()
  {
    return $this->agent;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentRevisionHumanReview
   */
  public function setHumanReview(Google_Service_Document_GoogleCloudDocumentaiV1DocumentRevisionHumanReview $humanReview)
  {
    $this->humanReview = $humanReview;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentRevisionHumanReview
   */
  public function getHumanReview()
  {
    return $this->humanReview;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  public function getParent()
  {
    return $this->parent;
  }
  public function setProcessor($processor)
  {
    $this->processor = $processor;
  }
  public function getProcessor()
  {
    return $this->processor;
  }
}
