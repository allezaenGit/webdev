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

class Google_Service_Bigquery_DatasetAccessEntry extends Google_Collection
{
  protected $collection_key = 'target_types';
  protected $internal_gapi_mappings = array(
        "targetTypes" => "target_types",
  );
  protected $datasetType = 'Google_Service_Bigquery_DatasetReference';
  protected $datasetDataType = '';
  protected $targetTypesType = 'Google_Service_Bigquery_DatasetAccessEntryTargetTypes';
  protected $targetTypesDataType = 'array';

  /**
   * @param Google_Service_Bigquery_DatasetReference
   */
  public function setDataset(Google_Service_Bigquery_DatasetReference $dataset)
  {
    $this->dataset = $dataset;
  }
  /**
   * @return Google_Service_Bigquery_DatasetReference
   */
  public function getDataset()
  {
    return $this->dataset;
  }
  /**
   * @param Google_Service_Bigquery_DatasetAccessEntryTargetTypes[]
   */
  public function setTargetTypes($targetTypes)
  {
    $this->targetTypes = $targetTypes;
  }
  /**
   * @return Google_Service_Bigquery_DatasetAccessEntryTargetTypes[]
   */
  public function getTargetTypes()
  {
    return $this->targetTypes;
  }
}
