<?php

/**
 * leerlijnNiveau form.
 *
 * @package    form
 * @subpackage leerlijnNiveau
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class leerlijnNiveauForm extends BaseleerlijnNiveauForm
{
  public function configure()
  {
  	$this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
  	  'label' 		=> 	'Afbeelding',
  	  'file_src'	=>	'/uploads/leerlijn/tiny/'.$this->getObject()->getImage(),
  	  'is_image'	=>	TRUE,
  	  'edit_mode'	=>  !$this->getObject()->getImage()=='',
  	  'template'  	=> 	'<div>%file%%input%</div>'
  	));

  	$this->validatorSchema['image'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/leerlijn/tiny',
      'mime_types' => 'web_images',
    ));

    $this->validatorSchema['image_delete'] = new sfValidatorPass();
    
    parent::configure();
  }
}