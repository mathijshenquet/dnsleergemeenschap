<?php

/**
 * sfCombine filter form base class.
 *
 * @package    leerling
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BasesfCombineFormFilter extends PluginsfCombineFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('sf_combine_filters[%s]');
  }

  public function getModelName()
  {
    return 'sfCombine';
  }
}
