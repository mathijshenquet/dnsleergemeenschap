<?php

/**
 * leerlijn actions.
 *
 * @package    dns
 * @subpackage leerlijn
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class leerlijnActions extends sfActions
{
  public function preExecute(){
    $this->getResponse()->setSlot('logo', 'Leerlijn');
    $this->getResponse()->setSlot('copyright', 'Leerlijn: Alle rechten voorbehouden <span class="gravity">&copy;</span> <a href="http://www.denieuwsteschool.nl/">De Nieuwste School</a>');
  }
  public function executeOverview()
  {
    $this->leergebieden = Doctrine::getTable('leerlijnLeergebied')
      ->createQuery('l')
      ->execute();

    $this->leerjaren = Doctrine::getTable('leerlijnLeerjaar')
      ->createQuery('l')
      ->execute();
  }
  public function executeLeerjaar(sfWebRequest $request){
  	$this->leerjaar = Doctrine::getTable('leerlijnLeerjaar')
  	  ->createQuery('q')
  	  ->where('q.id = ?', $request->getParameter('id'))
      ->fetchOne()
  	;
  }
  public function executeLeergebied(sfWebRequest $request)
  {
    $this->leergebied = Doctrine::getTable('leerlijnLeergebied')
      ->find($request->getParameter('id'));
  }
  public function executeEindterm(sfWebRequest $request){
  	$this->eindterm = Doctrine::getTable('leerlijnEindterm')
    	->createQuery('q')
    	->where('q.id = ?', $request->getParameter('id'))
    	->orderBy('q.name ASC')
    	->fetchOne()
    ;
  }
  public function executeVak(sfWebRequest $request)
  {
    $this->vak = Doctrine::getTable('leerlijnVak')
    	->createQuery('q')
    	->where('q.id = ?', $request->getParameter('id'))
    	->orderBy('q.name ASC')
    	->fetchOne();
  }
  public function executeKern(sfWebRequest $request){
  	$this->kern = Doctrine::getTable('leerlijnKern')
    	->createQuery('q')
    	->where('q.id = ?', $request->getParameter('id'))
    	->orderBy('q.Kernbegrip.name ASC')
    	->fetchOne()
    ;
  }
  public function executeThema(sfWebRequest $request){
  	$this->kern = Doctrine::getTable('leerlijnThema')
    	->createQuery('q')
    	->where('q.id = ?', $request->getParameter('id'))
    	->orderBy('q.Kernbegrip.name ASC')
    	->fetchOne()
    ;
  }
  public function executeKernbegrip(sfWebRequest $request){
  	$this->kernbegrip = Doctrine::getTable('leerlijnKernbegrip')
  		->createQuery('q')
    	->where('q.id = ?', $request->getParameter('id'))
    	->orderBy('q.Sleutelinzicht.Niveau.position ASC')
    	->fetchOne()
    ;
  }
  public function executeLeergebiedOverview(sfWebRequest $request){
  	$this->leergebied = Doctrine::getTable('leerlijnLeergebied')
      ->find($request->getParameter('id'));
  }
}
