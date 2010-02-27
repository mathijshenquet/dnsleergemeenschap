<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * expert filter form base class.
 *
 * @package    filters
 * @subpackage expert *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseexpertFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(),
      'type'            => new sfWidgetFormChoice(array('choices' => array('' => '', 'leerling' => 'leerling', 'ouder' => 'ouder', 'leraar' => 'leraar', 'anders' => 'anders'))),
      'profession'      => new sfWidgetFormFilterInput(),
      'description'     => new sfWidgetFormFilterInput(),
      'email'           => new sfWidgetFormFilterInput(),
      'active'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'kernbegrip_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnKernbegrip')),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'type'            => new sfValidatorChoice(array('required' => false, 'choices' => array('leerling' => 'leerling', 'ouder' => 'ouder', 'leraar' => 'leraar', 'anders' => 'anders'))),
      'profession'      => new sfValidatorPass(array('required' => false)),
      'description'     => new sfValidatorPass(array('required' => false)),
      'email'           => new sfValidatorPass(array('required' => false)),
      'active'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'kernbegrip_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnKernbegrip', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('expert_filters[%s]');

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

    $query->leftJoin('r.expertKernbegrip expertKernbegrip')
          ->andWhereIn('expertKernbegrip.kernbegrip_id', $values);
  }

  public function getModelName()
  {
    return 'expert';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'name'            => 'Text',
      'type'            => 'Enum',
      'profession'      => 'Text',
      'description'     => 'Text',
      'email'           => 'Text',
      'active'          => 'Boolean',
      'kernbegrip_list' => 'ManyKey',
    );
  }
}