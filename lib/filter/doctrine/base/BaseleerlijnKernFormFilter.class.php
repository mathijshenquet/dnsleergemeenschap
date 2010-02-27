<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * leerlijnKern filter form base class.
 *
 * @package    filters
 * @subpackage leerlijnKern *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseleerlijnKernFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(),
      'summary'         => new sfWidgetFormFilterInput(),
      'description'     => new sfWidgetFormFilterInput(),
      'image'           => new sfWidgetFormFilterInput(),
      'leergebied_id'   => new sfWidgetFormDoctrineChoice(array('model' => 'leerlijnLeergebied', 'add_empty' => true)),
      'kernbegrip_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnKernbegrip')),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'summary'         => new sfValidatorPass(array('required' => false)),
      'description'     => new sfValidatorPass(array('required' => false)),
      'image'           => new sfValidatorPass(array('required' => false)),
      'leergebied_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'leerlijnLeergebied', 'column' => 'id')),
      'kernbegrip_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnKernbegrip', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_kern_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addKernbegripListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.leerlijnKernbegripKern leerlijnKernbegripKern')
          ->andWhereIn('leerlijnKernbegripKern.kernbegrip_id', $values);
  }

  public function getModelName()
  {
    return 'leerlijnKern';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'name'            => 'Text',
      'summary'         => 'Text',
      'description'     => 'Text',
      'image'           => 'Text',
      'leergebied_id'   => 'ForeignKey',
      'kernbegrip_list' => 'ManyKey',
    );
  }
}