<?php

/**
 * Profile form base class.
 *
 * @package    form
 * @subpackage profile
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'email'       => new sfWidgetFormInputText(),
      'first_name'  => new sfWidgetFormInputText(),
      'last_name'   => new sfWidgetFormInputText(),
      'preposition' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => 'Profile', 'column' => 'id', 'required' => false)),
      'user_id'     => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser')),
      'email'       => new sfValidatorString(array('max_length' => 255)),
      'first_name'  => new sfValidatorString(array('max_length' => 255)),
      'last_name'   => new sfValidatorString(array('max_length' => 255)),
      'preposition' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Profile', 'column' => array('user_id')))
    );

    $this->widgetSchema->setNameFormat('profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

}
