<?php

/**
 * leerlijnThema filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnThemaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description_humanics'    => new sfWidgetFormFilterInput(),
      'description_arts'        => new sfWidgetFormFilterInput(),
      'description_science'     => new sfWidgetFormFilterInput(),
      'description_linguistics' => new sfWidgetFormFilterInput(),
      'image'                   => new sfWidgetFormFilterInput(),
      'leerjaar_list'           => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnLeerjaar')),
      'kernbegrip_list'         => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnKernbegrip')),
    ));

    $this->setValidators(array(
      'name'                    => new sfValidatorPass(array('required' => false)),
      'description_humanics'    => new sfValidatorPass(array('required' => false)),
      'description_arts'        => new sfValidatorPass(array('required' => false)),
      'description_science'     => new sfValidatorPass(array('required' => false)),
      'description_linguistics' => new sfValidatorPass(array('required' => false)),
      'image'                   => new sfValidatorPass(array('required' => false)),
      'leerjaar_list'           => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnLeerjaar', 'required' => false)),
      'kernbegrip_list'         => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnKernbegrip', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_thema_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addLeerjaarListColumnQuery(Doctrine_Query $query, $field, $values)
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
          ->andWhereIn('leerlijnLeerjaarThema.leerjaar_id', $values);
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

    $query->leftJoin('r.leerlijnKernbegripThema leerlijnKernbegripThema')
          ->andWhereIn('leerlijnKernbegripThema.kernbegrip_id', $values);
  }

  public function getModelName()
  {
    return 'leerlijnThema';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'name'                    => 'Text',
      'description_humanics'    => 'Text',
      'description_arts'        => 'Text',
      'description_science'     => 'Text',
      'description_linguistics' => 'Text',
      'image'                   => 'Text',
      'leerjaar_list'           => 'ManyKey',
      'kernbegrip_list'         => 'ManyKey',
    );
  }
}
