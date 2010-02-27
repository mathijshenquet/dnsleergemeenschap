<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * leerlijnVak filter form base class.
 *
 * @package    filters
 * @subpackage leerlijnVak *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseleerlijnVakFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(),
      'summary'       => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(),
      'image'         => new sfWidgetFormFilterInput(),
      'leergebied_id' => new sfWidgetFormDoctrineChoice(array('model' => 'leerlijnLeergebied', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'summary'       => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
      'image'         => new sfValidatorPass(array('required' => false)),
      'leergebied_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'leerlijnLeergebied', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_vak_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnVak';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'name'          => 'Text',
      'summary'       => 'Text',
      'description'   => 'Text',
      'image'         => 'Text',
      'leergebied_id' => 'ForeignKey',
    );
  }
}