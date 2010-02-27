<?php use_helper('Form');?>
<form action="" method="post">
	<table class="form">
		<tr>
			<th>Feedback</th>
			<td><?php echo textarea_tag('body'); ?></td>
		</tr>
		<tr>
			<th></th>
			<td><?php echo submit_tag('Versturen &raquo;'); ?></td>
		</tr>
	</table>
</form>
