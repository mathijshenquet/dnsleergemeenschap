<?php

/**
 * sfDoctrineSimpleForumForum form base class.
 *
 * @package    form
 * @subpackage sf_doctrine_simple_forum_forum
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasesfDoctrineSimpleForumForumForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormTextarea(),
      'description'    => new sfWidgetFormTextarea(),
      'rank'           => new sfWidgetFormInput(),
      'category_id'    => new sfWidgetFormDoctrineChoice(array('model' => 'sfDoctrineSimpleForumCategory', 'add_empty' => true)),
      'stripped_name'  => new sfWidgetFormInput(),
      'latest_post_id' => new sfWidgetFormDoctrineChoice(array('model' => 'sfDoctrineSimpleForumPost', 'add_empty' => true)),
      'nb_posts'       => new sfWidgetFormInput(),
      'nb_topics'      => new sfWidgetFormInput(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'deleted'        => new sfWidgetFormInputCheckbox(),
      'slug'           => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => 'sfDoctrineSimpleForumForum', 'column' => 'id', 'required' => false)),
      'name'           => new sfValidatorString(array('required' => false)),
      'description'    => new sfValidatorString(array('required' => false)),
      'rank'           => new sfValidatorInteger(array('required' => false)),
      'category_id'    => new sfValidatorDoctrineChoice(array('model' => 'sfDoctrineSimpleForumCategory', 'required' => false)),
      'stripped_name'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'latest_post_id' => new sfValidatorDoctrineChoice(array('model' => 'sfDoctrineSimpleForumPost', 'required' => false)),
      'nb_posts'       => new sfValidatorInteger(array('required' => false)),
      'nb_topics'      => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'deleted'        => new sfValidatorBoolean(),
      'slug'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_doctrine_simple_forum_forum[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfDoctrineSimpleForumForum';
  }

}
