<?php

/**
 * expert form base class.
 *
 * @method expert getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseexpertForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInputText(),
      'type'            => new sfWidgetFormChoice(array('choices' => array('leerling' => 'leerling', 'ouder' => 'ouder', 'leraar' => 'leraar', 'anders' => 'anders'))),
      'profession'      => new sfWidgetFormInputText(),
      'description'     => new sfWidgetFormTextarea(),
      'email'           => new sfWidgetFormInputText(),
      'active'          => new sfWidgetFormInputCheckbox(),
      'kernbegrip_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnKernbegrip')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 255)),
      'type'            => new sfValidatorChoice(array('choices' => array(0 => 'leerling', 1 => 'ouder', 2 => 'leraar', 3 => 'anders'), 'required' => false)),
      'profession'      => new sfValidatorString(array('max_length' => 255)),
      'description'     => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'email'           => new sfValidatorString(array('max_length' => 255)),
      'active'          => new sfValidatorBoolean(array('required' => false)),
      'kernbegrip_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnKernbegrip', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('expert[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

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
    $this->saveKernbegripList($con);

    parent::doSave($con);
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

    if (null === $con)
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
