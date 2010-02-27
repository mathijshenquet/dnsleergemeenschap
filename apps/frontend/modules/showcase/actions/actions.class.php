<?php

/**
 * showcase actions.
 *
 * @package    dns
 * @subpackage showcase
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class showcaseActions extends sfActions
{
  public function preExecute(){
  	$this->getResponse()->setSlot('logo', 'Wall of Fame');
  	$this->getResponse()->setSlot('copyright', 'Wall of Fame: Alle rechten voorbehouden aan rechtmatige eigenaars van werken.');
  	
  }
  function executeWall(){
    $this->items = Doctrine::getTable('showcase')
      ->createQuery('a')
      ->where('a.is_active = ?', '1')
      ->execute();
  }
  function executeItem(sfWebRequest $request){
  	$this->item = Doctrine::getTable('showcase')
      ->createQuery('a')
      ->where('a.is_active = ?', '1')
      ->andWhere('a.id = ?', $request->getParameter('id'))
      ->fetchOne();
  }
  
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new showcaseForm();
    unset($this->form['user_id'], $this->form['is_active']);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new showcaseForm();
    
    unset($this->form['user_id'], $this->form['is_active']);

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    
    if ($form->isValid())
    {
      $form->getObject()->User = $this->getUser()->getGuardUser();
      $form->save();
      
      $this->redirect('showcase/wall');
    }
  }
}
