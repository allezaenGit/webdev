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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1ConversationEvent extends Google_Model
{
  public $conversation;
  protected $errorStatusType = 'Google_Service_Dialogflow_GoogleRpcStatus';
  protected $errorStatusDataType = '';
  protected $newMessagePayloadType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1Message';
  protected $newMessagePayloadDataType = '';
  public $type;

  public function setConversation($conversation)
  {
    $this->conversation = $conversation;
  }
  public function getConversation()
  {
    return $this->conversation;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleRpcStatus
   */
  public function setErrorStatus(Google_Service_Dialogflow_GoogleRpcStatus $errorStatus)
  {
    $this->errorStatus = $errorStatus;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleRpcStatus
   */
  public function getErrorStatus()
  {
    return $this->errorStatus;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1Message
   */
  public function setNewMessagePayload(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1Message $newMessagePayload)
  {
    $this->newMessagePayload = $newMessagePayload;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1Message
   */
  public function getNewMessagePayload()
  {
    return $this->newMessagePayload;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
