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

class Google_Service_CloudRetail_GoogleCloudRetailV2PredictResponse extends Google_Collection
{
  protected $collection_key = 'results';
  public $attributionToken;
  public $missingIds;
  protected $resultsType = 'Google_Service_CloudRetail_GoogleCloudRetailV2PredictResponsePredictionResult';
  protected $resultsDataType = 'array';
  public $validateOnly;

  public function setAttributionToken($attributionToken)
  {
    $this->attributionToken = $attributionToken;
  }
  public function getAttributionToken()
  {
    return $this->attributionToken;
  }
  public function setMissingIds($missingIds)
  {
    $this->missingIds = $missingIds;
  }
  public function getMissingIds()
  {
    return $this->missingIds;
  }
  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2PredictResponsePredictionResult[]
   */
  public function setResults($results)
  {
    $this->results = $results;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2PredictResponsePredictionResult[]
   */
  public function getResults()
  {
    return $this->results;
  }
  public function setValidateOnly($validateOnly)
  {
    $this->validateOnly = $validateOnly;
  }
  public function getValidateOnly()
  {
    return $this->validateOnly;
  }
}
