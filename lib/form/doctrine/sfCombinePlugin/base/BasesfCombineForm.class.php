<?php

/**
 * sfCombine form base class.
 *
 * @package    form
 * @subpackage sf_combine
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasesfCombineForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'assets_key' => new sfWidgetFormInputHidden(),
      'files'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'assets_key' => new sfValidatorDoctrineChoice(array('model' => 'sfCombine', 'column' => 'assets_key', 'required' => false)),
      'files'      => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('sf_combine[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfCombine';
  }

}
