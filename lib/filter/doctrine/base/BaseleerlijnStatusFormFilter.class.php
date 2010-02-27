<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * leerlijnStatus filter form base class.
 *
 * @package    filters
 * @subpackage leerlijnStatus *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseleerlijnStatusFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sleutelinzicht_id' => new sfWidgetFormDoctrineChoice(array('model' => 'leerlijnSleutelinzicht', 'add_empty' => true)),
      'profile_id'        => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUserProfile', 'add_empty' => true)),
      'state'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'sleutelinzicht_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'leerlijnSleutelinzicht', 'column' => 'id')),
      'profile_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUserProfile', 'column' => 'id')),
      'state'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_status_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnStatus';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'sleutelinzicht_id' => 'ForeignKey',
      'profile_id'        => 'ForeignKey',
      'state'             => 'Number',
    );
  }
}