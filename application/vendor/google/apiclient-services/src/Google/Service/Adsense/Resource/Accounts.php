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

/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_Adsense(...);
 *   $accounts = $adsenseService->accounts;
 *  </code>
 */
class Google_Service_Adsense_Resource_Accounts extends Google_Service_Resource
{
  /**
   * Gets information about the selected AdSense account. (accounts.get)
   *
   * @param string $name Required. Account to get information about. Format:
   * accounts/{account_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_Adsense_Account
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Adsense_Account");
  }
  /**
   * Lists all accounts available to this user. (accounts.listAccounts)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of accounts to include in the
   * response, used for paging. If unspecified, at most 10000 accounts will be
   * returned. The maximum value is 10000; values above 10000 will be coerced to
   * 10000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListAccounts` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListAccounts` must match the
   * call that provided the page token.
   * @return Google_Service_Adsense_ListAccountsResponse
   */
  public function listAccounts($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Adsense_ListAccountsResponse");
  }
  /**
   * Lists all accounts directly managed by the given AdSense account.
   * (accounts.listChildAccounts)
   *
   * @param string $parent Required. The parent account, which owns the child
   * accounts. Format: accounts/{account}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of accounts to include in the
   * response, used for paging. If unspecified, at most 10000 accounts will be
   * returned. The maximum value is 10000; values above 10000 will be coerced to
   * 10000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListAccounts` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListAccounts` must match the
   * call that provided the page token.
   * @return Google_Service_Adsense_ListChildAccountsResponse
   */
  public function listChildAccounts($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('listChildAccounts', array($params), "Google_Service_Adsense_ListChildAccountsResponse");
  }
}
