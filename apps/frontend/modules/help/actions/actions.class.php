<?php

/**
 * help actions.
 *
 * @package    leerling
 * @subpackage help
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class helpActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->articles = Doctrine::getTable('helpArticle')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request){
  	$this->article = Doctrine::getTable('helpArticle')
  	  ->createQuery('a')
  	  ->where('a.id = ?', $request->getParameter('id'))
  	  ->fetchOne()
  	;
  }
  
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new helpArticleForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new helpArticleForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($help_article = Doctrine::getTable('helpArticle')->find(array($request->getParameter('id'))), sprintf('Object help_article does not exist (%s).', $request->getParameter('id')));
    $this->form = new helpArticleForm($help_article);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($help_article = Doctrine::getTable('helpArticle')->find(array($request->getParameter('id'))), sprintf('Object help_article does not exist (%s).', $request->getParameter('id')));
    $this->form = new helpArticleForm($help_article);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($help_article = Doctrine::getTable('helpArticle')->find(array($request->getParameter('id'))), sprintf('Object help_article does not exist (%s).', $request->getParameter('id')));
    $help_article->delete();

    $this->redirect('help/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $help_article = $form->save();

      $this->redirect('help/edit?id='.$help_article->getId());
    }
  }
}
