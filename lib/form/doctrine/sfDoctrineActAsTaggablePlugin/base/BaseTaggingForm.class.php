<?php

/**
 * Tagging form base class.
 *
 * @package    form
 * @subpackage tagging
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseTaggingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'tag_id'         => new sfWidgetFormDoctrineChoice(array('model' => 'Tag', 'add_empty' => false)),
      'taggable_model' => new sfWidgetFormInput(),
      'taggable_id'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => 'Tagging', 'column' => 'id', 'required' => false)),
      'tag_id'         => new sfValidatorDoctrineChoice(array('model' => 'Tag')),
      'taggable_model' => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'taggable_id'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tagging[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tagging';
  }

}
