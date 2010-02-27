<?php

/**
 * sfGuardUserProfile form base class.
 *
 * @package    form
 * @subpackage sf_guard_user_profile
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasesfGuardUserProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'email'       => new sfWidgetFormInput(),
      'first_name'  => new sfWidgetFormInput(),
      'last_name'   => new sfWidgetFormInput(),
      'preposition' => new sfWidgetFormInput(),
      'is_invite'   => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUserProfile', 'column' => 'id', 'required' => false)),
      'user_id'     => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'email'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'first_name'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last_name'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'preposition' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_invite'   => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }

}
