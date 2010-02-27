<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * PluginnahoWikiContent filter form base class.
 *
 * @package    filters
 * @subpackage PluginnahoWikiContent *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasePluginnahoWikiContentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'content'    => new sfWidgetFormFilterInput(),
      'gz_content' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'content'    => new sfValidatorPass(array('required' => false)),
      'gz_content' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pluginnaho_wiki_content_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PluginnahoWikiContent';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'content'    => 'Text',
      'gz_content' => 'Text',
    );
  }
}