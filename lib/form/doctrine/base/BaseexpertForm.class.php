<?php

/**
 * expert form base class.
 *
 * @package    form
 * @subpackage expert
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseexpertForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInput(),
      'type'            => new sfWidgetFormChoice(array('choices' => array('leerling' => 'leerling', 'ouder' => 'ouder', 'leraar' => 'leraar', 'anders' => 'anders'))),
      'profession'      => new sfWidgetFormInput(),
      'description'     => new sfWidgetFormTextarea(),
      'email'           => new sfWidgetFormInput(),
      'active'          => new sfWidgetFormInputCheckbox(),
      'kernbegrip_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnKernbegrip')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorDoctrineChoice(array('model' => 'expert', 'column' => 'id', 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 255)),
      'type'            => new sfValidatorChoice(array('choices' => array('leerling' => 'leerling', 'ouder' => 'ouder', 'leraar' => 'leraar', 'anders' => 'anders'), 'required' => false)),
      'profession'      => new sfValidatorString(array('max_length' => 255)),
      'description'     => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'email'           => new sfValidatorString(array('max_length' => 255)),
      'active'          => new sfValidatorBoolean(array('required' => false)),
      'kernbegrip_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnKernbegrip', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('expert[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'expert';
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
