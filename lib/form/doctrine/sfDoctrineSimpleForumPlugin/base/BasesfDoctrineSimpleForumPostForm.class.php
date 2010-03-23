<?php

/**
 * sfDoctrineSimpleForumPost form base class.
 *
 * @method sfDoctrineSimpleForumPost getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BasesfDoctrineSimpleForumPostForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'title'               => new sfWidgetFormInputText(),
      'body'                => new sfWidgetFormTextarea(),
      'markdown_source'     => new sfWidgetFormTextarea(),
      'topic_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Topic'), 'add_empty' => true)),
      'is_reply_to_comment' => new sfWidgetFormInputText(),
      'reply_id'            => new sfWidgetFormInputText(),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'forum_id'            => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
      'deleted_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'title'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'body'                => new sfValidatorString(array('required' => false)),
      'markdown_source'     => new sfValidatorString(array('required' => false)),
      'topic_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Topic'), 'required' => false)),
      'is_reply_to_comment' => new sfValidatorInteger(array('required' => false)),
      'reply_id'            => new sfValidatorInteger(array('required' => false)),
      'user_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'forum_id'            => new sfValidatorInteger(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
      'deleted_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_doctrine_simple_forum_post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfDoctrineSimpleForumPost';
  }

}
