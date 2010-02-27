<?php

/**
 * leerlijnStatus form base class.
 *
 * @package    form
 * @subpackage leerlijn_status
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnStatusForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'sleutelinzicht_id' => new sfWidgetFormDoctrineChoice(array('model' => 'leerlijnSleutelinzicht', 'add_empty' => false)),
      'profile_id'        => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUserProfile', 'add_empty' => false)),
      'state'             => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorDoctrineChoice(array('model' => 'leerlijnStatus', 'column' => 'id', 'required' => false)),
      'sleutelinzicht_id' => new sfValidatorDoctrineChoice(array('model' => 'leerlijnSleutelinzicht')),
      'profile_id'        => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUserProfile')),
      'state'             => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_status[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnStatus';
  }

}
