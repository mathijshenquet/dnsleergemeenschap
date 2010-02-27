<?php

/**
 * leerlijnSleutelinzichtLeerjaar form base class.
 *
 * @package    form
 * @subpackage leerlijn_sleutelinzicht_leerjaar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnSleutelinzichtLeerjaarForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'leerjaar_id'       => new sfWidgetFormInputHidden(),
      'sleutelinzicht_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'leerjaar_id'       => new sfValidatorDoctrineChoice(array('model' => 'leerlijnSleutelinzichtLeerjaar', 'column' => 'leerjaar_id', 'required' => false)),
      'sleutelinzicht_id' => new sfValidatorDoctrineChoice(array('model' => 'leerlijnSleutelinzichtLeerjaar', 'column' => 'sleutelinzicht_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_sleutelinzicht_leerjaar[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnSleutelinzichtLeerjaar';
  }

}
