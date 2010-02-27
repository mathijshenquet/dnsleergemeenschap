<?php
class userComponents extends sfComponents
{
  public function executeUserBar()
  {
    if(!$this->getUser()->isAuthenticated())
    {
    	include_component('user', 'userBarLogIn');
    }
    else{
    	include_component('user', 'userBarInfo');
    }
  }
  public function executeUserBarLogIn()
  {
  	$class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
    $this->form = new $class();
  }
  public function executeUserBarInfo()
  {
  }
}
?>