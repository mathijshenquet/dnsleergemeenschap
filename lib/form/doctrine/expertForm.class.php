<?php

/**
 * expert form.
 *
 * @package    form
 * @subpackage expert
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class expertForm extends BaseexpertForm
{
  public function configure()
  {
  	$this->widgetSchema['kernbegrip_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
  	$this->widgetSchema['zoektermen'] = new sfWidgetFormInputText();
  	
  	$this->validatorSchema['email'] = new sfValidatorEmail();
  	$this->validatorSchema['name'] = new sfValidatorString(array('min_length'=>2, 'max_length'=>255));
  	$this->validatorSchema['profession'] = new sfValidatorString(array('min_length'=>1, 'max_length'=>255));
  	$this->validatorSchema['description'] = new sfValidatorString(array('max_length'=>4000));
  	$this->validatorSchema['zoektermen'] = new sfValidatorString();
  	
  	$this->setDefault('zoektermen', $this->getObject()->getZoektermen());
  }
  public function save($con=NULL){
	$this->getObject()->addTag(explode(', ', $this->getValue('zoektermen')));
		
	return parent::save($con);
  }
}