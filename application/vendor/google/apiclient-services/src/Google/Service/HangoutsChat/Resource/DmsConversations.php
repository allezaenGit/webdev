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
 * The "conversations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chatService = new Google_Service_HangoutsChat(...);
 *   $conversations = $chatService->conversations;
 *  </code>
 */
class Google_Service_HangoutsChat_Resource_DmsConversations extends Google_Service_Resource
{
  /**
   * Legacy path for creating message. Calling these will result in a BadRequest
   * response. (conversations.messages)
   *
   * @param string $parent Required. Space resource name, in the form "spaces".
   * Example: spaces/AAAAMpdlehY
   * @param Google_Service_HangoutsChat_Message $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string threadKey Opaque thread identifier string that can be
   * specified to group messages into a single thread. If this is the first
   * message with a given thread identifier, a new thread is created. Subsequent
   * messages with the same thread identifier will be posted into the same thread.
   * This relieves bots and webhooks from having to store the Hangouts Chat thread
   * ID of a thread (created earlier by them) to post further updates to it. Has
   * no effect if thread field, corresponding to an existing thread, is set in
   * message.
   * @return Google_Service_HangoutsChat_Message
   */
  public function messages($parent, Google_Service_HangoutsChat_Message $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('messages', array($params), "Google_Service_HangoutsChat_Message");
  }
}
