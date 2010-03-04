<?php

/**
 * leerlijnLeerjaar filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnLeerjaarFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'image'      => new sfWidgetFormFilterInput(),
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'thema_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnThema')),
    ));

    $this->setValidators(array(
      'image'      => new sfValidatorPass(array('required' => false)),
      'name'       => new sfValidatorPass(array('required' => false)),
      'thema_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnThema', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_leerjaar_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

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
