<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * leerlijnEindterm filter form base class.
 *
 * @package    filters
 * @subpackage leerlijnEindterm *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseleerlijnEindtermFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(),
      'summary'         => new sfWidgetFormFilterInput(),
      'description'     => new sfWidgetFormFilterInput(),
      'image'           => new sfWidgetFormFilterInput(),
      'domein_id'       => new sfWidgetFormDoctrineChoice(array('model' => 'leerlijnDomein', 'add_empty' => true)),
      'kernbegrip_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnKernbegrip')),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'summary'         => new sfValidatorPass(array('required' => false)),
      'description'     => new sfValidatorPass(array('required' => false)),
      'image'           => new sfValidatorPass(array('required' => false)),
      'domein_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'leerlijnDomein', 'column' => 'id')),
      'kernbegrip_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnKernbegrip', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_eindterm_filters[%s]');

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