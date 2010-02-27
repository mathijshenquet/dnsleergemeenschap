<?php

/**
 * links actions.
 *
 * @package    dns
 * @subpackage links
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class linksActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex()
  {
    $this->links = Doctrine::getTable('Links')
    	->createQuery('l')
    	->where('l.is_active = 1')
    	->execute();
  }
}
