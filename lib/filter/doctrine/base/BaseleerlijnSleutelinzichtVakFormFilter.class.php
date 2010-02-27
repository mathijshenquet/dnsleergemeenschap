<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * leerlijnSleutelinzichtVak filter form base class.
 *
 * @package    filters
 * @subpackage leerlijnSleutelinzichtVak *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseleerlijnSleutelinzichtVakFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('leerlijn_sleutelinzicht_vak_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnSleutelinzichtVak';
  }

  public function getFields()
  {
    return array(
      'sleutelinzicht_id' => 'Number',
      'vak_id'            => 'Number',
    );
  }
}