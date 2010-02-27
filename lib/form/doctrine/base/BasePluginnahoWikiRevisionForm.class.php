<?php

/**
 * PluginnahoWikiRevision form base class.
 *
 * @package    form
 * @subpackage pluginnaho_wiki_revision
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasePluginnahoWikiRevisionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'page_id'    => new sfWidgetFormInputHidden(),
      'revision'   => new sfWidgetFormInputHidden(),
      'user_name'  => new sfWidgetFormInput(),
      'comment'    => new sfWidgetFormInput(),
      'content'    => new sfWidgetFormTextarea(),
      'archive'    => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'page_id'    => new sfValidatorDoctrineChoice(array('model' => 'PluginnahoWikiRevision', 'column' => 'page_id', 'required' => false)),
      'revision'   => new sfValidatorDoctrineChoice(array('model' => 'PluginnahoWikiRevision', 'column' => 'revision', 'required' => false)),
      'user_name'  => new sfValidatorString(array('max_length' => 255)),
      'comment'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'content'    => new sfValidatorString(),
      'archive'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pluginnaho_wiki_revision[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PluginnahoWikiRevision';
  }

}
