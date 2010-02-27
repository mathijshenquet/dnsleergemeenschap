<?php

/**
 * sfDoctrineSimpleForumTopic form base class.
 *
 * @package    form
 * @subpackage sf_doctrine_simple_forum_topic
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasesfDoctrineSimpleForumTopicForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'title'          => new sfWidgetFormInput(),
      'is_sticked'     => new sfWidgetFormInputCheckbox(),
      'is_locked'      => new sfWidgetFormInputCheckbox(),
      'forum_id'       => new sfWidgetFormDoctrineChoice(array('model' => 'sfDoctrineSimpleForumForum', 'add_empty' => true)),
      'latest_post_id' => new sfWidgetFormInput(),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'stripped_title' => new sfWidgetFormInput(),
      'nb_posts'       => new sfWidgetFormInput(),
      'nb_views'       => new sfWidgetFormInput(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'deleted'        => new sfWidgetFormInputCheckbox(),
      'slug'           => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => 'sfDoctrineSimpleForumTopic', 'column' => 'id', 'required' => false)),
      'title'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_sticked'     => new sfValidatorBoolean(array('required' => false)),
      'is_locked'      => new sfValidatorBoolean(array('required' => false)),
      'forum_id'       => new sfValidatorDoctrineChoice(array('model' => 'sfDoctrineSimpleForumForum', 'required' => false)),
      'latest_post_id' => new sfValidatorInteger(array('required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'stripped_title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nb_posts'       => new sfValidatorInteger(array('required' => false)),
      'nb_views'       => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'deleted'        => new sfValidatorBoolean(),
      'slug'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_doctrine_simple_forum_topic[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfDoctrineSimpleForumTopic';
  }

}
