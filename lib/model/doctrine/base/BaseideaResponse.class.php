<?php

/**
 * BaseideaResponse
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $body
 * @property integer $user_id
 * @property integer $item_id
 * @property ideaItem $Item
 * 
 * @method string       getBody()    Returns the current record's "body" value
 * @method integer      getUserId()  Returns the current record's "user_id" value
 * @method integer      getItemId()  Returns the current record's "item_id" value
 * @method ideaItem     getItem()    Returns the current record's "Item" value
 * @method ideaResponse setBody()    Sets the current record's "body" value
 * @method ideaResponse setUserId()  Sets the current record's "user_id" value
 * @method ideaResponse setItemId()  Sets the current record's "item_id" value
 * @method ideaResponse setItem()    Sets the current record's "Item" value
 * 
 * @package    leerling
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseideaResponse extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('idea_response');
        $this->hasColumn('body', 'string', 5000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '5000',
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('item_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ideaItem as Item', array(
             'local' => 'item_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}