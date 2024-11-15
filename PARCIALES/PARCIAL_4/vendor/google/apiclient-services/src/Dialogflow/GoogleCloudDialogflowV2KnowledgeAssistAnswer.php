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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2KnowledgeAssistAnswer extends \Google\Model
{
  /**
   * @var string
   */
  public $answerRecord;
  protected $suggestedQueryType = GoogleCloudDialogflowV2KnowledgeAssistAnswerSuggestedQuery::class;
  protected $suggestedQueryDataType = '';
  protected $suggestedQueryAnswerType = GoogleCloudDialogflowV2KnowledgeAssistAnswerKnowledgeAnswer::class;
  protected $suggestedQueryAnswerDataType = '';

  /**
   * @param string
   */
  public function setAnswerRecord($answerRecord)
  {
    $this->answerRecord = $answerRecord;
  }
  /**
   * @return string
   */
  public function getAnswerRecord()
  {
    return $this->answerRecord;
  }
  /**
   * @param GoogleCloudDialogflowV2KnowledgeAssistAnswerSuggestedQuery
   */
  public function setSuggestedQuery(GoogleCloudDialogflowV2KnowledgeAssistAnswerSuggestedQuery $suggestedQuery)
  {
    $this->suggestedQuery = $suggestedQuery;
  }
  /**
   * @return GoogleCloudDialogflowV2KnowledgeAssistAnswerSuggestedQuery
   */
  public function getSuggestedQuery()
  {
    return $this->suggestedQuery;
  }
  /**
   * @param GoogleCloudDialogflowV2KnowledgeAssistAnswerKnowledgeAnswer
   */
  public function setSuggestedQueryAnswer(GoogleCloudDialogflowV2KnowledgeAssistAnswerKnowledgeAnswer $suggestedQueryAnswer)
  {
    $this->suggestedQueryAnswer = $suggestedQueryAnswer;
  }
  /**
   * @return GoogleCloudDialogflowV2KnowledgeAssistAnswerKnowledgeAnswer
   */
  public function getSuggestedQueryAnswer()
  {
    return $this->suggestedQueryAnswer;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2KnowledgeAssistAnswer::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2KnowledgeAssistAnswer');
