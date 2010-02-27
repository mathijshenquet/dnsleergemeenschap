<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * expertKernbegrip filter form base class.
 *
 * @package    filters
 * @subpackage expertKernbegrip *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseexpertKernbegripFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('expert_kernbegrip_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'expertKernbegrip';
  }

  public function getFields()
  {
    return array(
      'expert_id'     => 'Number',
      'kernbegrip_id' => 'Number',
    );
  }
}