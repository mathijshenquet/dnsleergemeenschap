<?php

/**
 * leerlijnSleutelinzicht form base class.
 *
 * @method leerlijnSleutelinzicht getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnSleutelinzichtForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'description'   => new sfWidgetFormTextarea(),
      'image'         => new sfWidgetFormInputText(),
      'niveau_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Niveau'), 'add_empty' => true)),
      'kernbegrip_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Kernbegrip'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 4000)),
      'image'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'niveau_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Niveau'), 'required' => false)),
      'kernbegrip_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Kernbegrip'))),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_sleutelinzicht[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnSleutelinzicht';
  }

}
