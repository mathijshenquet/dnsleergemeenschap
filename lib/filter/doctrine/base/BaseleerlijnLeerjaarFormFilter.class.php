<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * leerlijnLeerjaar filter form base class.
 *
 * @package    filters
 * @subpackage leerlijnLeerjaar *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseleerlijnLeerjaarFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'image'      => new sfWidgetFormFilterInput(),
      'name'       => new sfWidgetFormFilterInput(),
      'thema_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnThema')),
    ));

    $this->setValidators(array(
      'image'      => new sfValidatorPass(array('required' => false)),
      'name'       => new sfValidatorPass(array('required' => false)),
      'thema_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnThema', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_leerjaar_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addThemaListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.leerlijnLeerjaarThema leerlijnLeerjaarThema')
          ->andWhereIn('leerlijnLeerjaarThema.thema_id', $values);
  }

  public function getModelName()
  {
    return 'leerlijnLeerjaar';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'image'      => 'Text',
      'name'       => 'Text',
      'thema_list' => 'ManyKey',
    );
  }
}