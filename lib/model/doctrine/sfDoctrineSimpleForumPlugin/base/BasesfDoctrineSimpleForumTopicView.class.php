<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BasesfDoctrineSimpleForumTopicView extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_doctrine_simple_forum_topic_view');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => '4',
             ));
        $this->hasColumn('topic_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasOne('sfGuardUser', array(
             'local' => 'id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('sfDoctrineSimpleForumTopic', array(
             'local' => 'topic_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $softdelete0 = new Doctrine_Template_SoftDelete();
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}