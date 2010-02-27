<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * PluginsfCombine filter form base class.
 *
 * @package    filters
 * @subpackage PluginsfCombine *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasePluginsfCombineFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'files'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'files'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pluginsf_combine_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PluginsfCombine';
  }

  public function getFields()
  {
    return array(
      'assets_key' => 'Text',
      'files'      => 'Text',
    );
  }
}