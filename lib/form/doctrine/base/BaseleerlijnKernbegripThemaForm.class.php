<?php

/**
 * leerlijnKernbegripThema form base class.
 *
 * @package    form
 * @subpackage leerlijn_kernbegrip_thema
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnKernbegripThemaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'kernbegrip_id' => new sfWidgetFormInputHidden(),
      'thema_id'      => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'kernbegrip_id' => new sfValidatorDoctrineChoice(array('model' => 'leerlijnKernbegripThema', 'column' => 'kernbegrip_id', 'required' => false)),
      'thema_id'      => new sfValidatorDoctrineChoice(array('model' => 'leerlijnKernbegripThema', 'column' => 'thema_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_kernbegrip_thema[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnKernbegripThema';
  }

}
