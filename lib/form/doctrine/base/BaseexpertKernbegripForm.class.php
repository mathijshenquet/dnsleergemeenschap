<?php

/**
 * expertKernbegrip form base class.
 *
 * @method expertKernbegrip getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseexpertKernbegripForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'expert_id'     => new sfWidgetFormInputHidden(),
      'kernbegrip_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'expert_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'expert_id', 'required' => false)),
      'kernbegrip_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'kernbegrip_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('expert_kernbegrip[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'expertKernbegrip';
  }

}
