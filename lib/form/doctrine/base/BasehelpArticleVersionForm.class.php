<?php

/**
 * helpArticleVersion form base class.
 *
 * @package    form
 * @subpackage help_article_version
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasehelpArticleVersionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'title'   => new sfWidgetFormInputText(),
      'body'    => new sfWidgetFormTextarea(),
      'version' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorDoctrineChoice(array('model' => 'helpArticleVersion', 'column' => 'id', 'required' => false)),
      'title'   => new sfValidatorString(array('max_length' => 255)),
      'body'    => new sfValidatorString(),
      'version' => new sfValidatorDoctrineChoice(array('model' => 'helpArticleVersion', 'column' => 'version', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('help_article_version[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'helpArticleVersion';
  }

}
