<?php

/**
 * Links form.
 *
 * @package    form
 * @subpackage Links
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class LinksForm extends BaseLinksForm
{
  public function configure()
  {
  	parent::configure();
  	
  	$this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
  	  'label' 		=> 	'Afbeelding',
  	  'file_src'	=>	'/uploads/links/'.$this->getObject()->getImage(),
  	  'is_image'	=>	TRUE,
  	  'edit_mode'	=>  !$this->isNew(),
  	  'template'  	=> 	'<div>%file%%input%</div>'
  	));
  	
  	$this->widgetSchema['url'] = new sfWidgetFormInputText();
  	
  	$this->validatorSchema['url'] = new sfValidatorUrl();
  	
  	$this->validatorSchema['image'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/links',
      'mime_types' => 'web_images',
    ));
  }
}