<?php
class lostPasswordForm extends sfForm {
	public function setup(){
		$this->setWidgets(array(
	      'email' 	=> new sfWidgetFormInput()
	    ));
	
	    $this->setValidators(array(
	      'email'	=> new sfValidatorEmail(),
	    ));
	    parent::setup();
	}
}
?>