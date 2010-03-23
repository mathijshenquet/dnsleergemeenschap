<?php

/**
 * sfDoctrineSimpleForumPost filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BasesfDoctrineSimpleForumPostFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'               => new sfWidgetFormFilterInput(),
      'body'                => new sfWidgetFormFilterInput(),
      'markdown_source'     => new sfWidgetFormFilterInput(),
      'topic_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Topic'), 'add_empty' => true)),
      'is_reply_to_comment' => new sfWidgetFormFilterInput(),
      'reply_id'            => new sfWidgetFormFilterInput(),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'forum_id'            => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'deleted_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'title'               => new sfValidatorPass(array('required' => false)),
      'body'                => new sfValidatorPass(array('required' => false)),
      'markdown_source'     => new sfValidatorPass(array('required' => false)),
      'topic_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Topic'), 'column' => 'id')),
      'is_reply_to_comment' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reply_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'forum_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sf_doctrine_simple_forum_post_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

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
      'body'                => 'Text',
      'markdown_source'     => 'Text',
      'topic_id'            => 'ForeignKey',
      'is_reply_to_comment' => 'Number',
      'reply_id'            => 'Number',
      'user_id'             => 'ForeignKey',
      'forum_id'            => 'Number',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
      'deleted_at'          => 'Date',
    );
  }
}
