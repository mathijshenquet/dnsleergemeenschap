<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * leerlijnSleutelinzichtKern filter form base class.
 *
 * @package    filters
 * @subpackage leerlijnSleutelinzichtKern *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseleerlijnSleutelinzichtKernFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('leerlijn_sleutelinzicht_kern_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnSleutelinzichtKern';
  }

  public function getFields()
  {
    return array(
      'sleutelinzicht_id' => 'Number',
      'kern_id'           => 'Number',
    );
  }
}