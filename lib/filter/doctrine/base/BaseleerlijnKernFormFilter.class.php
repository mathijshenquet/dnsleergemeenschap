<?php

/**
 * leerlijnKern filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnKernFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'summary'         => new sfWidgetFormFilterInput(),
      'description'     => new sfWidgetFormFilterInput(),
      'image'           => new sfWidgetFormFilterInput(),
      'leergebied_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Leergebied'), 'add_empty' => true)),
      'kernbegrip_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnKernbegrip')),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'summary'         => new sfValidatorPass(array('required' => false)),
      'description'     => new sfValidatorPass(array('required' => false)),
      'image'           => new sfValidatorPass(array('required' => false)),
      'leergebied_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Leergebied'), 'column' => 'id')),
      'kernbegrip_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnKernbegrip', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_kern_filters[%s]');

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
