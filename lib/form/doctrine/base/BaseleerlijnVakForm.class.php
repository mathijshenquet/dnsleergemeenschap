<?php

/**
 * leerlijnVak form base class.
 *
 * @method leerlijnVak getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnVakForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'summary'       => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormTextarea(),
      'image'         => new sfWidgetFormInputText(),
      'leergebied_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Leergebied'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 255)),
      'summary'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'image'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'leergebied_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Leergebied'))),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_vak[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnVak';
  }

}
