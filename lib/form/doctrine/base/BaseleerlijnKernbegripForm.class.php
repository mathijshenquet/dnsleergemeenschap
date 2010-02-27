<?php

/**
 * leerlijnKernbegrip form base class.
 *
 * @package    form
 * @subpackage leerlijn_kernbegrip
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseleerlijnKernbegripForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInput(),
      'summary'       => new sfWidgetFormInput(),
      'description'   => new sfWidgetFormTextarea(),
      'image'         => new sfWidgetFormInput(),
      'thema_id'      => new sfWidgetFormInput(),
      'kern_list'     => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnKern')),
      'eindterm_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnEindterm')),
      'thema_list'    => new sfWidgetFormDoctrineChoiceMany(array('model' => 'leerlijnThema')),
      'expert_list'   => new sfWidgetFormDoctrineChoiceMany(array('model' => 'expert')),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => 'leerlijnKernbegrip', 'column' => 'id', 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 255)),
      'summary'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'image'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'thema_id'      => new sfValidatorInteger(array('required' => false)),
      'kern_list'     => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnKern', 'required' => false)),
      'eindterm_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnEindterm', 'required' => false)),
      'thema_list'    => new sfValidatorDoctrineChoiceMany(array('model' => 'leerlijnThema', 'required' => false)),
      'expert_list'   => new sfValidatorDoctrineChoiceMany(array('model' => 'expert', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('leerlijn_kernbegrip[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'leerlijnKernbegrip';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['kern_list']))
    {
      $this->setDefault('kern_list', $this->object->Kern->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['eindterm_list']))
    {
      $this->setDefault('eindterm_list', $this->object->Eindterm->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['thema_list']))
    {
      $this->setDefault('thema_list', $this->object->Thema->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['expert_list']))
    {
      $this->setDefault('expert_list', $this->object->Expert->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveKernList($con);
    $this->saveEindtermList($con);
    $this->saveThemaList($con);
    $this->saveExpertList($con);
  }

  public function saveKernList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['kern_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Kern->getPrimaryKeys();
    $values = $this->getValue('kern_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Kern', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Kern', array_values($link));
    }
  }

  public function saveEindtermList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['eindterm_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Eindterm->getPrimaryKeys();
    $values = $this->getValue('eindterm_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Eindterm', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Eindterm', array_values($link));
    }
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

  public function saveExpertList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['expert_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Expert->getPrimaryKeys();
    $values = $this->getValue('expert_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Expert', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Expert', array_values($link));
    }
  }

}
