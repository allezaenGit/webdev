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

class Google_Service_ServiceNetworking_RangeReservation extends Google_Collection
{
  protected $collection_key = 'subnetworkCandidates';
  public $ipPrefixLength;
  public $requestedRanges;
  public $secondaryRangeIpPrefixLengths;
  protected $subnetworkCandidatesType = 'Google_Service_ServiceNetworking_Subnetwork';
  protected $subnetworkCandidatesDataType = 'array';

  public function setIpPrefixLength($ipPrefixLength)
  {
    $this->ipPrefixLength = $ipPrefixLength;
  }
  public function getIpPrefixLength()
  {
    return $this->ipPrefixLength;
  }
  public function setRequestedRanges($requestedRanges)
  {
    $this->requestedRanges = $requestedRanges;
  }
  public function getRequestedRanges()
  {
    return $this->requestedRanges;
  }
  public function setSecondaryRangeIpPrefixLengths($secondaryRangeIpPrefixLengths)
  {
    $this->secondaryRangeIpPrefixLengths = $secondaryRangeIpPrefixLengths;
  }
  public function getSecondaryRangeIpPrefixLengths()
  {
    return $this->secondaryRangeIpPrefixLengths;
  }
  /**
   * @param Google_Service_ServiceNetworking_Subnetwork[]
   */
  public function setSubnetworkCandidates($subnetworkCandidates)
  {
    $this->subnetworkCandidates = $subnetworkCandidates;
  }
  /**
   * @return Google_Service_ServiceNetworking_Subnetwork[]
   */
  public function getSubnetworkCandidates()
  {
    return $this->subnetworkCandidates;
  }
}
