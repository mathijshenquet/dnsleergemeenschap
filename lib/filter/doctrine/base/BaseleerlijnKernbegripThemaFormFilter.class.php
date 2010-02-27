<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * leerlijnKernbegripThema filter form base class.
 *
 * @package    filters
 * @subpackage leerlijnKernbegripThema *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseleerlijnKernbegripThemaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('leerlijn_kernbegrip_thema_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnKernbegripThema';
  }

  public function getFields()
  {
    return array(
      'kernbegrip_id' => 'Number',
      'thema_id'      => 'Number',
    );
  }
}