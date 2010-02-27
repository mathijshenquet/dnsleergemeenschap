<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * sfDoctrineSimpleForumForum filter form base class.
 *
 * @package    filters
 * @subpackage sfDoctrineSimpleForumForum *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasesfDoctrineSimpleForumForumFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'           => new sfWidgetFormFilterInput(),
      'description'    => new sfWidgetFormFilterInput(),
      'rank'           => new sfWidgetFormFilterInput(),
      'category_id'    => new sfWidgetFormDoctrineChoice(array('model' => 'sfDoctrineSimpleForumCategory', 'add_empty' => true)),
      'stripped_name'  => new sfWidgetFormFilterInput(),
      'latest_post_id' => new sfWidgetFormDoctrineChoice(array('model' => 'sfDoctrineSimpleForumPost', 'add_empty' => true)),
      'nb_posts'       => new sfWidgetFormFilterInput(),
      'nb_topics'      => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'deleted'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'slug'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'           => new sfValidatorPass(array('required' => false)),
      'description'    => new sfValidatorPass(array('required' => false)),
      'rank'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'category_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfDoctrineSimpleForumCategory', 'column' => 'id')),
      'stripped_name'  => new sfValidatorPass(array('required' => false)),
      'latest_post_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfDoctrineSimpleForumPost', 'column' => 'id')),
      'nb_posts'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nb_topics'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'deleted'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'slug'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_doctrine_simple_forum_forum_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfDoctrineSimpleForumForum';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'name'           => 'Text',
      'description'    => 'Text',
      'rank'           => 'Number',
      'category_id'    => 'ForeignKey',
      'stripped_name'  => 'Text',
      'latest_post_id' => 'ForeignKey',
      'nb_posts'       => 'Number',
      'nb_topics'      => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'deleted'        => 'Boolean',
      'slug'           => 'Text',
    );
  }
}