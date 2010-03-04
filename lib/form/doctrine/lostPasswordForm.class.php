<?php
class lostPasswordForm extends BaseForm {
	public function setup(){
		$this->setWidgets(array(
	      'email' 	=> new sfWidgetFormInputText()
	    ));
	
	    $this->setValidators(array(
	      'email'	=> new sfValidatorEmail(),
	    ));
	    parent::setup();
	}
}
?>