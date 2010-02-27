<?php

/**
 * showcase form base class.
 *
 * @package    form
 * @subpackage showcase
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseshowcaseForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'title'       => new sfWidgetFormInput(),
      'short_title' => new sfWidgetFormInput(),
      'description' => new sfWidgetFormTextarea(),
      'image'       => new sfWidgetFormTextarea(),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'is_active'   => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => 'showcase', 'column' => 'id', 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'short_title' => new sfValidatorString(array('max_length' => 32)),
      'description' => new sfValidatorString(array('required' => false)),
      'image'       => new sfValidatorString(array('max_length' => 1000)),
      'user_id'     => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser')),
      'is_active'   => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('showcase[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'showcase';
  }

}
