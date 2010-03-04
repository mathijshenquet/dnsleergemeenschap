<?php

/**
 * PluginsfCombine filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BasePluginsfCombineFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'files'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'files'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pluginsf_combine_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

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
