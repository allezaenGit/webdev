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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SuggestionResult extends Google_Model
{
  protected $errorType = 'Google_Service_Dialogflow_GoogleRpcStatus';
  protected $errorDataType = '';
  protected $suggestArticlesResponseType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SuggestArticlesResponse';
  protected $suggestArticlesResponseDataType = '';
  protected $suggestFaqAnswersResponseType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SuggestFaqAnswersResponse';
  protected $suggestFaqAnswersResponseDataType = '';
  protected $suggestSmartRepliesResponseType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SuggestSmartRepliesResponse';
  protected $suggestSmartRepliesResponseDataType = '';

  /**
   * @param Google_Service_Dialogflow_GoogleRpcStatus
   */
  public function setError(Google_Service_Dialogflow_GoogleRpcStatus $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleRpcStatus
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SuggestArticlesResponse
   */
  public function setSuggestArticlesResponse(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SuggestArticlesResponse $suggestArticlesResponse)
  {
    $this->suggestArticlesResponse = $suggestArticlesResponse;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SuggestArticlesResponse
   */
  public function getSuggestArticlesResponse()
  {
    return $this->suggestArticlesResponse;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SuggestFaqAnswersResponse
   */
  public function setSuggestFaqAnswersResponse(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SuggestFaqAnswersResponse $suggestFaqAnswersResponse)
  {
    $this->suggestFaqAnswersResponse = $suggestFaqAnswersResponse;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SuggestFaqAnswersResponse
   */
  public function getSuggestFaqAnswersResponse()
  {
    return $this->suggestFaqAnswersResponse;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SuggestSmartRepliesResponse
   */
  public function setSuggestSmartRepliesResponse(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SuggestSmartRepliesResponse $suggestSmartRepliesResponse)
  {
    $this->suggestSmartRepliesResponse = $suggestSmartRepliesResponse;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SuggestSmartRepliesResponse
   */
  public function getSuggestSmartRepliesResponse()
  {
    return $this->suggestSmartRepliesResponse;
  }
}
