<?php

/**
 * Baseshowcase
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property string $short_title
 * @property string $description
 * @property string $image
 * @property integer $user_id
 * @property boolean $is_active
 * @property sfGuardUser $User
 * 
 * @method string      getTitle()       Returns the current record's "title" value
 * @method string      getShortTitle()  Returns the current record's "short_title" value
 * @method string      getDescription() Returns the current record's "description" value
 * @method string      getImage()       Returns the current record's "image" value
 * @method integer     getUserId()      Returns the current record's "user_id" value
 * @method boolean     getIsActive()    Returns the current record's "is_active" value
 * @method sfGuardUser getUser()        Returns the current record's "User" value
 * @method showcase    setTitle()       Sets the current record's "title" value
 * @method showcase    setShortTitle()  Sets the current record's "short_title" value
 * @method showcase    setDescription() Sets the current record's "description" value
 * @method showcase    setImage()       Sets the current record's "image" value
 * @method showcase    setUserId()      Sets the current record's "user_id" value
 * @method showcase    setIsActive()    Sets the current record's "is_active" value
 * @method showcase    setUser()        Sets the current record's "User" value
 * 
 * @package    leerling
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class Baseshowcase extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('showcase');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('short_title', 'string', 32, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '32',
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('image', 'string', 1000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '1000',
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}