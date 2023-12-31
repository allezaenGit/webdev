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

class Google_Service_ShoppingContent_ReportRow extends Google_Model
{
  protected $metricsType = 'Google_Service_ShoppingContent_Metrics';
  protected $metricsDataType = '';
  protected $segmentsType = 'Google_Service_ShoppingContent_Segments';
  protected $segmentsDataType = '';

  /**
   * @param Google_Service_ShoppingContent_Metrics
   */
  public function setMetrics(Google_Service_ShoppingContent_Metrics $metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_ShoppingContent_Metrics
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param Google_Service_ShoppingContent_Segments
   */
  public function setSegments(Google_Service_ShoppingContent_Segments $segments)
  {
    $this->segments = $segments;
  }
  /**
   * @return Google_Service_ShoppingContent_Segments
   */
  public function getSegments()
  {
    return $this->segments;
  }
}
