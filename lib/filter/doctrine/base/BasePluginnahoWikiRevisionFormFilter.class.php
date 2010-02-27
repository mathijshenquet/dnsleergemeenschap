<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * PluginnahoWikiRevision filter form base class.
 *
 * @package    filters
 * @subpackage PluginnahoWikiRevision *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasePluginnahoWikiRevisionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_name'  => new sfWidgetFormFilterInput(),
      'comment'    => new sfWidgetFormFilterInput(),
      'content'    => new sfWidgetFormFilterInput(),
      'archive'    => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'user_name'  => new sfValidatorPass(array('required' => false)),
      'comment'    => new sfValidatorPass(array('required' => false)),
      'content'    => new sfValidatorPass(array('required' => false)),
      'archive'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('pluginnaho_wiki_revision_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PluginnahoWikiRevision';
  }

  public function getFields()
  {
    return array(
      'page_id'    => 'Number',
      'revision'   => 'Number',
      'user_name'  => 'Text',
      'comment'    => 'Text',
      'content'    => 'Text',
      'archive'    => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}