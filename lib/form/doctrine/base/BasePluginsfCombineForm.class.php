<?php

/**
 * PluginsfCombine form base class.
 *
 * @method PluginsfCombine getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BasePluginsfCombineForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'assets_key' => new sfWidgetFormInputHidden(),
      'files'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'assets_key' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'assets_key', 'required' => false)),
      'files'      => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('pluginsf_combine[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PluginsfCombine';
  }

}
