<?php

/**
 * showcase form.
 *
 * @package    form
 * @subpackage showcase
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class showcaseForm extends BaseshowcaseForm
{
public function configure()
  {
  	parent::configure();

  	$this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
  	  'label' 		=> 	'Afbeelding',
  	  'file_src'	=>	'/uploads/showcase/'.$this->getObject()->getImage(),
  	  'is_image'	=>	true,
  	  'edit_mode'	=>  !$this->getObject()->getImage()=='',
  	  'template'  	=> 	'<div>%file%%input%</div>'
  	));

  	$this->validatorSchema['image'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/showcase',
      'mime_types' => 'web_images',
    ));
  }
}