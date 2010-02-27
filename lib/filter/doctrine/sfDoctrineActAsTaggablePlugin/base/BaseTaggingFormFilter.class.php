<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Tagging filter form base class.
 *
 * @package    filters
 * @subpackage Tagging *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseTaggingFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tag_id'         => new sfWidgetFormDoctrineChoice(array('model' => 'Tag', 'add_empty' => true)),
      'taggable_model' => new sfWidgetFormFilterInput(),
      'taggable_id'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'tag_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Tag', 'column' => 'id')),
      'taggable_model' => new sfValidatorPass(array('required' => false)),
      'taggable_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tagging_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tagging';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'tag_id'         => 'ForeignKey',
      'taggable_model' => 'Text',
      'taggable_id'    => 'Number',
    );
  }
}