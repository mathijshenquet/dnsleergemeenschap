<?php

/**
 * leerlijn_api actions.
 *
 * @package    leerling
 * @subpackage leerlijn_api
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class leerlijn_apiActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeOverview(sfWebRequest $request)
  {
    $this->sleutelinzichten = Doctrine::getTable('leerlijnSleutelinzicht')->getGlobalProgress();
    $this->setTemplate('progress');
  }
}
