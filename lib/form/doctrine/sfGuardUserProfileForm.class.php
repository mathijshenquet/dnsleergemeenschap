<?php

/**
 * sfGuardUserProfile form.
 *
 * @package    form
 * @subpackage sfGuardUserProfile
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class sfGuardUserProfileForm extends BasesfGuardUserProfileForm
{
  public function configure()
  {
  	$this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
  	  'label' 		=> 	'Afbeelding',
  	  'file_src'	=>	'/uploads/avatars/'.$this->getObject()->getImage(),
  	  'is_image'	=>	TRUE,
  	  'edit_mode'	=>  !$this->getObject()->getImage()=='',
  	  'template'  	=> 	'<div>%file%%input%</div>'
  	));

  	$this->validatorSchema['image'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/avatars',
      'mime_types' => 'web_images',
    ));

    $this->validatorSchema['image_delete'] = new sfValidatorPass();
  }
}