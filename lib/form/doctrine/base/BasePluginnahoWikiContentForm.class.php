<?php

/**
 * PluginnahoWikiContent form base class.
 *
 * @package    form
 * @subpackage pluginnaho_wiki_content
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasePluginnahoWikiContentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'content'    => new sfWidgetFormTextarea(),
      'gz_content' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => 'PluginnahoWikiContent', 'column' => 'id', 'required' => false)),
      'content'    => new sfValidatorString(array('required' => false)),
      'gz_content' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pluginnaho_wiki_content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PluginnahoWikiContent';
  }

}
