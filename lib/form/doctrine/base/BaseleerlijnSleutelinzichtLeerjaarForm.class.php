<?php

/**
 * leerlijnSleutelinzichtLeerjaar form base class.
 *
 * @method leerlijnSleutelinzichtLeerjaar getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnSleutelinzichtLeerjaarForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'leerjaar_id'       => new sfWidgetFormInputHidden(),
      'sleutelinzicht_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'leerjaar_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'leerjaar_id', 'required' => false)),
      'sleutelinzicht_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'sleutelinzicht_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_sleutelinzicht_leerjaar[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnSleutelinzichtLeerjaar';
  }

}
