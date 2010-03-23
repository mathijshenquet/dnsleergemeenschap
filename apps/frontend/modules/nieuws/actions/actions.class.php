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
    $this->getResponse()->setSlot('copyright', '
	<a rel="license" href="http://creativecommons.org/licenses/by-nd/3.0/nl/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nd/3.0/nl/80x15.png" /></a><br />
	Op de <span xmlns:dc="http://purl.org/dc/elements/1.1/" href="http://purl.org/dc/dcmitype/Text" property="dc:title" rel="dc:type">nieuwsitems</span> is een <a rel="license" href="http://creativecommons.org/licenses/by-nd/3.0/nl/">Creative Commons Naamsvermelding-Geen Afgeleide werken 3.0 Nederland licentie</a> van toepassing.<br />
	De meningen in de nieuws items zijn van de schrijvers en van de schrijvers uitsluitend.<br />
    De DNS Leergemeenschap, De Nieuwste School, of een van haar werknemers is niet aansprakelijk voor de geuite meningen.
    ');
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
