<?php

/**
 * leerlijnSleutelinzicht filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnSleutelinzichtFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'description'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image'         => new sfWidgetFormFilterInput(),
      'niveau_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Niveau'), 'add_empty' => true)),
      'kernbegrip_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Kernbegrip'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'description'   => new sfValidatorPass(array('required' => false)),
      'image'         => new sfValidatorPass(array('required' => false)),
      'niveau_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Niveau'), 'column' => 'id')),
      'kernbegrip_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Kernbegrip'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_sleutelinzicht_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnSleutelinzicht';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'description'   => 'Text',
      'image'         => 'Text',
      'niveau_id'     => 'ForeignKey',
      'kernbegrip_id' => 'ForeignKey',
    );
  }
}
