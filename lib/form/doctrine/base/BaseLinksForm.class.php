<?php

/**
 * Links form base class.
 *
 * @package    form
 * @subpackage links
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseLinksForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'title'     => new sfWidgetFormInput(),
      'image'     => new sfWidgetFormInput(),
      'url'       => new sfWidgetFormTextarea(),
      'is_active' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => 'Links', 'column' => 'id', 'required' => false)),
      'title'     => new sfValidatorString(array('max_length' => 255)),
      'image'     => new sfValidatorString(array('max_length' => 255)),
      'url'       => new sfValidatorString(array('max_length' => 1000)),
      'is_active' => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('links[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Links';
  }

}
