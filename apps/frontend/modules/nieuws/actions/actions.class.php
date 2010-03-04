<?php

/**
 * blog actions.
 *
 * @package    dns
 * @subpackage blog
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class nieuwsActions extends sfActions
{
  public function preExecute(){
    $this->getResponse()->setSlot('current_page', $this->getPartial('currentPage'));
    $this->getResponse()->setSlot('logo', 'Nieuws');
  }
  public function executeShow(sfWebRequest $request)
  {
    $this->post = Doctrine::getTable('BlogPosts')->find($request->getParameter('id'));
    $this->forward404Unless($this->post);
  }

  public function executeApiList(sfWebRequest $request)
  {
  	$this->posts = Doctrine::getTable('BlogPosts')
  	  ->createQuery()
  	  ->limit($request->getParameter('amount'))
  	  ->orderBy('n.created_at DESC')
  	  ->execute();
  }
  public function executePage(sfWebRequest $request)
  {
  	$posts = Doctrine::getTable('BlogPosts')
  	  ->createQuery('n')
  	  ->offset(sfConfig::get('app_posts_op_nieuwspagina') * ($request->getParameter('page')-1))
  	  ->limit(sfConfig::get('app_posts_op_nieuwspagina'))
  	  ->orderBy('n.created_at DESC');
  	  
  	if(!$this->getUser()->isAuthenticated()){
  		$posts->where('n.private = ?', false);
  	}
  	
  	$this->posts = $posts->execute();
  	$this->page = $request->getParameter('page');
  	$this->more_items = sfConfig::get('app_posts_op_nieuwspagina') == $this->posts->count();
  	  
  	if($this->getRequest()->isXmlHttpRequest()){
  		return 'AjaxSuccess';
  	}
  }
  public function executeInTheNews(sfWebRequest $request){
  }
}
