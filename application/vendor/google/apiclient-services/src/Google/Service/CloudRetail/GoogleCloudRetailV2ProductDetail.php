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

class Google_Service_CloudRetail_GoogleCloudRetailV2ProductDetail extends Google_Model
{
  protected $productType = 'Google_Service_CloudRetail_GoogleCloudRetailV2Product';
  protected $productDataType = '';
  public $quantity;

  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2Product
   */
  public function setProduct(Google_Service_CloudRetail_GoogleCloudRetailV2Product $product)
  {
    $this->product = $product;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2Product
   */
  public function getProduct()
  {
    return $this->product;
  }
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
  public function getQuantity()
  {
    return $this->quantity;
  }
}
