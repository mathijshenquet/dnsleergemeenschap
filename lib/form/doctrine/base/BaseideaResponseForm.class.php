<?php

/**
 * ideaResponse form base class.
 *
 * @package    form
 * @subpackage idea_response
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseideaResponseForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'body'    => new sfWidgetFormTextarea(),
      'user_id' => new sfWidgetFormInput(),
      'item_id' => new sfWidgetFormDoctrineChoice(array('model' => 'ideaItem', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorDoctrineChoice(array('model' => 'ideaResponse', 'column' => 'id', 'required' => false)),
      'body'    => new sfValidatorString(array('max_length' => 5000)),
      'user_id' => new sfValidatorInteger(),
      'item_id' => new sfValidatorDoctrineChoice(array('model' => 'ideaItem')),
    ));

    $this->widgetSchema->setNameFormat('idea_response[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ideaResponse';
  }

}
