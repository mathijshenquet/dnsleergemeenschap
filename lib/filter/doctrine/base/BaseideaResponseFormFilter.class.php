<?php

/**
 * ideaResponse filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseideaResponseFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'body'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'item_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'body'    => new sfValidatorPass(array('required' => false)),
      'user_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'item_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Item'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('idea_response_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ideaResponse';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'body'    => 'Text',
      'user_id' => 'Number',
      'item_id' => 'ForeignKey',
    );
  }
}
