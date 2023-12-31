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

class Google_Service_CloudHealthcare_ParserConfig extends Google_Model
{
  public $allowNullHeader;
  protected $schemaType = 'Google_Service_CloudHealthcare_SchemaPackage';
  protected $schemaDataType = '';
  public $segmentTerminator;

  public function setAllowNullHeader($allowNullHeader)
  {
    $this->allowNullHeader = $allowNullHeader;
  }
  public function getAllowNullHeader()
  {
    return $this->allowNullHeader;
  }
  /**
   * @param Google_Service_CloudHealthcare_SchemaPackage
   */
  public function setSchema(Google_Service_CloudHealthcare_SchemaPackage $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return Google_Service_CloudHealthcare_SchemaPackage
   */
  public function getSchema()
  {
    return $this->schema;
  }
  public function setSegmentTerminator($segmentTerminator)
  {
    $this->segmentTerminator = $segmentTerminator;
  }
  public function getSegmentTerminator()
  {
    return $this->segmentTerminator;
  }
}
