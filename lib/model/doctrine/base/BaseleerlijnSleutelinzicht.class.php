<?php

/**
 * BaseleerlijnSleutelinzicht
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $description
 * @property string $image
 * @property integer $niveau_id
 * @property integer $kernbegrip_id
 * @property leerlijnKernbegrip $Kernbegrip
 * @property leerlijnNiveau $Niveau
 * @property leerlijnStatus $Status
 * @property Doctrine_Collection $leerlijnSleutelinzichtLeerjaar
 * 
 * @method string                 getDescription()                    Returns the current record's "description" value
 * @method string                 getImage()                          Returns the current record's "image" value
 * @method integer                getNiveauId()                       Returns the current record's "niveau_id" value
 * @method integer                getKernbegripId()                   Returns the current record's "kernbegrip_id" value
 * @method leerlijnKernbegrip     getKernbegrip()                     Returns the current record's "Kernbegrip" value
 * @method leerlijnNiveau         getNiveau()                         Returns the current record's "Niveau" value
 * @method leerlijnStatus         getStatus()                         Returns the current record's "Status" value
 * @method Doctrine_Collection    getLeerlijnSleutelinzichtLeerjaar() Returns the current record's "leerlijnSleutelinzichtLeerjaar" collection
 * @method leerlijnSleutelinzicht setDescription()                    Sets the current record's "description" value
 * @method leerlijnSleutelinzicht setImage()                          Sets the current record's "image" value
 * @method leerlijnSleutelinzicht setNiveauId()                       Sets the current record's "niveau_id" value
 * @method leerlijnSleutelinzicht setKernbegripId()                   Sets the current record's "kernbegrip_id" value
 * @method leerlijnSleutelinzicht setKernbegrip()                     Sets the current record's "Kernbegrip" value
 * @method leerlijnSleutelinzicht setNiveau()                         Sets the current record's "Niveau" value
 * @method leerlijnSleutelinzicht setStatus()                         Sets the current record's "Status" value
 * @method leerlijnSleutelinzicht setLeerlijnSleutelinzichtLeerjaar() Sets the current record's "leerlijnSleutelinzichtLeerjaar" collection
 * 
 * @package    leerling
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseleerlijnSleutelinzicht extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('leerlijn_sleutelinzicht');
        $this->hasColumn('description', 'string', 4000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '4000',
             ));
        $this->hasColumn('image', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('niveau_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('kernbegrip_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('leerlijnKernbegrip as Kernbegrip', array(
             'local' => 'kernbegrip_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('leerlijnNiveau as Niveau', array(
             'local' => 'niveau_id',
             'foreign' => 'id'));

        $this->hasOne('leerlijnStatus as Status', array(
             'local' => 'id',
             'foreign' => 'sleutelinzicht_id'));

        $this->hasMany('leerlijnSleutelinzichtLeerjaar', array(
             'local' => 'id',
             'foreign' => 'sleutelinzicht_id'));
    }
}