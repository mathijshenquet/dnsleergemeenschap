<?php

/**
 * expertbank actions.
 *
 * @package    leerling
 * @subpackage expertbank
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class expertbankActions extends sfActions
{
  public function preExecute(){
  	$this->getResponse()->setSlot('logo', 'Expertisebank');
  	$this->getResponse()->setSlot('copyright', 'Expertisebank: Alle rechten voorbehouden <span class="gravity">&copy;</span> <a href="http://www.denieuwsteschool.nl/">De Nieuwste School</a>');
  	
  }
  public function executeIndex(sfWebRequest $request)
  {
    $this->expert_list = Doctrine::getTable('expert')
      ->createQuery('a')
      ->where('a.active=?', true)
      ->orderBy('a.profession')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new expertForm(NULL, array('url'=>$this->getController()->genUrl('expertbank/tags')));
    
  	$tags_raw = Doctrine::getTable('Tag')
  		->createQuery('a')
  		->execute()
  	;

    $this->tags = array();
    
    foreach($tags_raw as $tag_raw){
    	$this->tags[] = $tag_raw->getName();
    }
    
    if($request->isXmlHttpRequest()){
    	return 'AjaxSuccess';
    }
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    
    $this->form = new expertForm();
    
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      if($this->getUser()->hasCredential('expertbank_admin')){
        $form->getObject()->active = true;
      }
      $form->save();
      
      $this->redirect('expertbank', 'index');
    }
  }
  
  public function executeSend(sfWebRequest $request){  	
  	$this->forward404Unless($request->getParameter('email'));
  	
  	$expert = Doctrine::getTable('expert')->find($request->getParameter('id'));
  	
  	$data = $request->getParameter('email');
  	
  	if($this->getUser()->isAuthenticated()){
	  	$data['name'] = $this->getUser()->getProfile()->getFullName();
	  	$data['email'] = $this->getUser()->getEmail();
  	}
  	
	$mailer = new Swift($this->getGmailConnection('dnsexpertbank@gmail.com', 'swordfish'));
	
	$this->sendInvitationEmail(
		$data['subject'], 
		$data['name'], 
		$data['email'], 
		$data['message'], 
		$expert, 
		$mailer
	);
	
  	$this->getUser()->setFlash('notice', 'Je bericht is verstuurd!');
  	$this->forward('expertbank', 'index');
  }
  
  public function executeContact(sfWebRequest $request){
  	$this->expert = Doctrine::getTable('expert')->find($request->getParameter('id'));
  	
  	if($this->getUser()->isAuthenticated()){
  		return 'Logedin';
  	}else{
  		return 'Logedout';
  	}
  }
  
  private function getGmailConnection($username, $password){
  	$connection = new Swift_Connection_SMTP("smtp.gmail.com", Swift_Connection_SMTP::PORT_SECURE, Swift_Connection_SMTP::ENC_TLS);
	$connection->setUsername($username);
	$connection->setPassword($password);
	
	return $connection;
  }
  
  private function sendInvitationEmail($subject, $name, $email, $body, $expert, $mailer){
  	$message = new Swift_Message();
	$message->setFrom('Expert bank');
	$message->setSubject($subject);
	$message->setBody(
"U hebt via de expertbank een bericht ontvangen van $name ($email):

$body"
	);
	
	$mailer->send($message, $expert->getEmail(), $email);
  }
  
  public function executeTags(sfWebRequest $request){
  	$this->forward404();
  	
  	$tags_raw = Doctrine::getTable('Tag')
  		->createQuery('a')
  		->where('name LIKE ?', 'i')
  		->limit($request->getParameter('limit'))
  		->execute()
  	;

    $this->tags = array();
    
    foreach($tags_raw as $tag_raw){
    	$this->tags[] = $tag_raw;
    }
  }
}
