<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * helpArticle filter form base class.
 *
 * @package    filters
 * @subpackage helpArticle *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasehelpArticleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title' => new sfWidgetFormFilterInput(),
      'body'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title' => new sfValidatorPass(array('required' => false)),
      'body'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('help_article_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'helpArticle';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'title' => 'Text',
      'body'  => 'Text',
    );
  }
}