<?php
class userComponents extends sfComponents
{
  public function executeUserBar(sfWebRequest $request)
  {
    if(!$this->getUser()->isAuthenticated())
    {        	
	    include_component('user', 'userBarLogIn');
    }
    else{
    	include_partial('user/userBarInfo');
    }
  }
  public function executeUserBarLogIn(sfWebRequest $request)
  {
  	$class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin');
	$this->form = new $class();
	
	if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('signin'));
    }
  }
  public function executeAdminBar(){
  	if(!$this->getUser()->isAuthenticated()){
  		return sfView::NONE;
  	}
  	
  	$acties = array('list'=>'Beheer', 'new'=>'Nieuw', 'edit'=>'Wijzig', 'delete'=>'Verwijder');
  	  
  	foreach($this->actions as $i=>$null){
		if(array_key_exists($this->actions[$i]['id'], $acties)){
			$this->actions[$i]['title'] = $acties[$this->actions[$i]['id']];
		}
	}
  }
}
?>