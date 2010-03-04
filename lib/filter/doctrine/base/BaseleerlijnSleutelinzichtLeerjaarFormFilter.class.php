<?php

/**
 * leerlijnSleutelinzichtLeerjaar filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnSleutelinzichtLeerjaarFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('leerlijn_sleutelinzicht_leerjaar_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnSleutelinzichtLeerjaar';
  }

  public function getFields()
  {
    return array(
      'leerjaar_id'       => 'Number',
      'sleutelinzicht_id' => 'Number',
    );
  }
}
