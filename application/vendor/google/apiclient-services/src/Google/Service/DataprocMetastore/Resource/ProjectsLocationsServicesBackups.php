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
 * The "backups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $metastoreService = new Google_Service_DataprocMetastore(...);
 *   $backups = $metastoreService->backups;
 *  </code>
 */
class Google_Service_DataprocMetastore_Resource_ProjectsLocationsServicesBackups extends Google_Service_Resource
{
  /**
   * Creates a new backup in a given project and location. (backups.create)
   *
   * @param string $parent Required. The relative resource name of the service in
   * which to create a backup of the following
   * form:projects/{project_number}/locations/{location_id}/services/{service_id}.
   * @param Google_Service_DataprocMetastore_Backup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string backupId Required. The ID of the backup, which is used as
   * the final component of the backup's name.This value must be between 1 and 64
   * characters long, begin with a letter, end with a letter or number, and
   * consist of alpha-numeric ASCII characters or hyphens.
   * @opt_param string requestId Optional. A request ID. Specify a unique request
   * ID to allow the server to ignore the request if it has completed. The server
   * will ignore subsequent requests that provide a duplicate request ID for at
   * least 60 minutes after the first request.For example, if an initial request
   * times out, followed by another request with the same request ID, the server
   * ignores the second request to prevent the creation of duplicate
   * commitments.The request ID must be a valid UUID
   * (https://en.wikipedia.org/wiki/Universally_unique_identifier#Format) A zero
   * UUID (00000000-0000-0000-0000-000000000000) is not supported.
   * @return Google_Service_DataprocMetastore_Operation
   */
  public function create($parent, Google_Service_DataprocMetastore_Backup $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DataprocMetastore_Operation");
  }
  /**
   * Deletes a single backup. (backups.delete)
   *
   * @param string $name Required. The relative resource name of the backup to
   * delete, in the following form:projects/{project_number}/locations/{location_i
   * d}/services/{service_id}/backups/{backup_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A request ID. Specify a unique request
   * ID to allow the server to ignore the request if it has completed. The server
   * will ignore subsequent requests that provide a duplicate request ID for at
   * least 60 minutes after the first request.For example, if an initial request
   * times out, followed by another request with the same request ID, the server
   * ignores the second request to prevent the creation of duplicate
   * commitments.The request ID must be a valid UUID
   * (https://en.wikipedia.org/wiki/Universally_unique_identifier#Format) A zero
   * UUID (00000000-0000-0000-0000-000000000000) is not supported.
   * @return Google_Service_DataprocMetastore_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DataprocMetastore_Operation");
  }
  /**
   * Gets details of a single backup. (backups.get)
   *
   * @param string $name Required. The relative resource name of the backup to
   * retrieve, in the following form:projects/{project_number}/locations/{location
   * _id}/services/{service_id}/backups/{backup_id}.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataprocMetastore_Backup
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataprocMetastore_Backup");
  }
  /**
   * Lists backups in a service. (backups.listProjectsLocationsServicesBackups)
   *
   * @param string $parent Required. The relative resource name of the service
   * whose backups to list, in the following form:projects/{project_number}/locati
   * ons/{location_id}/services/{service_id}/backups.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter to apply to list results.
   * @opt_param string orderBy Optional. Specify the ordering of results as
   * described in Sorting Order
   * (https://cloud.google.com/apis/design/design_patterns#sorting_order). If not
   * specified, the results will be sorted in the default order.
   * @opt_param int pageSize Optional. The maximum number of backups to return.
   * The response may contain less than the maximum number. If unspecified, no
   * more than 500 backups are returned. The maximum value is 1000; values above
   * 1000 are changed to 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * DataprocMetastore.ListBackups call. Provide this token to retrieve the
   * subsequent page.To retrieve the first page, supply an empty page token.When
   * paginating, other parameters provided to DataprocMetastore.ListBackups must
   * match the call that provided the page token.
   * @return Google_Service_DataprocMetastore_ListBackupsResponse
   */
  public function listProjectsLocationsServicesBackups($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataprocMetastore_ListBackupsResponse");
  }
}
