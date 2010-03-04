<?php

/**
 * leerlijnKernbegripEindterm form base class.
 *
 * @method leerlijnKernbegripEindterm getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnKernbegripEindtermForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'kernbegrip_id' => new sfWidgetFormInputHidden(),
      'eindterm_id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'kernbegrip_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'kernbegrip_id', 'required' => false)),
      'eindterm_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'eindterm_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_kernbegrip_eindterm[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnKernbegripEindterm';
  }

}
