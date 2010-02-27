<?php

/**
 * helpArticle form base class.
 *
 * @package    form
 * @subpackage help_article
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasehelpArticleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'title' => new sfWidgetFormInput(),
      'body'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorDoctrineChoice(array('model' => 'helpArticle', 'column' => 'id', 'required' => false)),
      'title' => new sfValidatorString(array('max_length' => 255)),
      'body'  => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('help_article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'helpArticle';
  }

}
