<?php

/**
 * sfDoctrineSimpleForumPost form base class.
 *
 * @package    form
 * @subpackage sf_doctrine_simple_forum_post
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasesfDoctrineSimpleForumPostForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'title'               => new sfWidgetFormInput(),
      'content'             => new sfWidgetFormTextarea(),
      'topic_id'            => new sfWidgetFormDoctrineChoice(array('model' => 'sfDoctrineSimpleForumTopic', 'add_empty' => true)),
      'is_reply_to_comment' => new sfWidgetFormInput(),
      'reply_id'            => new sfWidgetFormInput(),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'forum_id'            => new sfWidgetFormInput(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
      'deleted'             => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorDoctrineChoice(array('model' => 'sfDoctrineSimpleForumPost', 'column' => 'id', 'required' => false)),
      'title'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'content'             => new sfValidatorString(array('required' => false)),
      'topic_id'            => new sfValidatorDoctrineChoice(array('model' => 'sfDoctrineSimpleForumTopic', 'required' => false)),
      'is_reply_to_comment' => new sfValidatorInteger(array('required' => false)),
      'reply_id'            => new sfValidatorInteger(array('required' => false)),
      'user_id'             => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'forum_id'            => new sfValidatorInteger(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
      'updated_at'          => new sfValidatorDateTime(array('required' => false)),
      'deleted'             => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('sf_doctrine_simple_forum_post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfDoctrineSimpleForumPost';
  }

}
