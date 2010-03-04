<?php

/**
 * leerlijnStatus form base class.
 *
 * @method leerlijnStatus getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnStatusForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sleutelinzicht_id' => new sfWidgetFormInputHidden(),
      'user_id'           => new sfWidgetFormInputHidden(),
      'state'             => new sfWidgetFormChoice(array('choices' => array('not_started' => 'not_started', 'in_progress' => 'in_progress', 'completed' => 'completed'))),
    ));

    $this->setValidators(array(
      'sleutelinzicht_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'sleutelinzicht_id', 'required' => false)),
      'user_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'user_id', 'required' => false)),
      'state'             => new sfValidatorChoice(array('choices' => array(0 => 'not_started', 1 => 'in_progress', 2 => 'completed'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_status[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnStatus';
  }

}
