<?php

/**
 * ideaItem filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseideaItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'body'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'      => new sfWidgetFormChoice(array('choices' => array('' => '', 'Vraag' => 'Vraag', 'Probleem' => 'Probleem', 'Idee' => 'Idee'))),
      'parent_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Followup'), 'add_empty' => true)),
      'user_id'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'title'     => new sfValidatorPass(array('required' => false)),
      'body'      => new sfValidatorPass(array('required' => false)),
      'type'      => new sfValidatorChoice(array('required' => false, 'choices' => array('Vraag' => 'Vraag', 'Probleem' => 'Probleem', 'Idee' => 'Idee'))),
      'parent_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Followup'), 'column' => 'id')),
      'user_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('idea_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ideaItem';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'title'     => 'Text',
      'body'      => 'Text',
      'type'      => 'Enum',
      'parent_id' => 'ForeignKey',
      'user_id'   => 'Number',
    );
  }
}
