	<ul id="crumbs">
		<li><?php echo link_to("Forum Index", "sf_doctrine_simple_forum_index")?></li>
		<li><?php echo link_to($forum->getName(), "sf_doctrine_simple_forum_view_board", array("id"=>$forum->getId(), "slug"=>$forum->getSlug()))?></li>
		<li>Create Topic</li>
	</ul>
	<form method="POST" action="" name="sf_doctrine_simple_forum_create_topicc" id="sf_doctrine_simple_forum_create_topicc">
						<br />
						<h3 class="toolbar" style="clear:both">Create a thread</h3>
						<dl class="list_form">
							<dt>
								<label>Topic Title: <?php echo $form->renderGlobalErrors()?></label>
							</dt>
							<dd>
								<?php echo $form->renderHiddenFields(); ?>
								<?php echo $form['title']->renderError()?>
								<?php echo $form['title']->render()?>
								<span class="hint">Please choose a topic name. Please try and keep it as short and concise as possible.<span class="hint-pointer">&nbsp;</span></span>
							</dd>
							<dt>
								<label>Content:</label>
							</dt>
							<dd>
								<?php echo $form['content']->renderError()?>
								<?php echo $form['content']->render()?>
								<span class="hint">Please enter in some content for the thread. Please make sure it's more than 50 characters in length..<span class="hint-pointer">&nbsp;</span></span>
							</dd>
						</dl>	
						<a href="#" class="awesome" onClick="document.sf_doctrine_simple_forum_create_topicc.submit()">Create Topic</a>	
	</form>

