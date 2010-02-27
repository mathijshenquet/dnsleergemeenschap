<?php

/**
 * leerlijnKernbegripVak form base class.
 *
 * @package    form
 * @subpackage leerlijn_kernbegrip_vak
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnKernbegripVakForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'kernbegrip_id' => new sfWidgetFormInputHidden(),
      'vak_id'        => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'kernbegrip_id' => new sfValidatorDoctrineChoice(array('model' => 'leerlijnKernbegripVak', 'column' => 'kernbegrip_id', 'required' => false)),
      'vak_id'        => new sfValidatorDoctrineChoice(array('model' => 'leerlijnKernbegripVak', 'column' => 'vak_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_kernbegrip_vak[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnKernbegripVak';
  }

}
