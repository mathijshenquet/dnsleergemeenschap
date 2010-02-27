<?php

/**
 * easteregg actions.
 *
 * @package    dns
 * @subpackage easteregg
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class extrasActions extends sfActions
{
	function executeChicken(){
		$this->forward404Unless($this->getUser()->isAuthenticated());
		$this->forward404Unless($this->getRequest()->isXmlHttpRequest());
		
		$this->chicken = Doctrine::getTable('chicken')->createQuery('a')->execute();
	}
}
