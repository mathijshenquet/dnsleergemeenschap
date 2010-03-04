<?php

/**
 * ideaItem form base class.
 *
 * @method ideaItem getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseideaItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'title'     => new sfWidgetFormInputText(),
      'body'      => new sfWidgetFormTextarea(),
      'type'      => new sfWidgetFormChoice(array('choices' => array('Vraag' => 'Vraag', 'Probleem' => 'Probleem', 'Idee' => 'Idee'))),
      'parent_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Followup'), 'add_empty' => true)),
      'user_id'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'title'     => new sfValidatorString(array('max_length' => 255)),
      'body'      => new sfValidatorString(array('max_length' => 5000)),
      'type'      => new sfValidatorChoice(array('choices' => array(0 => 'Vraag', 1 => 'Probleem', 2 => 'Idee'))),
      'parent_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Followup'), 'required' => false)),
      'user_id'   => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('idea_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ideaItem';
  }

}
