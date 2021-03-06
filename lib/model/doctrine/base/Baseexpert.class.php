<?php

/**
 * Baseexpert
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property enum $type
 * @property string $profession
 * @property string $description
 * @property string $email
 * @property boolean $active
 * @property Doctrine_Collection $Kernbegrip
 * @property Doctrine_Collection $expertKernbegrip
 * 
 * @method string              getName()             Returns the current record's "name" value
 * @method enum                getType()             Returns the current record's "type" value
 * @method string              getProfession()       Returns the current record's "profession" value
 * @method string              getDescription()      Returns the current record's "description" value
 * @method string              getEmail()            Returns the current record's "email" value
 * @method boolean             getActive()           Returns the current record's "active" value
 * @method Doctrine_Collection getKernbegrip()       Returns the current record's "Kernbegrip" collection
 * @method Doctrine_Collection getExpertKernbegrip() Returns the current record's "expertKernbegrip" collection
 * @method expert              setName()             Sets the current record's "name" value
 * @method expert              setType()             Sets the current record's "type" value
 * @method expert              setProfession()       Sets the current record's "profession" value
 * @method expert              setDescription()      Sets the current record's "description" value
 * @method expert              setEmail()            Sets the current record's "email" value
 * @method expert              setActive()           Sets the current record's "active" value
 * @method expert              setKernbegrip()       Sets the current record's "Kernbegrip" collection
 * @method expert              setExpertKernbegrip() Sets the current record's "expertKernbegrip" collection
 * 
 * @package    leerling
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class Baseexpert extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('expert');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('type', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'leerling',
              1 => 'ouder',
              2 => 'leraar',
              3 => 'anders',
             ),
             'default' => 'ouder',
             ));
        $this->hasColumn('profession', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('description', 'string', 4000, array(
             'type' => 'string',
             'length' => '4000',
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('leerlijnKernbegrip as Kernbegrip', array(
             'refClass' => 'expertKernbegrip',
             'local' => 'expert_id',
             'foreign' => 'kernbegrip_id'));

        $this->hasMany('expertKernbegrip', array(
             'local' => 'id',
             'foreign' => 'expert_id'));

        $taggable0 = new Taggable();
        $this->actAs($taggable0);
    }
}