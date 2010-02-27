<?php

/**
 * leerlijnLeerjaarThema form base class.
 *
 * @package    form
 * @subpackage leerlijn_leerjaar_thema
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnLeerjaarThemaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'leerjaar_id' => new sfWidgetFormInputHidden(),
      'thema_id'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'leerjaar_id' => new sfValidatorDoctrineChoice(array('model' => 'leerlijnLeerjaarThema', 'column' => 'leerjaar_id', 'required' => false)),
      'thema_id'    => new sfValidatorDoctrineChoice(array('model' => 'leerlijnLeerjaarThema', 'column' => 'thema_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_leerjaar_thema[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnLeerjaarThema';
  }

}
