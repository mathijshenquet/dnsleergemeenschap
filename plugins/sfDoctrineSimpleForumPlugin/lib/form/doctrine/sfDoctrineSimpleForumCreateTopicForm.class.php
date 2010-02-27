<?php
class sfDoctrineSimpleForumCreateTopicForm extends sfForm
{
   public function configure()
  {
    $this->setWidgets(array(
      'title'    => new sfWidgetFormInput(array(), array('class' => 'text')),
      'content' => new sfWidgetFormTextarea(),
    ));
    
    $this->widgetSchema->setLabels(array(
	  'title'    => 'Topic Title:',
	  'content'   => 'Content:',
	));
	 
    $this->widgetSchema->setFormFormatterName('list');
    
    $this->widgetSchema->setNameFormat('sf_doctrine_simple_forum_topic_create[%s]');
    
        $this->setValidators(array(
      'title'    => new sfValidatorString(array('required' => true)),
      'content' => new sfValidatorString(array('min_length' => 50))));
  }
}
