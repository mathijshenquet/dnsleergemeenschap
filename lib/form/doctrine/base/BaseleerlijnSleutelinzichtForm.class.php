<?php

/**
 * leerlijnSleutelinzicht form base class.
 *
 * @package    form
 * @subpackage leerlijn_sleutelinzicht
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnSleutelinzichtForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'description'   => new sfWidgetFormTextarea(),
      'image'         => new sfWidgetFormInput(),
      'niveau_id'     => new sfWidgetFormDoctrineChoice(array('model' => 'leerlijnNiveau', 'add_empty' => true)),
      'kernbegrip_id' => new sfWidgetFormDoctrineChoice(array('model' => 'leerlijnKernbegrip', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => 'leerlijnSleutelinzicht', 'column' => 'id', 'required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 4000)),
      'image'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'niveau_id'     => new sfValidatorDoctrineChoice(array('model' => 'leerlijnNiveau', 'required' => false)),
      'kernbegrip_id' => new sfValidatorDoctrineChoice(array('model' => 'leerlijnKernbegrip')),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_sleutelinzicht[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnSleutelinzicht';
  }

}
