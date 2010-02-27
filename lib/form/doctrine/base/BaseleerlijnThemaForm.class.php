<?php

/**
 * leerlijnThema form base class.
 *
 * @package    form
 * @subpackage leerlijn_thema
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnThemaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'name'                    => new sfWidgetFormInput(),
      'description_humanics'    => new sfWidgetFormTextarea(),
      'description_arts'        => new sfWidgetFormTextarea(),
      'description_science'     => new sfWidgetFormTextarea(),
      'description_linguistics' => new sfWidgetFormTextarea(),
      'image'                   => new sfWidgetFormInput(),
      'leerjaar_list'           => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnLeerjaar')),
      'kernbegrip_list'         => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnKernbegrip')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorDoctrineChoice(array('model' => 'leerlijnThema', 'column' => 'id', 'required' => false)),
      'name'                    => new sfValidatorString(array('max_length' => 255)),
      'description_humanics'    => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'description_arts'        => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'description_science'     => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'description_linguistics' => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'image'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'leerjaar_list'           => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnLeerjaar', 'required' => false)),
      'kernbegrip_list'         => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnKernbegrip', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_thema[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnThema';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['leerjaar_list']))
    {
      $this->setDefault('leerjaar_list', $this->object->Leerjaar->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['kernbegrip_list']))
    {
      $this->setDefault('kernbegrip_list', $this->object->Kernbegrip->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveLeerjaarList($con);
    $this->saveKernbegripList($con);
  }

  public function saveLeerjaarList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['leerjaar_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Leerjaar->getPrimaryKeys();
    $values = $this->getValue('leerjaar_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Leerjaar', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Leerjaar', array_values($link));
    }
  }

  public function saveKernbegripList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['kernbegrip_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Kernbegrip->getPrimaryKeys();
    $values = $this->getValue('kernbegrip_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Kernbegrip', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Kernbegrip', array_values($link));
    }
  }

}
