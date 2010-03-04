<?php

/**
 * leerlijnEindterm filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnEindtermFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'summary'         => new sfWidgetFormFilterInput(),
      'description'     => new sfWidgetFormFilterInput(),
      'image'           => new sfWidgetFormFilterInput(),
      'domein_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Domein'), 'add_empty' => true)),
      'kernbegrip_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnKernbegrip')),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'summary'         => new sfValidatorPass(array('required' => false)),
      'description'     => new sfValidatorPass(array('required' => false)),
      'image'           => new sfValidatorPass(array('required' => false)),
      'domein_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Domein'), 'column' => 'id')),
      'kernbegrip_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnKernbegrip', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_eindterm_filters[%s]');

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

    $query->leftJoin('r.leerlijnKernbegripEindterm leerlijnKernbegripEindterm')
          ->andWhereIn('leerlijnKernbegripEindterm.kernbegrip_id', $values);
  }

  public function getModelName()
  {
    return 'leerlijnEindterm';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'name'            => 'Text',
      'summary'         => 'Text',
      'description'     => 'Text',
      'image'           => 'Text',
      'domein_id'       => 'ForeignKey',
      'kernbegrip_list' => 'ManyKey',
    );
  }
}
