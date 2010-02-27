<?php

/**
 * leerlijnSleutelinzichtKern form base class.
 *
 * @package    form
 * @subpackage leerlijn_sleutelinzicht_kern
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnSleutelinzichtKernForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sleutelinzicht_id' => new sfWidgetFormInputHidden(),
      'kern_id'           => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'sleutelinzicht_id' => new sfValidatorDoctrineChoice(array('model' => 'leerlijnSleutelinzichtKern', 'column' => 'sleutelinzicht_id', 'required' => false)),
      'kern_id'           => new sfValidatorDoctrineChoice(array('model' => 'leerlijnSleutelinzichtKern', 'column' => 'kern_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_sleutelinzicht_kern[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnSleutelinzichtKern';
  }

}
