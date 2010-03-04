<?php

/**
 * leerlijnLeerjaarThema form base class.
 *
 * @method leerlijnLeerjaarThema getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnLeerjaarThemaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'leerjaar_id' => new sfWidgetFormInputHidden(),
      'thema_id'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'leerjaar_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'leerjaar_id', 'required' => false)),
      'thema_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'thema_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_leerjaar_thema[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnLeerjaarThema';
  }

}
