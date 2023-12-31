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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroupCoverageCoverage extends Google_Collection
{
  protected $collection_key = 'transitions';
  public $coverageScore;
  protected $routeGroupType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup';
  protected $routeGroupDataType = '';
  protected $transitionsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroupCoverageCoverageTransition';
  protected $transitionsDataType = 'array';

  public function setCoverageScore($coverageScore)
  {
    $this->coverageScore = $coverageScore;
  }
  public function getCoverageScore()
  {
    return $this->coverageScore;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup
   */
  public function setRouteGroup(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup $routeGroup)
  {
    $this->routeGroup = $routeGroup;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup
   */
  public function getRouteGroup()
  {
    return $this->routeGroup;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroupCoverageCoverageTransition[]
   */
  public function setTransitions($transitions)
  {
    $this->transitions = $transitions;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroupCoverageCoverageTransition[]
   */
  public function getTransitions()
  {
    return $this->transitions;
  }
}
