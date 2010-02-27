<?php

/**
 * leerlijnState form base class.
 *
 * @package    form
 * @subpackage leerlijn_state
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnStateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id' => new sfValidatorDoctrineChoice(array('model' => 'leerlijnState', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_state[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnState';
  }

}
