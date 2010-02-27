<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * ideaItem filter form base class.
 *
 * @package    filters
 * @subpackage ideaItem *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseideaItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'     => new sfWidgetFormFilterInput(),
      'body'      => new sfWidgetFormFilterInput(),
      'type'      => new sfWidgetFormChoice(array('choices' => array('' => '', 'Vraag' => 'Vraag', 'Probleem' => 'Probleem', 'Idee' => 'Idee'))),
      'parent_id' => new sfWidgetFormDoctrineChoice(array('model' => 'ideaItem', 'add_empty' => true)),
      'user_id'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'     => new sfValidatorPass(array('required' => false)),
      'body'      => new sfValidatorPass(array('required' => false)),
      'type'      => new sfValidatorChoice(array('required' => false, 'choices' => array('Vraag' => 'Vraag', 'Probleem' => 'Probleem', 'Idee' => 'Idee'))),
      'parent_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'ideaItem', 'column' => 'id')),
      'user_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('idea_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

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