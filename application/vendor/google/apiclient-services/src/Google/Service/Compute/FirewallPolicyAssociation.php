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

class Google_Service_Compute_FirewallPolicyAssociation extends Google_Model
{
  public $attachmentTarget;
  public $displayName;
  public $firewallPolicyId;
  public $name;
  public $shortName;

  public function setAttachmentTarget($attachmentTarget)
  {
    $this->attachmentTarget = $attachmentTarget;
  }
  public function getAttachmentTarget()
  {
    return $this->attachmentTarget;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setFirewallPolicyId($firewallPolicyId)
  {
    $this->firewallPolicyId = $firewallPolicyId;
  }
  public function getFirewallPolicyId()
  {
    return $this->firewallPolicyId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setShortName($shortName)
  {
    $this->shortName = $shortName;
  }
  public function getShortName()
  {
    return $this->shortName;
  }
}
