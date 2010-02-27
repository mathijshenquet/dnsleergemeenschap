<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * leerlijnDomein filter form base class.
 *
 * @package    filters
 * @subpackage leerlijnDomein *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseleerlijnDomeinFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(),
      'summary'     => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'image'       => new sfWidgetFormFilterInput(),
      'vak_id'      => new sfWidgetFormDoctrineChoice(array('model' => 'leerlijnVak', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'summary'     => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'image'       => new sfValidatorPass(array('required' => false)),
      'vak_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'leerlijnVak', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_domein_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnDomein';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'summary'     => 'Text',
      'description' => 'Text',
      'image'       => 'Text',
      'vak_id'      => 'ForeignKey',
    );
  }
}