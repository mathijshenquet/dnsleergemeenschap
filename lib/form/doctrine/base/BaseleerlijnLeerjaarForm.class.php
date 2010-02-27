<?php

/**
 * leerlijnLeerjaar form base class.
 *
 * @package    form
 * @subpackage leerlijn_leerjaar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnLeerjaarForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'image'      => new sfWidgetFormInput(),
      'name'       => new sfWidgetFormInput(),
      'thema_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnThema')),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => 'leerlijnLeerjaar', 'column' => 'id', 'required' => false)),
      'image'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'thema_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnThema', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_leerjaar[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnLeerjaar';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['thema_list']))
    {
      $this->setDefault('thema_list', $this->object->Thema->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveThemaList($con);
  }

  public function saveThemaList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['thema_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Thema->getPrimaryKeys();
    $values = $this->getValue('thema_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Thema', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Thema', array_values($link));
    }
  }

}
