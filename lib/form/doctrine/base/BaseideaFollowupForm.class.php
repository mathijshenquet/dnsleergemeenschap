<?php

/**
 * ideaFollowup form base class.
 *
 * @package    form
 * @subpackage idea_followup
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseideaFollowupForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'parent_id' => new sfWidgetFormInputHidden(),
      'child_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'parent_id' => new sfValidatorDoctrineChoice(array('model' => 'ideaFollowup', 'column' => 'parent_id', 'required' => false)),
      'child_id'  => new sfValidatorDoctrineChoice(array('model' => 'ideaFollowup', 'column' => 'child_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('idea_followup[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ideaFollowup';
  }

}
