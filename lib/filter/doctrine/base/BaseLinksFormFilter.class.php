<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Links filter form base class.
 *
 * @package    filters
 * @subpackage Links *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseLinksFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'     => new sfWidgetFormFilterInput(),
      'image'     => new sfWidgetFormFilterInput(),
      'url'       => new sfWidgetFormFilterInput(),
      'is_active' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'title'     => new sfValidatorPass(array('required' => false)),
      'image'     => new sfValidatorPass(array('required' => false)),
      'url'       => new sfValidatorPass(array('required' => false)),
      'is_active' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('links_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Links';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'title'     => 'Text',
      'image'     => 'Text',
      'url'       => 'Text',
      'is_active' => 'Boolean',
    );
  }
}