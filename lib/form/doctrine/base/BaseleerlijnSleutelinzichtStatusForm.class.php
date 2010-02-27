<?php

/**
 * leerlijnSleutelinzichtStatus form base class.
 *
 * @package    form
 * @subpackage leerlijn_sleutelinzicht_status
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnSleutelinzichtStatusForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sleutelinzicht_id' => new sfWidgetFormInputHidden(),
      'profile_id'        => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'sleutelinzicht_id' => new sfValidatorDoctrineChoice(array('model' => 'leerlijnSleutelinzichtStatus', 'column' => 'sleutelinzicht_id', 'required' => false)),
      'profile_id'        => new sfValidatorDoctrineChoice(array('model' => 'leerlijnSleutelinzichtStatus', 'column' => 'profile_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_sleutelinzicht_status[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnSleutelinzichtStatus';
  }

}
