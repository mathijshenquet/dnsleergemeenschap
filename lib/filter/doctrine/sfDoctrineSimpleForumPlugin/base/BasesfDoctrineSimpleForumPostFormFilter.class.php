<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * sfDoctrineSimpleForumPost filter form base class.
 *
 * @package    filters
 * @subpackage sfDoctrineSimpleForumPost *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasesfDoctrineSimpleForumPostFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'               => new sfWidgetFormFilterInput(),
      'content'             => new sfWidgetFormFilterInput(),
      'topic_id'            => new sfWidgetFormDoctrineChoice(array('model' => 'sfDoctrineSimpleForumTopic', 'add_empty' => true)),
      'is_reply_to_comment' => new sfWidgetFormFilterInput(),
      'reply_id'            => new sfWidgetFormFilterInput(),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'forum_id'            => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'deleted'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'title'               => new sfValidatorPass(array('required' => false)),
      'content'             => new sfValidatorPass(array('required' => false)),
      'topic_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfDoctrineSimpleForumTopic', 'column' => 'id')),
      'is_reply_to_comment' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reply_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'forum_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'deleted'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('sf_doctrine_simple_forum_post_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfDoctrineSimpleForumPost';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'title'               => 'Text',
      'content'             => 'Text',
      'topic_id'            => 'ForeignKey',
      'is_reply_to_comment' => 'Number',
      'reply_id'            => 'Number',
      'user_id'             => 'ForeignKey',
      'forum_id'            => 'Number',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
      'deleted'             => 'Boolean',
    );
  }
}