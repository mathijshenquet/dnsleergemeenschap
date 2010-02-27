<?php slot('admin_bar'); ?>
<div id="admin_bar"<?php echo $sf_request->getCookie('admin_bar', 'true') == 'true' ? null : ' class="hidden"' ?>>
	<div class="wrapper">
		<ul class="content">
			<li class="show">
				<img src="/images/icons/add.png" alt="show" />
			</li>
			<li class="hide">
				<img id="admin_bar_hide" src="/images/icons/delete.png" alt="hide" />
			</li>
			<?php foreach($actions as $action): ?>
			<li id="action_<?php echo $action['id']?>">
				<label class="<?php echo $action['id']?>" for="action_field_<?php echo $action['id'] ?>"><?php echo $action['id']?></label>
				<a href="<?php echo $action['link']; ?>" id="<?php echo 'action_field_'.$action['id']; ?>"><?php echo $action['title']; ?></a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<?php end_slot(); ?>