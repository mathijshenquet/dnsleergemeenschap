<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * ideaResponse filter form base class.
 *
 * @package    filters
 * @subpackage ideaResponse *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseideaResponseFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'body'    => new sfWidgetFormFilterInput(),
      'user_id' => new sfWidgetFormFilterInput(),
      'item_id' => new sfWidgetFormDoctrineChoice(array('model' => 'ideaItem', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'body'    => new sfValidatorPass(array('required' => false)),
      'user_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'item_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'ideaItem', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('idea_response_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

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