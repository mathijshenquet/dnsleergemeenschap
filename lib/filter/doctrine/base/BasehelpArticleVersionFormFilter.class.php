<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * helpArticleVersion filter form base class.
 *
 * @package    filters
 * @subpackage helpArticleVersion *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasehelpArticleVersionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'   => new sfWidgetFormFilterInput(),
      'body'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'   => new sfValidatorPass(array('required' => false)),
      'body'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('help_article_version_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'helpArticleVersion';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'title'   => 'Text',
      'body'    => 'Text',
      'version' => 'Number',
    );
  }
}