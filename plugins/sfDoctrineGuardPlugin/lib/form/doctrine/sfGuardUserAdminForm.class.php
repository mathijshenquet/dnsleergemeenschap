<?php

/**
 * sfGuardUserAdminForm for admin generators
 *
 * @package form
 * @package sf_guard_user
 */
class sfGuardUserAdminForm extends BasesfGuardUserAdminForm
{
  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();
    
    if($this->isNew()){
    	$profile = new sfGuardUserProfileForm();
    }else{
    	$profile = new sfGuardUserProfileForm($this->getObject()->getProfile());
    }
    
    unset($profile['user_id'], $profile['id']);
    
    $this->embedMergeForm('profile', $profile);
  }
}