<?php

/**
 * sfDoctrineSimpleForumTopic form base class.
 *
 * @method sfDoctrineSimpleForumTopic getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BasesfDoctrineSimpleForumTopicForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'title'          => new sfWidgetFormInputText(),
      'is_sticked'     => new sfWidgetFormInputCheckbox(),
      'is_locked'      => new sfWidgetFormInputCheckbox(),
      'forum_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Forum'), 'add_empty' => true)),
      'latest_post_id' => new sfWidgetFormInputText(),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'stripped_title' => new sfWidgetFormInputText(),
      'nb_posts'       => new sfWidgetFormInputText(),
      'nb_views'       => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'deleted_at'     => new sfWidgetFormDateTime(),
      'slug'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'title'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_sticked'     => new sfValidatorBoolean(array('required' => false)),
      'is_locked'      => new sfValidatorBoolean(array('required' => false)),
      'forum_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Forum'), 'required' => false)),
      'latest_post_id' => new sfValidatorInteger(array('required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'stripped_title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nb_posts'       => new sfValidatorInteger(array('required' => false)),
      'nb_views'       => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'deleted_at'     => new sfValidatorDateTime(array('required' => false)),
      'slug'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_doctrine_simple_forum_topic[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfDoctrineSimpleForumTopic';
  }

}
