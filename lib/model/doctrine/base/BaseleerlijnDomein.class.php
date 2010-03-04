<?php

/**
 * BaseleerlijnDomein
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $summary
 * @property string $description
 * @property string $image
 * @property integer $vak_id
 * @property leerlijnVak $Vak
 * @property Doctrine_Collection $Eindterm
 * 
 * @method string              getName()        Returns the current record's "name" value
 * @method string              getSummary()     Returns the current record's "summary" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method string              getImage()       Returns the current record's "image" value
 * @method integer             getVakId()       Returns the current record's "vak_id" value
 * @method leerlijnVak         getVak()         Returns the current record's "Vak" value
 * @method Doctrine_Collection getEindterm()    Returns the current record's "Eindterm" collection
 * @method leerlijnDomein      setName()        Sets the current record's "name" value
 * @method leerlijnDomein      setSummary()     Sets the current record's "summary" value
 * @method leerlijnDomein      setDescription() Sets the current record's "description" value
 * @method leerlijnDomein      setImage()       Sets the current record's "image" value
 * @method leerlijnDomein      setVakId()       Sets the current record's "vak_id" value
 * @method leerlijnDomein      setVak()         Sets the current record's "Vak" value
 * @method leerlijnDomein      setEindterm()    Sets the current record's "Eindterm" collection
 * 
 * @package    leerling
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseleerlijnDomein extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('leerlijn_domein');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('summary', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('description', 'string', 4000, array(
             'type' => 'string',
             'length' => '4000',
             ));
        $this->hasColumn('image', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('vak_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('leerlijnVak as Vak', array(
             'local' => 'vak_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('leerlijnEindterm as Eindterm', array(
             'local' => 'id',
             'foreign' => 'domein_id'));
    }
}