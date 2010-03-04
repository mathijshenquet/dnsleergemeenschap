<?php

/**
 * expert filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseexpertFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'            => new sfWidgetFormChoice(array('choices' => array('' => '', 'leerling' => 'leerling', 'ouder' => 'ouder', 'leraar' => 'leraar', 'anders' => 'anders'))),
      'profession'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'     => new sfWidgetFormFilterInput(),
      'email'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'active'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'kernbegrip_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnKernbegrip')),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'type'            => new sfValidatorChoice(array('required' => false, 'choices' => array('leerling' => 'leerling', 'ouder' => 'ouder', 'leraar' => 'leraar', 'anders' => 'anders'))),
      'profession'      => new sfValidatorPass(array('required' => false)),
      'description'     => new sfValidatorPass(array('required' => false)),
      'email'           => new sfValidatorPass(array('required' => false)),
      'active'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'kernbegrip_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnKernbegrip', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('expert_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

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
