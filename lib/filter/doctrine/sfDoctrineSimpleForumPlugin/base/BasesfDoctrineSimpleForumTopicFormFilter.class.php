<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * sfDoctrineSimpleForumTopic filter form base class.
 *
 * @package    filters
 * @subpackage sfDoctrineSimpleForumTopic *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasesfDoctrineSimpleForumTopicFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'          => new sfWidgetFormFilterInput(),
      'is_sticked'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_locked'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'forum_id'       => new sfWidgetFormDoctrineChoice(array('model' => 'sfDoctrineSimpleForumForum', 'add_empty' => true)),
      'latest_post_id' => new sfWidgetFormFilterInput(),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'stripped_title' => new sfWidgetFormFilterInput(),
      'nb_posts'       => new sfWidgetFormFilterInput(),
      'nb_views'       => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'deleted'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'slug'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'          => new sfValidatorPass(array('required' => false)),
      'is_sticked'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_locked'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'forum_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfDoctrineSimpleForumForum', 'column' => 'id')),
      'latest_post_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'stripped_title' => new sfValidatorPass(array('required' => false)),
      'nb_posts'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nb_views'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'deleted'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'slug'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_doctrine_simple_forum_topic_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfDoctrineSimpleForumTopic';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'title'          => 'Text',
      'is_sticked'     => 'Boolean',
      'is_locked'      => 'Boolean',
      'forum_id'       => 'ForeignKey',
      'latest_post_id' => 'Number',
      'user_id'        => 'ForeignKey',
      'stripped_title' => 'Text',
      'nb_posts'       => 'Number',
      'nb_views'       => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'deleted'        => 'Boolean',
      'slug'           => 'Text',
    );
  }
}