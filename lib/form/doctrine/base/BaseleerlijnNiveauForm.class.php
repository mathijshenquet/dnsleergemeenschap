<?php

/**
 * leerlijnNiveau form base class.
 *
 * @package    form
 * @subpackage leerlijn_niveau
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnNiveauForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInput(),
      'image'       => new sfWidgetFormInput(),
      'leerjaar_id' => new sfWidgetFormDoctrineChoice(array('model' => 'leerlijnLeerjaar', 'add_empty' => true)),
      'position'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => 'leerlijnNiveau', 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'image'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'leerjaar_id' => new sfValidatorDoctrineChoice(array('model' => 'leerlijnLeerjaar', 'required' => false)),
      'position'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'leerlijnNiveau', 'column' => array('position')))
    );

    $this->widgetSchema->setNameFormat('leerlijn_niveau[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnNiveau';
  }

}
