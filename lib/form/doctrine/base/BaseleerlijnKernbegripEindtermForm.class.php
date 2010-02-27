<?php

/**
 * leerlijnKernbegripEindterm form base class.
 *
 * @package    form
 * @subpackage leerlijn_kernbegrip_eindterm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnKernbegripEindtermForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'kernbegrip_id' => new sfWidgetFormInputHidden(),
      'eindterm_id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'kernbegrip_id' => new sfValidatorDoctrineChoice(array('model' => 'leerlijnKernbegripEindterm', 'column' => 'kernbegrip_id', 'required' => false)),
      'eindterm_id'   => new sfValidatorDoctrineChoice(array('model' => 'leerlijnKernbegripEindterm', 'column' => 'eindterm_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_kernbegrip_eindterm[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnKernbegripEindterm';
  }

}
