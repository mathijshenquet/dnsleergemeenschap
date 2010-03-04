<?php

/**
 * BasesfDoctrineSimpleForumPost
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $topic_id
 * @property integer $is_reply_to_comment
 * @property integer $reply_id
 * @property integer $user_id
 * @property integer $forum_id
 * @property sfDoctrineSimpleForumTopic $Topic
 * @property sfGuardUser $User
 * @property Doctrine_Collection $Forum
 * 
 * @method integer                    getId()                  Returns the current record's "id" value
 * @method string                     getTitle()               Returns the current record's "title" value
 * @method string                     getContent()             Returns the current record's "content" value
 * @method integer                    getTopicId()             Returns the current record's "topic_id" value
 * @method integer                    getIsReplyToComment()    Returns the current record's "is_reply_to_comment" value
 * @method integer                    getReplyId()             Returns the current record's "reply_id" value
 * @method integer                    getUserId()              Returns the current record's "user_id" value
 * @method integer                    getForumId()             Returns the current record's "forum_id" value
 * @method sfDoctrineSimpleForumTopic getTopic()               Returns the current record's "Topic" value
 * @method sfGuardUser                getUser()                Returns the current record's "User" value
 * @method Doctrine_Collection        getForum()               Returns the current record's "Forum" collection
 * @method sfDoctrineSimpleForumPost  setId()                  Sets the current record's "id" value
 * @method sfDoctrineSimpleForumPost  setTitle()               Sets the current record's "title" value
 * @method sfDoctrineSimpleForumPost  setContent()             Sets the current record's "content" value
 * @method sfDoctrineSimpleForumPost  setTopicId()             Sets the current record's "topic_id" value
 * @method sfDoctrineSimpleForumPost  setIsReplyToComment()    Sets the current record's "is_reply_to_comment" value
 * @method sfDoctrineSimpleForumPost  setReplyId()             Sets the current record's "reply_id" value
 * @method sfDoctrineSimpleForumPost  setUserId()              Sets the current record's "user_id" value
 * @method sfDoctrineSimpleForumPost  setForumId()             Sets the current record's "forum_id" value
 * @method sfDoctrineSimpleForumPost  setTopic()               Sets the current record's "Topic" value
 * @method sfDoctrineSimpleForumPost  setUser()                Sets the current record's "User" value
 * @method sfDoctrineSimpleForumPost  setForum()               Sets the current record's "Forum" collection
 * 
 * @package    leerling
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BasesfDoctrineSimpleForumPost extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_doctrine_simple_forum_post');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('content', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('topic_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('is_reply_to_comment', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'length' => '1',
             ));
        $this->hasColumn('reply_id', 'integer', 10, array(
             'type' => 'integer',
             'length' => '10',
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('forum_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfDoctrineSimpleForumTopic as Topic', array(
             'local' => 'topic_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasMany('sfDoctrineSimpleForumForum as Forum', array(
             'local' => 'id',
             'foreign' => 'latest_post_Id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $softdelete0 = new Doctrine_Template_SoftDelete();
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}