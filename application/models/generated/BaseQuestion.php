<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Question', 'main');

/**
 * BaseQuestion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $run_id
 * @property integer $author_id
 * @property timestamp $date_modified
 * @property timestamp $date_created
 * @property string $name
 * @property enum $type
 * @property string $content
 * @property string $media_content
 * @property string $media_path
 * @property string $media_type
 * @property integer $choices
 * @property integer $status
 * @property integer $is_published
 * @property integer $is_public
 * @property integer $allow_multipe_answer
 * @property Run $Run
 * @property User $User
 * @property Doctrine_Collection $Answer
 * @property Doctrine_Collection $QuestionConcept
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseQuestion extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('question');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('run_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('author_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('date_modified', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('date_created', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('type', 'enum', 4, array(
             'type' => 'enum',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'MC',
              1 => 'LONG',
             ),
             'primary' => false,
             'default' => 'MC',
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('content', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('media_content', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('media_path', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('media_type', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('choices', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('status', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('is_published', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('is_public', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('allow_multipe_answer', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Run', array(
             'local' => 'run_id',
             'foreign' => 'id'));

        $this->hasOne('User', array(
             'local' => 'author_id',
             'foreign' => 'id'));

        $this->hasMany('Answer', array(
             'local' => 'id',
             'foreign' => 'question_id'));

        $this->hasMany('QuestionConcept', array(
             'local' => 'id',
             'foreign' => 'question_id'));
    }
}