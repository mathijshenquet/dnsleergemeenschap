<?php

/**
 * leerlijnKern form base class.
 *
 * @package    form
 * @subpackage leerlijn_kern
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnKernForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInput(),
      'summary'         => new sfWidgetFormInput(),
      'description'     => new sfWidgetFormTextarea(),
      'image'           => new sfWidgetFormInput(),
      'leergebied_id'   => new sfWidgetFormDoctrineChoice(array('model' => 'leerlijnLeergebied', 'add_empty' => false)),
      'kernbegrip_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnKernbegrip')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorDoctrineChoice(array('model' => 'leerlijnKern', 'column' => 'id', 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 255)),
      'summary'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'     => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'image'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'leergebied_id'   => new sfValidatorDoctrineChoice(array('model' => 'leerlijnLeergebied')),
      'kernbegrip_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnKernbegrip', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_kern[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnKern';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['kernbegrip_list']))
    {
      $this->setDefault('kernbegrip_list', $this->object->Kernbegrip->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveKernbegripList($con);
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
