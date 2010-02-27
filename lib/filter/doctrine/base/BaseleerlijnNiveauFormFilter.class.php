<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * leerlijnNiveau filter form base class.
 *
 * @package    filters
 * @subpackage leerlijnNiveau *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseleerlijnNiveauFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(),
      'image'       => new sfWidgetFormFilterInput(),
      'leerjaar_id' => new sfWidgetFormDoctrineChoice(array('model' => 'leerlijnLeerjaar', 'add_empty' => true)),
      'position'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'image'       => new sfValidatorPass(array('required' => false)),
      'leerjaar_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'leerlijnLeerjaar', 'column' => 'id')),
      'position'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_niveau_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnNiveau';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'image'       => 'Text',
      'leerjaar_id' => 'ForeignKey',
      'position'    => 'Number',
    );
  }
}