<?php

/**
 * ideaResponse form base class.
 *
 * @method ideaResponse getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseideaResponseForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'body'    => new sfWidgetFormTextarea(),
      'user_id' => new sfWidgetFormInputText(),
      'item_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'body'    => new sfValidatorString(array('max_length' => 5000)),
      'user_id' => new sfValidatorInteger(),
      'item_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Item'))),
    ));

    $this->widgetSchema->setNameFormat('idea_response[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ideaResponse';
  }

}
