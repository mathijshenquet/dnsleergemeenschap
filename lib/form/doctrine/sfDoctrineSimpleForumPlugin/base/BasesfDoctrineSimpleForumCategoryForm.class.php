<?php

/**
 * sfDoctrineSimpleForumCategory form base class.
 *
 * @method sfDoctrineSimpleForumCategory getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BasesfDoctrineSimpleForumCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormTextarea(),
      'stripped_name' => new sfWidgetFormTextarea(),
      'description'   => new sfWidgetFormTextarea(),
      'rank'          => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'deleted_at'    => new sfWidgetFormDateTime(),
      'slug'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'          => new sfValidatorString(array('required' => false)),
      'stripped_name' => new sfValidatorString(array('required' => false)),
      'description'   => new sfValidatorString(array('required' => false)),
      'rank'          => new sfValidatorInteger(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'deleted_at'    => new sfValidatorDateTime(array('required' => false)),
      'slug'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_doctrine_simple_forum_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfDoctrineSimpleForumCategory';
  }

}
