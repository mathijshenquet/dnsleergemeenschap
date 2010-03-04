<?php

/**
 * BasesfGuardUserProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $preposition
 * @property boolean $is_invite
 * @property sfGuardUser $User
 * 
 * @method integer            getId()          Returns the current record's "id" value
 * @method integer            getUserId()      Returns the current record's "user_id" value
 * @method string             getEmail()       Returns the current record's "email" value
 * @method string             getFirstName()   Returns the current record's "first_name" value
 * @method string             getLastName()    Returns the current record's "last_name" value
 * @method string             getPreposition() Returns the current record's "preposition" value
 * @method boolean            getIsInvite()    Returns the current record's "is_invite" value
 * @method sfGuardUser        getUser()        Returns the current record's "User" value
 * @method sfGuardUserProfile setId()          Sets the current record's "id" value
 * @method sfGuardUserProfile setUserId()      Sets the current record's "user_id" value
 * @method sfGuardUserProfile setEmail()       Sets the current record's "email" value
 * @method sfGuardUserProfile setFirstName()   Sets the current record's "first_name" value
 * @method sfGuardUserProfile setLastName()    Sets the current record's "last_name" value
 * @method sfGuardUserProfile setPreposition() Sets the current record's "preposition" value
 * @method sfGuardUserProfile setIsInvite()    Sets the current record's "is_invite" value
 * @method sfGuardUserProfile setUser()        Sets the current record's "User" value
 * 
 * @package    leerling
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BasesfGuardUserProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_profile');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('first_name', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('last_name', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('preposition', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('is_invite', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}