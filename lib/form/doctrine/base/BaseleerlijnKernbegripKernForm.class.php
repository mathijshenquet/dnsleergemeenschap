<?php

/**
 * leerlijnKernbegripKern form base class.
 *
 * @package    form
 * @subpackage leerlijn_kernbegrip_kern
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnKernbegripKernForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'kernbegrip_id' => new sfWidgetFormInputHidden(),
      'kern_id'       => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'kernbegrip_id' => new sfValidatorDoctrineChoice(array('model' => 'leerlijnKernbegripKern', 'column' => 'kernbegrip_id', 'required' => false)),
      'kern_id'       => new sfValidatorDoctrineChoice(array('model' => 'leerlijnKernbegripKern', 'column' => 'kern_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_kernbegrip_kern[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnKernbegripKern';
  }

}
