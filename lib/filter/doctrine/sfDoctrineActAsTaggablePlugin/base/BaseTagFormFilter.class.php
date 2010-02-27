<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Tag filter form base class.
 *
 * @package    filters
 * @subpackage Tag *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseTagFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'             => new sfWidgetFormFilterInput(),
      'is_triple'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'triple_namespace' => new sfWidgetFormFilterInput(),
      'triple_key'       => new sfWidgetFormFilterInput(),
      'triple_value'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'             => new sfValidatorPass(array('required' => false)),
      'is_triple'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'triple_namespace' => new sfValidatorPass(array('required' => false)),
      'triple_key'       => new sfValidatorPass(array('required' => false)),
      'triple_value'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tag_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tag';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'name'             => 'Text',
      'is_triple'        => 'Boolean',
      'triple_namespace' => 'Text',
      'triple_key'       => 'Text',
      'triple_value'     => 'Text',
    );
  }
}