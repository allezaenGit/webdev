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

class Google_Service_Compute_GlobalOrganizationSetPolicyRequest extends Google_Collection
{
  protected $collection_key = 'bindings';
  protected $bindingsType = 'Google_Service_Compute_Binding';
  protected $bindingsDataType = 'array';
  public $etag;
  protected $policyType = 'Google_Service_Compute_Policy';
  protected $policyDataType = '';

  /**
   * @param Google_Service_Compute_Binding[]
   */
  public function setBindings($bindings)
  {
    $this->bindings = $bindings;
  }
  /**
   * @return Google_Service_Compute_Binding[]
   */
  public function getBindings()
  {
    return $this->bindings;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param Google_Service_Compute_Policy
   */
  public function setPolicy(Google_Service_Compute_Policy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return Google_Service_Compute_Policy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
}
