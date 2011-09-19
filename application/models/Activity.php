<?php

/**
 * Activity
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Activity extends BaseActivity
{
    private $_author;
    
    public function getMessage(){
        $str = "";
        
        $this->_author = Doctrine::getTable("User")->find($this->author_id);
        
        switch ($this->activity_type_id) {
            case ActivityType::$VOTED_ON_COMMENT:
                $str = $this->toStringVotedOnComment();
                break;
            case ActivityType::$VOTED_ON_ANSWER:
                $str = $this->toStringVotedOnAnswer();
                break;
            case ActivityType::$VOTED_ON_ANSWER_CONCEPT :
                $str = $this->toStringVotedOnAnswerConcept();
                break;
            case ActivityType::$VOTED_ON_EXAMPLE_CONCEPT:
                $str = $this->toStringVotedOnExampleConcept();
                break;
            case ActivityType::$COMMENTED_ON_COMMENT:
                $str = $this->toStringCommentedOnComment();
                break;
            case ActivityType::$COMMENTED_ON_ANSWER:
                $str = $this->toStringCommentedOnAnswer();
                break;
            case ActivityType::$COMMENTED_ON_EXAMPLE:
                $str = $this->toStringCommentedOnExample();
                break;
            case ActivityType::$ASSESSED_COMMENT:
                $str = $this->toStringAssessedComment();
                break;
            case ActivityType::$ASSESSED_EXAMPLE:
                $str = $this->toStringAssessedExample();
                break;
            case ActivityType::$ASSESSED_ANSWER:
                $str = $this->toStringAssessedAnswer();
                break;
            case ActivityType::$CREATED_EXAMPLE:
                $str = $this->toStringCreatedExample();
                break;
            case ActivityType::$CREATED_QUESTION:
                $str = $this->toStringCreatedQuestion();
                break;
            case ActivityType::$ANSWERED_QUESTION:
                $str = $this->toStringAnsweredQuestion();
                break;
            case ActivityType::$VOTED_ON_QUESTION_CONCEPT:
                $str = $this->toStringVotedOnQuestionConcept();
                break;
            case ActivityType::$VOTED_ON_EXAMPLE_QUESTION:
                $str = $this->toStringVotedOnExampleQuestion();
                break;
            case ActivityType::$TAGGED_QUESTION_WITH_CONCEPT:
                $str = $this->toStringTaggedQuestionWithConcept();
                break;
            case ActivityType::$TAGGED_EXAMPLE_WITH_CONCEPT:
                $str = $this->toStringTaggedExampleWithConcept();
                break;

            default:
                $str = "Error: unidentified activity type"; 
                break;
        }
        
        return $str;
    }
    

    public function toStringVotedOnComment() {
        $vote = Doctrine::getTable("Vote")->find($this->i1);
        $comment = Doctrine::getTable("Comment")->find($this->i2);
        
        // $commentable = Doctrine::getTable('Commentable')->find(Commentable::COMMENT);
        // $objectCommentedOn = Doctrine::getTable($commentable->object)->find($comment->obj_id);
        // $url = $objectCommentedOn->getUrl();
        $verb = $vote->vote_value > 0 ? "up" : "down";
        
        $str = $this->_genAuthorHtml()." voted $verb a <a href=''>comment</a> **needs fix**";
        return "<div class='alert'>$str</div>";
    }
    
    public function toStringVotedOnAnswer() {
        $vote = Doctrine::getTable("Vote")->find($this->i1);
        $answer = Doctrine::getTable("Answer")->find($this->i2);
        $url = $answer->getUrl();
        
        $str = $this->_genAuthorHtml()." voted on an <a href='$url'>answer</a>";
        return "<div class='alert'>$str</div>";
    }
    
    //tested
    public function toStringVotedOnAnswerConcept() {
        return "Error: This activity should never happen!!";
    }
    public function toStringCommentedOnComment() {
        $comment1 = Doctrine::getTable("Comment")->find($this->i1);
        $comment2 = Doctrine::getTable("Comment")->find($this->i2);
        
        $url = $comment2->getUrl();
        
        $str = $this->_genAuthorHtml()." replied to a <a href='$url'>comment</a> **needs fix**";
        return "<div class='alert'>$str</div>";
    }
    public function toStringCommentedOnAnswer() {
        $comment = Doctrine::getTable("Comment")->find($this->i1);
        $answer = Doctrine::getTable("Answer")->find($this->i2);
        
        $answerUrl = $answer->getUrl();
        $answerName = $answer->name;
        
        $str = $this->_genAuthorHtml()." commented on an answer(<a href='$url'>$answerName</a>)";
        return "<div class='alert'>$str</div>";
    }
    public function toStringCommentedOnExample() {
        $comment = Doctrine::getTable("Comment")->find($this->i1);
        $example = Doctrine::getTable("Example")->find($this->i2);
        
        $exampleUrl = $example->getUrl();
        $exampleName = $xample->name;

        $str = $this->_genAuthorHtml()." commented on example <a href='$exampleUrl'>$exampleName</a>";
        return "<div class='alert-comments'>$str</div>";
    }
    
    public function toStringAssessedComment() {
        return "assessed a comment **should not be public**";
    }
    
    public function toStringAssessedExample() {
        return "assessed an example **should not be public**";
    }
    
    public function toStringAssessedAnswer() {
        return "assessed an answer **should not be public**";
    }
    
    //tested
    public function toStringCreatedExample(){
        $example = Doctrine::getTable("Example")->find($this->i1);
        
        $exampleUrl = $example->getUrl();
        $exampleName = $example->name;
        
        $str = $this->_genAuthorHtml()." created example <a href='$exampleUrl'>$exampleName</a>";
        return "<div class='alert-example'>$str</div>";
    }
    
    //tested
    public function toStringCreatedQuestion() {
        $question = Doctrine::getTable('Question')->find($this->i1);
        $url = $question->getUrl();
        
        $str = $this->_genAuthorHtml()." created a question(<a href='$url'>".$question->name."</a>)";
        return "<div class='alert-comments'>$str</div>";
    }
    
    //tested
    public function toStringAnsweredQuestion(){
        $answer = Doctrine::getTable('Answer')->find($this->i1);
        $question = Doctrine::getTable('Question')->find($this->i2);
        
        $questionUrl = $question->getUrl();
        $questionName = $question->name;
        
        $str = $this->_genAuthorHtml()." answered question <a href='$questionUrl'>$questionName</a>";
        return "<div class='alert-example'>$str</div>";
    }
    
    
    public function toStringVotedOnExampleConcept() {
        $example = Doctrine::getTable('Example')->find($this->i1);
        $exampleConcept = Doctrine::getTable('ExampleConcept')->find($this->i2);
        $concept = Doctrine::getTable('Concept')->find($exampleConcept->concept_id);
        $vote = Doctrine_Query::create()
                ->select("*")
                ->from("Vote v")
                ->where("v.obj_id = ?", $exampleConcept->id)
                ->andWhere("v.obj_type = ?", Votable::$EXAMPLE_CONCEPT)
                ->andWhere("v.author_id = ?", $this->author_id)
                ->execute();
        $vote = $vote[0];
        
        $exampleUrl = $example->getUrl();
        $exampleName = $example->name;
        $conceptName = $concept->name;
        
        $verb = $vote->vote_value > 0 ? 'agrees' : 'disagrees';
        
        $str = $this->_genAuthorHtml()." $verb that <a href='$exampleUrl'>$exampleName</a> relates to '$conceptName'";
        return "<div class='alert-example'>$str</div>";
    }
    
    //tested
    public function toStringVotedOnQuestionConcept(){
        $question = Doctrine::getTable('Question')->find($this->i1);
        $questionConcept = Doctrine::getTable('QuestionConcept')->find($this->i2);
        $concept = Doctrine::getTable('Concept')->find($questionConcept->concept_id);
        $vote = Doctrine_Query::create()
                ->select("*")
                ->from("Vote v")
                ->where("v.obj_id = ?", $questionConcept->id)
                ->andWhere("v.obj_type = ?", Votable::$QUESTION_CONCEPT)
                ->andWhere("v.author_id = ?", $this->author_id)
                ->execute();
        $vote = $vote[0];
        
        $questionUrl = $question->getUrl();
        $questionName = $question->name;
        $conceptName = $concept->name;
        
        $verb = $vote->vote_value > 0 ? 'agrees' : 'disagrees';
        
        $str = $this->_genAuthorHtml()." $verb that <a href='$questionUrl'>$questionName</a> relates to '$conceptName'";
        return "<div class='alert-example'>$str</div>";
    }
    //tested
    public function toStringVotedOnExampleQuestion(){
        return "Error: This activity should never happen!!";
    }
    public function toStringTaggedQuestionWithConcept(){
        $question = Doctrine::getTable('Question')->find($this->i1);
        $questionConcept = Doctrine::getTable('QuestionConcept')->find($this->i2);
        $concept = Doctrine::getTable('Concept')->find($questionConcept->concept_id);
        
        $questionUrl = $question->getUrl();
        $questionName = $question->name;
        $conceptName = $concept->name;
        
        $str = $this->_genAuthorHtml()." tagged question <a href='$questionUrl'>$questionName</a> with '$conceptName'";
        
        return "<div class='alert-example'>$str</div>";
    }
    public function toStringTaggedExampleWithConcept(){
        $example = Doctrine::getTable('Example')->find($this->i1);
        $exampleConcept = Doctrine::getTable('ExampleConcept')->find($this->i2);
        $concept = Doctrine::getTable('Concept')->find($exampleConcept->concept_id);
        
        $exampleUrl = $example->getUrl();
        $exampleName = $example->name;
        $conceptName = $concept->name;
        
        $str = $this->_genAuthorHtml()." tagged example <a href='$exampleUrl'>$exampleName</a> with '$conceptName'";
        
        return "<div class='alert-example'>$str</div>";
    }    
    
    
    
    
    private function _genAuthorHtml(){
        return "<strong>".$this->_author->username."</strong>";
    }
}