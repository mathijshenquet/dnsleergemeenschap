<?php

/**
 * BaseideaItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property string $body
 * @property enum $type
 * @property integer $parent_id
 * @property integer $user_id
 * @property ideaItem $Followup
 * @property Doctrine_Collection $Parent
 * @property Doctrine_Collection $Response
 * 
 * @method string              getTitle()     Returns the current record's "title" value
 * @method string              getBody()      Returns the current record's "body" value
 * @method enum                getType()      Returns the current record's "type" value
 * @method integer             getParentId()  Returns the current record's "parent_id" value
 * @method integer             getUserId()    Returns the current record's "user_id" value
 * @method ideaItem            getFollowup()  Returns the current record's "Followup" value
 * @method Doctrine_Collection getParent()    Returns the current record's "Parent" collection
 * @method Doctrine_Collection getResponse()  Returns the current record's "Response" collection
 * @method ideaItem            setTitle()     Sets the current record's "title" value
 * @method ideaItem            setBody()      Sets the current record's "body" value
 * @method ideaItem            setType()      Sets the current record's "type" value
 * @method ideaItem            setParentId()  Sets the current record's "parent_id" value
 * @method ideaItem            setUserId()    Sets the current record's "user_id" value
 * @method ideaItem            setFollowup()  Sets the current record's "Followup" value
 * @method ideaItem            setParent()    Sets the current record's "Parent" collection
 * @method ideaItem            setResponse()  Sets the current record's "Response" collection
 * 
 * @package    leerling
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseideaItem extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('idea_item');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('body', 'string', 5000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '5000',
             ));
        $this->hasColumn('type', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'Vraag',
              1 => 'Probleem',
              2 => 'Idee',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('parent_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ideaItem as Followup', array(
             'local' => 'parent_id',
             'foreign' => 'id'));

        $this->hasMany('ideaItem as Parent', array(
             'local' => 'id',
             'foreign' => 'parent_id'));

        $this->hasMany('ideaResponse as Response', array(
             'local' => 'id',
             'foreign' => 'item_id'));
    }
}