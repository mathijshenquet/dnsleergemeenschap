<?php

/**
 * leerlijnKernbegrip form.
 *
 * @package    form
 * @subpackage leerlijnKernbegrip
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class leerlijnKernbegripForm extends BaseleerlijnKernbegripForm
{
  public function configure()
  {
  	$this->validatorSchema['leergebied_id'] = new sfValidatorPass();

  	$this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
  	  'label' 		=> 	'Afbeelding',
  	  'file_src'	=>	'/uploads/leerlijn/big/'.$this->getObject()->getImage(),
  	  'is_image'	=>	TRUE,
  	  'edit_mode'	=>  !$this->getObject()->getImage()=='',
  	  'template'  	=> 	'<div>%file%%input%</div>'
  	));

  	$this->widgetSchema['kern_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
  	$this->widgetSchema['eindterm_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
  	
  	$this->validatorSchema['image'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/leerlijn',
      'mime_types' => 'web_images',
    ));

    $this->validatorSchema['image_delete'] = new sfValidatorPass();
    
    parent::configure();
  }
}