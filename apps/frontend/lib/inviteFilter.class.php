<?php

class inviteFilter extends sfFilter
{
  public function execute($filterChain)
  {
  	$user = $this->getContext()->getUser();
    $request = $this->getContext()->getRequest();
  	
    if ($this->isFirstCall() && $user->isAuthenticated() && $this->getContext()->getModuleName() != 'user')
    { 
    	if($user->getProfile()->is_invite){
      		$this->getContext()->getController()->redirect('user/edit?username='.$user->getUsername());
    	}
    }
 
    // Execute next filter
    $filterChain->execute();
  }
}

?>