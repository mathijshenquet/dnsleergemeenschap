<?php

/**
 * sfCombine form base class.
 *
 * @method sfCombine getObject() Returns the current form's model object
 *
 * @package    leerling
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BasesfCombineForm extends PluginsfCombineForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('sf_combine[%s]');
  }

  public function getModelName()
  {
    return 'sfCombine';
  }

}
