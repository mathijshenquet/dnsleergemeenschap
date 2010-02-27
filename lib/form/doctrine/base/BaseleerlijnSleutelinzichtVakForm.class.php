<?php

/**
 * leerlijnSleutelinzichtVak form base class.
 *
 * @package    form
 * @subpackage leerlijn_sleutelinzicht_vak
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnSleutelinzichtVakForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sleutelinzicht_id' => new sfWidgetFormInputHidden(),
      'vak_id'            => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'sleutelinzicht_id' => new sfValidatorDoctrineChoice(array('model' => 'leerlijnSleutelinzichtVak', 'column' => 'sleutelinzicht_id', 'required' => false)),
      'vak_id'            => new sfValidatorDoctrineChoice(array('model' => 'leerlijnSleutelinzichtVak', 'column' => 'vak_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_sleutelinzicht_vak[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnSleutelinzichtVak';
  }

}
