<?php

/**
 * ideaItem form base class.
 *
 * @package    form
 * @subpackage idea_item
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseideaItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'title'     => new sfWidgetFormInput(),
      'body'      => new sfWidgetFormTextarea(),
      'type'      => new sfWidgetFormChoice(array('choices' => array('Vraag' => 'Vraag', 'Probleem' => 'Probleem', 'Idee' => 'Idee'))),
      'parent_id' => new sfWidgetFormDoctrineChoice(array('model' => 'ideaItem', 'add_empty' => true)),
      'user_id'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => 'ideaItem', 'column' => 'id', 'required' => false)),
      'title'     => new sfValidatorString(array('max_length' => 255)),
      'body'      => new sfValidatorString(array('max_length' => 5000)),
      'type'      => new sfValidatorChoice(array('choices' => array('Vraag' => 'Vraag', 'Probleem' => 'Probleem', 'Idee' => 'Idee'))),
      'parent_id' => new sfValidatorDoctrineChoice(array('model' => 'ideaItem', 'required' => false)),
      'user_id'   => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('idea_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ideaItem';
  }

}
