<?php use_helper('I18N'); ?>	
	<ul id="crumbs">
		<li><?php echo link_to(__("Forum Index", null, 'sfDoctrineSimpleForum'), "sf_doctrine_simple_forum_index")?></li>
		<li><?php echo link_to($forum->getName(), "sf_doctrine_simple_forum_view_board", array("id"=>$forum->getId(), "slug"=>$forum->getSlug()))?></li>
		<li><?php echo __("Create Topic", null, 'sfDoctrineSimpleForum'); ?></li>
	</ul>
	<form method="POST" action="" name="sf_doctrine_simple_forum_create_topicc" id="sf_doctrine_simple_forum_create_topicc">
		<br />
		<h3 class="toolbar" style="clear:both"><?php echo __("Create a thread", null, 'sfDoctrineSimpleForum'); ?></h3>
		<div class="info"><?php echo __("Please make sure all the fields are filled in.", null, 'sfDoctrineSimpleForum'); ?></div>
		<dl class="list_form">
			<dt>
				<label><?php echo __("Topic Title", null, 'sfDoctrineSimpleForum'); ?>:</label>
				<?php echo $form->renderHiddenFields(); ?>
			</dt>
			<dd>
				<?php echo $form['title']->renderError()?>
				<?php echo $form['title']->render()?>
				<span class="hint"><?php echo __("Please choose a topic name. Please try and keep it as short and concise as possible.", null, 'sfDoctrineSimpleForum'); ?><span class="hint-pointer">&nbsp;</span></span>
			</dd>
			<dt>
				<label><?php echo __("Content", null, 'sfDoctrineSimpleForum'); ?>:</label>
			</dt>
			<dd>
				<?php echo $form['content']->renderError()?>
				<?php echo $form['content']->render()?>
				<span class="hint"><?php echo __("Please enter in some content for the thread. Please make sure it's more than 50 characters in length..", null, 'sfDoctrineSimpleForum'); ?><span class="hint-pointer">&nbsp;</span></span>
			</dd>
		</dl>	
		<a href="#" class="awesome" onClick="document.sf_doctrine_simple_forum_create_topicc.submit()"><?php echo __("Create Topic", null, 'sfDoctrineSimpleForum'); ?></a>	
	</form>

