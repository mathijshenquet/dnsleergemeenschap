<?php

/**
 * ideabox actions.
 *
 * @package    leerling
 * @subpackage ideabox
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class ideaboxActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->idea_item_list = Doctrine::getTable('ideaItem')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ideaItemForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new ideaItemForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($idea_item = Doctrine::getTable('ideaItem')->find(array($request->getParameter('id'))), sprintf('Object idea_item does not exist (%s).', $request->getParameter('id')));
    $this->form = new ideaItemForm($idea_item);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($idea_item = Doctrine::getTable('ideaItem')->find(array($request->getParameter('id'))), sprintf('Object idea_item does not exist (%s).', $request->getParameter('id')));
    $this->form = new ideaItemForm($idea_item);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($idea_item = Doctrine::getTable('ideaItem')->find(array($request->getParameter('id'))), sprintf('Object idea_item does not exist (%s).', $request->getParameter('id')));
    $idea_item->delete();

    $this->redirect('ideabox/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $idea_item = $form->save();

      $this->redirect('ideabox/edit?id='.$idea_item->getId());
    }
  }
}
