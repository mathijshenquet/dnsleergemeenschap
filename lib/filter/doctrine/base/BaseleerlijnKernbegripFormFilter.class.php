<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * leerlijnKernbegrip filter form base class.
 *
 * @package    filters
 * @subpackage leerlijnKernbegrip *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseleerlijnKernbegripFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(),
      'summary'       => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(),
      'image'         => new sfWidgetFormFilterInput(),
      'thema_id'      => new sfWidgetFormFilterInput(),
      'kern_list'     => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnKern')),
      'eindterm_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnEindterm')),
      'thema_list'    => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnThema')),
      'expert_list'   => new sfWidgetFormDoctrineChoiceMany(array('model' => 'expert')),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'summary'       => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
      'image'         => new sfValidatorPass(array('required' => false)),
      'thema_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'kern_list'     => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnKern', 'required' => false)),
      'eindterm_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnEindterm', 'required' => false)),
      'thema_list'    => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnThema', 'required' => false)),
      'expert_list'   => new sfValidatorDoctrineChoiceMany(array('model' => 'expert', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_kernbegrip_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

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