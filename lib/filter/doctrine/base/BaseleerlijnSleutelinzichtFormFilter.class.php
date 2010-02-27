<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * leerlijnSleutelinzicht filter form base class.
 *
 * @package    filters
 * @subpackage leerlijnSleutelinzicht *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseleerlijnSleutelinzichtFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'description'   => new sfWidgetFormFilterInput(),
      'image'         => new sfWidgetFormFilterInput(),
      'niveau_id'     => new sfWidgetFormDoctrineChoice(array('model' => 'leerlijnNiveau', 'add_empty' => true)),
      'kernbegrip_id' => new sfWidgetFormDoctrineChoice(array('model' => 'leerlijnKernbegrip', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'description'   => new sfValidatorPass(array('required' => false)),
      'image'         => new sfValidatorPass(array('required' => false)),
      'niveau_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'leerlijnNiveau', 'column' => 'id')),
      'kernbegrip_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'leerlijnKernbegrip', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_sleutelinzicht_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

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