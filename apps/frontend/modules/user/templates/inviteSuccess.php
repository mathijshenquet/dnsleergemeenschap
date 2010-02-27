<?php use_helper('Form'); ?>
<table class="form">
	<form action="" method="post">
		<tr>
			<th>Email</th>
			<th><?php echo textarea_tag('email'); ?></th>
		</tr>
		<tr>
			<th></th>
			<th><?php echo submit_tag('Verstuur'); ?></th>
		</tr>
	</form>
</table>