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
 * The "consentStores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $consentStores = $healthcareService->consentStores;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsConsentStores extends Google_Service_Resource
{
  /**
   * Checks if a particular data_id of a User data mapping in the specified
   * consent store is consented for the specified use.
   * (consentStores.checkDataAccess)
   *
   * @param string $consentStore Required. Name of the consent store where the
   * requested data_id is stored, of the form `projects/{project_id}/locations/{lo
   * cation_id}/datasets/{dataset_id}/consentStores/{consent_store_id}`.
   * @param Google_Service_CloudHealthcare_CheckDataAccessRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_CheckDataAccessResponse
   */
  public function checkDataAccess($consentStore, Google_Service_CloudHealthcare_CheckDataAccessRequest $postBody, $optParams = array())
  {
    $params = array('consentStore' => $consentStore, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('checkDataAccess', array($params), "Google_Service_CloudHealthcare_CheckDataAccessResponse");
  }
  /**
   * Creates a new consent store in the parent dataset. Attempting to create a
   * consent store with the same ID as an existing store fails with an
   * ALREADY_EXISTS error. (consentStores.create)
   *
   * @param string $parent Required. The name of the dataset this consent store
   * belongs to.
   * @param Google_Service_CloudHealthcare_ConsentStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consentStoreId Required. The ID of the consent store to
   * create. The string must match the following regex:
   * `[\p{L}\p{N}_\-\.]{1,256}`. Cannot be changed after creation.
   * @return Google_Service_CloudHealthcare_ConsentStore
   */
  public function create($parent, Google_Service_CloudHealthcare_ConsentStore $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudHealthcare_ConsentStore");
  }
  /**
   * Deletes the specified consent store and removes all the consent store's data.
   * (consentStores.delete)
   *
   * @param string $name Required. The resource name of the consent store to
   * delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HealthcareEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudHealthcare_HealthcareEmpty");
  }
  /**
   * Evaluates the user's Consents for all matching User data mappings. Note: User
   * data mappings are indexed asynchronously, which can cause a slight delay
   * between the time mappings are created or updated and when they are included
   * in EvaluateUserConsents results. (consentStores.evaluateUserConsents)
   *
   * @param string $consentStore Required. Name of the consent store to retrieve
   * User data mappings from.
   * @param Google_Service_CloudHealthcare_EvaluateUserConsentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_EvaluateUserConsentsResponse
   */
  public function evaluateUserConsents($consentStore, Google_Service_CloudHealthcare_EvaluateUserConsentsRequest $postBody, $optParams = array())
  {
    $params = array('consentStore' => $consentStore, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('evaluateUserConsents', array($params), "Google_Service_CloudHealthcare_EvaluateUserConsentsResponse");
  }
  /**
   * Gets the specified consent store. (consentStores.get)
   *
   * @param string $name Required. The resource name of the consent store to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_ConsentStore
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudHealthcare_ConsentStore");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (consentStores.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned. Valid values are 0, 1, and 3. Requests specifying an
   * invalid value will be rejected. Requests for policies with any conditional
   * bindings must specify version 3. Policies without any conditional bindings
   * may specify any valid value or leave the field unset. To learn which
   * resources support conditions in their IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Google_Service_CloudHealthcare_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudHealthcare_Policy");
  }
  /**
   * Lists the consent stores in the specified dataset.
   * (consentStores.listProjectsLocationsDatasetsConsentStores)
   *
   * @param string $parent Required. Name of the dataset.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Restricts the stores returned to those
   * matching a filter. Only filtering on labels is supported. For example,
   * `filter=labels.key=value`.
   * @opt_param int pageSize Optional. Limit on the number of consent stores to
   * return in a single response. If not specified, 100 is used. May not be larger
   * than 1000.
   * @opt_param string pageToken Optional. Token to retrieve the next page of
   * results, or empty to get the first page.
   * @return Google_Service_CloudHealthcare_ListConsentStoresResponse
   */
  public function listProjectsLocationsDatasetsConsentStores($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudHealthcare_ListConsentStoresResponse");
  }
  /**
   * Updates the specified consent store. (consentStores.patch)
   *
   * @param string $name Resource name of the consent store, of the form `projects
   * /{project_id}/locations/{location_id}/datasets/{dataset_id}/consentStores/{co
   * nsent_store_id}`. Cannot be changed after creation.
   * @param Google_Service_CloudHealthcare_ConsentStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask that applies to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask. Only the
   * `labels`, `default_consent_ttl`, and `enable_consent_create_on_update` fields
   * are allowed to be updated.
   * @return Google_Service_CloudHealthcare_ConsentStore
   */
  public function patch($name, Google_Service_CloudHealthcare_ConsentStore $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudHealthcare_ConsentStore");
  }
  /**
   * Queries all data_ids that are consented for a specified use in the given
   * consent store and writes them to a specified destination. The returned
   * Operation includes a progress counter for the number of User data mappings
   * processed. Errors are logged to Cloud Logging (see [Viewing error logs in
   * Cloud Logging](https://cloud.google.com/healthcare/docs/how-tos/logging)).
   * For example, the following sample log entry shows a `failed to evaluate
   * consent policy` error that occurred during a QueryAccessibleData call to
   * consent store `projects/{project_id}/locations/{location_id}/datasets/{datase
   * t_id}/consentStores/{consent_store_id}`. ```json jsonPayload: { @type: "type.
   * googleapis.com/google.cloud.healthcare.logging.QueryAccessibleDataLogEntry"
   * error: { code: 9 message: "failed to evaluate consent policy" } resourceName:
   * "projects/{project_id}/locations/{location_id}/datasets/{dataset_id}/consentS
   * tores/{consent_store_id}/consents/{consent_id}" } logName: "projects/{project
   * _id}/logs/healthcare.googleapis.com%2Fquery_accessible_data" operation: { id:
   * "projects/{project_id}/locations/{location_id}/datasets/{dataset_id}/operatio
   * ns/{operation_id}" producer: "healthcare.googleapis.com/QueryAccessibleData"
   * } receiveTimestamp: "TIMESTAMP" resource: { labels: { consent_store_id:
   * "{consent_store_id}" dataset_id: "{dataset_id}" location: "{location_id}"
   * project_id: "{project_id}" } type: "healthcare_consent_store" } severity:
   * "ERROR" timestamp: "TIMESTAMP" ``` (consentStores.queryAccessibleData)
   *
   * @param string $consentStore Required. Name of the consent store to retrieve
   * User data mappings from.
   * @param Google_Service_CloudHealthcare_QueryAccessibleDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Operation
   */
  public function queryAccessibleData($consentStore, Google_Service_CloudHealthcare_QueryAccessibleDataRequest $postBody, $optParams = array())
  {
    $params = array('consentStore' => $consentStore, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('queryAccessibleData', array($params), "Google_Service_CloudHealthcare_Operation");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (consentStores.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudHealthcare_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudHealthcare_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudHealthcare_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (consentStores.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudHealthcare_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudHealthcare_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudHealthcare_TestIamPermissionsResponse");
  }
}
