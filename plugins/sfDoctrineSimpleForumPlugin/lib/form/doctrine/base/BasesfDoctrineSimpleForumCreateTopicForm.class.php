<?php
class BasesfDoctrineSimpleForumCreateTopicForm extends BaseFormDoctrine
{
	
   public function configure()
  {
    $this->setWidgets(array(
      'title'    => new sfWidgetFormInput(),
      'content' => new sfWidgetFormTextarea(),
    ));
 
    $this->widgetSchema->setFormFormatterName('list');
  }
	
}
?>