<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BasesfCombine extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_combine');
        $this->hasColumn('assets_key', 'string', 32, array(
             'type' => 'string',
             'primary' => true,
             'length' => '32',
             ));
        $this->hasColumn('files', 'clob', null, array(
             'type' => 'clob',
             'notnull' => true,
             ));
    }

}