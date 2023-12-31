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

class Google_Service_Sheets_BasicSeriesDataPointStyleOverride extends Google_Model
{
  protected $colorType = 'Google_Service_Sheets_Color';
  protected $colorDataType = '';
  protected $colorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $colorStyleDataType = '';
  public $index;
  protected $pointStyleType = 'Google_Service_Sheets_PointStyle';
  protected $pointStyleDataType = '';

  /**
   * @param Google_Service_Sheets_Color
   */
  public function setColor(Google_Service_Sheets_Color $color)
  {
    $this->color = $color;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setColorStyle(Google_Service_Sheets_ColorStyle $colorStyle)
  {
    $this->colorStyle = $colorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getColorStyle()
  {
    return $this->colorStyle;
  }
  public function setIndex($index)
  {
    $this->index = $index;
  }
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param Google_Service_Sheets_PointStyle
   */
  public function setPointStyle(Google_Service_Sheets_PointStyle $pointStyle)
  {
    $this->pointStyle = $pointStyle;
  }
  /**
   * @return Google_Service_Sheets_PointStyle
   */
  public function getPointStyle()
  {
    return $this->pointStyle;
  }
}
