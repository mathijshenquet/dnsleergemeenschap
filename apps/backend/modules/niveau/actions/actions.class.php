<?php

require_once dirname(__FILE__).'/../lib/niveauGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/niveauGeneratorHelper.class.php';

/**
 * niveau actions.
 *
 * @package    leerling
 * @subpackage niveau
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class niveauActions extends autoNiveauActions
{
public function executePromote()
	{
	  $object=Doctrine::getTable('leerlijnNiveau')->findOneById($this->getRequestParameter('id'));
	 
	 
	  $object->promote();
	  $this->redirect("@leerlijn_niveau_niveau");
	}
	 
	public function executeDemote()
	{
	  $object=Doctrine::getTable('leerlijnNiveau')->findOneById($this->getRequestParameter('id'));
	 
	  $object->demote();
	  $this->redirect("@leerlijn_niveau_niveau");
	}
}
