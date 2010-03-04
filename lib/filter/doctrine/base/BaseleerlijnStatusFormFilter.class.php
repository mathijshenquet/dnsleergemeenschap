<?php

/**
 * leerlijnStatus filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnStatusFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'state'             => new sfWidgetFormChoice(array('choices' => array('' => '', 'not_started' => 'not_started', 'in_progress' => 'in_progress', 'completed' => 'completed'))),
    ));

    $this->setValidators(array(
      'state'             => new sfValidatorChoice(array('required' => false, 'choices' => array('not_started' => 'not_started', 'in_progress' => 'in_progress', 'completed' => 'completed'))),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_status_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnStatus';
  }

  public function getFields()
  {
    return array(
      'sleutelinzicht_id' => 'Number',
      'user_id'           => 'Number',
      'state'             => 'Enum',
    );
  }
}
