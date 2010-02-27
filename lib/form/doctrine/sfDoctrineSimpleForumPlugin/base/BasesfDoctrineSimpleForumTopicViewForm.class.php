<?php

/**
 * sfDoctrineSimpleForumTopicView form base class.
 *
 * @package    form
 * @subpackage sf_doctrine_simple_forum_topic_view
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasesfDoctrineSimpleForumTopicViewForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormInputHidden(),
      'topic_id'   => new sfWidgetFormInputHidden(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'deleted'    => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => 'sfDoctrineSimpleForumTopicView', 'column' => 'id', 'required' => false)),
      'user_id'    => new sfValidatorDoctrineChoice(array('model' => 'sfDoctrineSimpleForumTopicView', 'column' => 'user_id', 'required' => false)),
      'topic_id'   => new sfValidatorDoctrineChoice(array('model' => 'sfDoctrineSimpleForumTopicView', 'column' => 'topic_id', 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'deleted'    => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('sf_doctrine_simple_forum_topic_view[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfDoctrineSimpleForumTopicView';
  }

}
