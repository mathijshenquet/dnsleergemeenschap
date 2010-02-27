<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * leerlijnLeerjaarThema filter form base class.
 *
 * @package    filters
 * @subpackage leerlijnLeerjaarThema *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseleerlijnLeerjaarThemaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('leerlijn_leerjaar_thema_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnLeerjaarThema';
  }

  public function getFields()
  {
    return array(
      'leerjaar_id' => 'Number',
      'thema_id'    => 'Number',
    );
  }
}