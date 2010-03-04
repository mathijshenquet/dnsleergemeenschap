<?php

/**
 * leerlijnNiveau form base class.
 *
 * @method leerlijnNiveau getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnNiveauForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'image'       => new sfWidgetFormInputText(),
      'leerjaar_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Leerjaar'), 'add_empty' => true)),
      'position'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'image'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'leerjaar_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Leerjaar'), 'required' => false)),
      'position'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'leerlijnNiveau', 'column' => array('position')))
    );

    $this->widgetSchema->setNameFormat('leerlijn_niveau[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnNiveau';
  }

}
