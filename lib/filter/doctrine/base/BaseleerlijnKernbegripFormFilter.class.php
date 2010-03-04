<?php

/**
 * leerlijnKernbegrip filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnKernbegripFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'summary'       => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(),
      'image'         => new sfWidgetFormFilterInput(),
      'thema_id'      => new sfWidgetFormFilterInput(),
      'kern_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnKern')),
      'eindterm_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnEindterm')),
      'thema_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnThema')),
      'expert_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'expert')),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'summary'       => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
      'image'         => new sfValidatorPass(array('required' => false)),
      'thema_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'kern_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnKern', 'required' => false)),
      'eindterm_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnEindterm', 'required' => false)),
      'thema_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnThema', 'required' => false)),
      'expert_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'expert', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_kernbegrip_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addKernListColumnQuery(Doctrine_Query $query, $field, $values)
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
          ->andWhereIn('leerlijnKernbegripKern.kern_id', $values);
  }

  public function addEindtermListColumnQuery(Doctrine_Query $query, $field, $values)
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
          ->andWhereIn('leerlijnKernbegripEindterm.eindterm_id', $values);
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

    $query->leftJoin('r.leerlijnKernbegripThema leerlijnKernbegripThema')
          ->andWhereIn('leerlijnKernbegripThema.thema_id', $values);
  }

  public function addExpertListColumnQuery(Doctrine_Query $query, $field, $values)
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
          ->andWhereIn('expertKernbegrip.expert_id', $values);
  }

  public function getModelName()
  {
    return 'leerlijnKernbegrip';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'name'          => 'Text',
      'summary'       => 'Text',
      'description'   => 'Text',
      'image'         => 'Text',
      'thema_id'      => 'Number',
      'kern_list'     => 'ManyKey',
      'eindterm_list' => 'ManyKey',
      'thema_list'    => 'ManyKey',
      'expert_list'   => 'ManyKey',
    );
  }
}
