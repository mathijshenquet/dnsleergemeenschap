<?php

/**
 * sfGuardUserProfile filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'email'       => new sfWidgetFormFilterInput(),
      'first_name'  => new sfWidgetFormFilterInput(),
      'last_name'   => new sfWidgetFormFilterInput(),
      'preposition' => new sfWidgetFormFilterInput(),
      'image'       => new sfWidgetFormFilterInput(),
      'is_invite'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'user_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'email'       => new sfValidatorPass(array('required' => false)),
      'first_name'  => new sfValidatorPass(array('required' => false)),
      'last_name'   => new sfValidatorPass(array('required' => false)),
      'preposition' => new sfValidatorPass(array('required' => false)),
      'image'       => new sfValidatorPass(array('required' => false)),
      'is_invite'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'user_id'     => 'ForeignKey',
      'email'       => 'Text',
      'first_name'  => 'Text',
      'last_name'   => 'Text',
      'preposition' => 'Text',
      'image'       => 'Text',
      'is_invite'   => 'Boolean',
    );
  }
}
