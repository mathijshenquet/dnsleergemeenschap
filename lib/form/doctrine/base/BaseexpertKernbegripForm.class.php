<?php

/**
 * expertKernbegrip form base class.
 *
 * @package    form
 * @subpackage expert_kernbegrip
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseexpertKernbegripForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'expert_id'     => new sfWidgetFormInputHidden(),
      'kernbegrip_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'expert_id'     => new sfValidatorDoctrineChoice(array('model' => 'expertKernbegrip', 'column' => 'expert_id', 'required' => false)),
      'kernbegrip_id' => new sfValidatorDoctrineChoice(array('model' => 'expertKernbegrip', 'column' => 'kernbegrip_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('expert_kernbegrip[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'expertKernbegrip';
  }

}
