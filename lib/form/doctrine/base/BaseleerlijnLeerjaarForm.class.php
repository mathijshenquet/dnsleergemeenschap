<?php

/**
 * leerlijnLeerjaar form base class.
 *
 * @method leerlijnLeerjaar getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseleerlijnLeerjaarForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'image'      => new sfWidgetFormInputText(),
      'name'       => new sfWidgetFormInputText(),
      'thema_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnThema')),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'image'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'thema_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'leerlijnThema', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_leerjaar[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

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
    $this->saveThemaList($con);

    parent::doSave($con);
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

    if (null === $con)
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
