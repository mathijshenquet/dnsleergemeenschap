<?php
//require_once(sfConfig::get('sf_plugins_dir').'/sfDoctrineGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');

class userActions extends sfActions
{
  public function executePassword(){
  	$this->form = new lostPasswordForm();
  }
  public function executeMy(){
  	$this->user = $this->getUser()->getGuardUser();
  	$this->profile = $this->getUser()->getGuardUser()->getProfile();
  	
  	$this->form = new sfGuardUserForm($this->user);
  }
  public function executeView(sfWebRequest $request){
    $this->forward404Unless($this->user = Doctrine::getTable('sfGuardUser')->createQuery('u')
      ->where('u.username = ?', $request->getParameter('username'))
  	  ->limit(1)
  	  ->fetchOne(), 'De gebruiker is niet gevonden!');
  }
  public function executeSignin(sfWebRequest $request){
  $user = $this->getUser();
    if ($user->isAuthenticated())
    {
      return $this->redirect('@homepage');
    }

    $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin');
    $this->form = new $class();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('signin'));
      if ($this->form->isValid())
      {
        $values   = $this->form->getValues();
       	$remember = isset($values['remember']) ? $values['remember'] : false;

       	$this->getUser()->signin($values['user'], $remember);

        $signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer($request->getReferer()));

        return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
      }
    }
    else
    {
      if ($request->isXmlHttpRequest())
      {
        $this->getResponse()->setHeaderOnly(true);
        $this->getResponse()->setStatusCode(401);

        return sfView::NONE;
      }

      $user->setReferer($request->getReferer());

      $module = sfConfig::get('sf_login_module');
      if ($this->getModuleName() != $module)
      {
        return $this->redirect($module.'/'.sfConfig::get('sf_login_action'));
      }

      $this->getResponse()->setStatusCode(401);
    }
  }

  public function executeSecure(){
  	$this->getResponse()->setStatusCode(403);
  }
  
  public function executeSignout(sfWebResponse $request)
  {
    $this->getUser()->signOut();

    $signout_url = sfConfig::get('app_sf_guard_plugin_success_signout_url', $request->getReferer());

    $this->getUser()->setFlash('notice', 'U bent uitgelogd');

    $this->redirect('' != $signout_url ? $signout_url : '@homepage');
  }
  
  public function executeFeedback(sfWebRequest $request){
  	$this->forward404();
  	$this->forward404Unless($this->getUser()->isAuthenticated());
  	$this->forward404Unless(sfConfig::get('app_feedback_active', false));
  	
  	if($request->isMethod('post')){
		$mailer = new Swift($this->getGmailConnection(sfConfig::get('app_feedback_sender_email', 'dnsleergemeenschap@gmail.com'), sfConfig::get('app_feedback_sender_password', 'swordfish')));
		
		$name = sprintf('%s (%s)', $this->getUser()->getGuardUser()->getFullname(), $this->getUser()->getUsername());
		
		$message = new Swift_Message();
		$message->setFrom($name);
		$message->setSubject('Feedback leergemeenschap '.$name);
		$message->setBody("Feedback van $name met als email {$this->getUser()->getEmail()}:

{$request->getParameter('body')}");
		
		$recipients = new Swift_RecipientList();
		
		foreach(sfConfig::get('app_feedback_feedback_email', array('dnsleergemeenschap@gmail.com')) as $recipient){
			$recipients->addTo($recipient);
		}

		$mailer->send($message, $recipients, $this->getUser()->getEmail());
		
	  	$this->getUser()->setFlash('notice', 'Je bericht is verstuurd!');
  	}
  }
  
  private function getGmailConnection($username, $password){
  	$connection = new Swift_Connection_SMTP("smtp.gmail.com", Swift_Connection_SMTP::PORT_SECURE, Swift_Connection_SMTP::ENC_TLS);
	$connection->setUsername($username);
	$connection->setPassword($password);
	
	return $connection;
  }
  
  private function inviteNewUser($email, $mailer){
  	$username = md5(rand(1000, 9999));
  	$password = md5(rand(1000, 9999));
    	
    $user = new sfGuardUser();
    $user->username = $username;
    $user->password = $password;
    $user->groups[] = Doctrine::getTable('sfGuardGroup')->createQuery('a')->where('a.name = ?', 'leerling')->fetchOne();
    $user->Profile = new sfGuardUserProfile();
    $user->Profile->email = $email;
    $user->Profile->is_invite = true;
    
    $user->save();
    $user->Profile->save();
    
    $name = sprintf('%s (%s)', $this->getUser()->getGuardUser()->getFullname(), $this->getUser()->getUsername());
    $url = $this->getController()->genUrl(sprintf('@invite_accept?username=%s', $username), true);
        
    $message = new Swift_Message();
	$message->setFrom('DNS Leergemeenschap Site');
	$message->setSubject('Uitnodiging DNS Leergemeenschap');
	$message->setContentType('text/html');
	$message->setBody(
"Hallo, <br /><br />

Jij bent door {$name} uitgenodigd om deel te nemen aan de de DNS Leergemeenschap site.<br /><br />

<a href=\"$url\">Klik hier om de uitnodiging aan te nemen</a><br /><br /><br /><br /><br /><br />

$url"
	);
	
	$recipients = new Swift_RecipientList();
	
	foreach(sfConfig::get('app_feedback_feedback_email', array('dnsleergemeenschap@gmail.com')) as $recipient){
		$recipients->addTo($recipient);
	}

	$mailer->send($message, $recipients, $this->getUser()->getEmail());
  }
  
  public function executeInvite(sfWebRequest $request){
  	if($request->isMethod('post')){
  	  $emails = explode("\n", $request->getParameter('email'));
  	  
  	  $mailer = new Swift($this->getGmailConnection(sfConfig::get('app_invite_sender_email', 'dnsleergemeenschap@gmail.com'), sfConfig::get('app_invite_sender_password', 'swordfish')));
  	      
  	  $messages = array();
  	  $messages['error'] = array();
  	  $messages['success'] = array();
  	  
  	  foreach($emails as $email){
	  	  if(Doctrine::getTable('sfGuardUserProfile')->createQuery('a')->where('a.email = ?', $email)->fetchOne()){
	  	  	$messages['error'][] = $email;
	  	  }else{
	  	  	$messages['success'][] = $email;
	  	  	$this->inviteNewUser($email, $mailer);
	  	  }
  	  }
  	  
  	  if(count($emails)>1){
	  	  if(count($messages['success'])==0){
	  	  	$this->getUser()->setFlash('error', 'Alle emails ('.implode($emails, ', ').') zijn al geregisteerd');
	  	  }else if(count($messages['error'])==0){
	  	  	$this->getUser()->setFlash('notice', 'Alle uitnodigen zijn verstuurd');
	  	  }else{
	  	  	$this->getUser()->setFlash('error', 'De uitnodigingen naar '.implode($messages['error'], ', ').' zijn niet goed verstuurd.');
	  	  }
  	  }else{
  	  	  if(count($messages['success'])==0){
	  	  	$this->getUser()->setFlash('error', 'Dit email adres is al geregisteerd');
	  	  }else if(count($messages['success'])==0){
	  	  	$this->getUser()->setFlash('notice', 'De uitnodiging is verstuurd');
	  	  }
  	  }
  	  
  	  $referer = $request->getReferer();
      $this->redirect('' != $referer ? $referer : '@homepage');
  	}
  }
  public function executeInviteAccept(sfWebRequest $request){
  	$user = $this->getUser();
  	
  	if ($user->isAuthenticated()){
  		if($user->getProfile()->is_invite){
  			$this->forward('user', 'edit');
  		}
  		
    	$user->setFlash('error', 'Je bent al ingelogd');
    	$signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer($request->getReferer()));
        return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
    }

    if(!$sf_guard_user=Doctrine::getTable('sfGuardUser')->createQuery('a')->where('a.username = ?', $request->getParameter('username'))->addWhere('a.Profile.is_invite = ?', true)->fetchOne()){
	    $user->setFlash('error', 'Er is geen uitnodiging voor dit account');
    	$signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer($request->getReferer()));
        
    	return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
    }
    
    $this->getUser()->signin($sf_guard_user, true);
    $form = new sfGuardUserAdminForm($sf_guard_user);
    
	$this->form = $this->prepareForm($form);
  	
  	$this->setTemplate('edit');
  }
  
  protected function prepareForm($form){
  	unset($form['profile|email'], $form['salt'], $form['algorithm'], $form['is_active'], $form['is_super_admin'], $form['created_at'], $form['updated_at'], $form['groups_list'], $form['permissions_list']);
  	$form->setDefault('username', 'Kies een gebruikersnaam');
  	
  	return $form;
  }
  
  public function executeEdit(sfWebRequest $request){
  	$this->forward404Unless($sf_guard_user=Doctrine::getTable('sfGuardUser')->createQuery('a')->where('a.username = ?', $request->getParameter('username'))->addWhere('a.Profile.is_invite = ?', true)->fetchOne());
    $form = new sfGuardUserAdminForm($sf_guard_user);
    
	$this->form = $this->prepareForm($form);
  }
  
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $a = $request->getParameter('sf_guard_user');
    
    $this->forward404Unless($sf_guard_user = Doctrine::getTable('sfGuardUser')->find(array($a['id'])), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $form = new sfGuardUserAdminForm($sf_guard_user);

    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $form->getObject()->getProfile()->is_invite = false;
      $sf_guard_user = $form->save();
	  
      $this->forward('user', 'my');
    }
    
    $this->form = $form;
    $this->setTemplate('edit');
  }
}
?>
