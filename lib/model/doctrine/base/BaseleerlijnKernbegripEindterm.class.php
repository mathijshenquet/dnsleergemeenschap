<?php

/**
 * BaseleerlijnKernbegripEindterm
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $kernbegrip_id
 * @property integer $eindterm_id
 * @property leerlijnKernbegrip $leerlijnKernbegrip
 * @property leerlijnEindterm $leerlijnEindterm
 * 
 * @method integer                    getKernbegripId()       Returns the current record's "kernbegrip_id" value
 * @method integer                    getEindtermId()         Returns the current record's "eindterm_id" value
 * @method leerlijnKernbegrip         getLeerlijnKernbegrip() Returns the current record's "leerlijnKernbegrip" value
 * @method leerlijnEindterm           getLeerlijnEindterm()   Returns the current record's "leerlijnEindterm" value
 * @method leerlijnKernbegripEindterm setKernbegripId()       Sets the current record's "kernbegrip_id" value
 * @method leerlijnKernbegripEindterm setEindtermId()         Sets the current record's "eindterm_id" value
 * @method leerlijnKernbegripEindterm setLeerlijnKernbegrip() Sets the current record's "leerlijnKernbegrip" value
 * @method leerlijnKernbegripEindterm setLeerlijnEindterm()   Sets the current record's "leerlijnEindterm" value
 * 
 * @package    leerling
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseleerlijnKernbegripEindterm extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('leerlijn_kernbegrip_eindterm');
        $this->hasColumn('kernbegrip_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('eindterm_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('leerlijnKernbegrip', array(
             'local' => 'kernbegrip_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('leerlijnEindterm', array(
             'local' => 'eindterm_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}