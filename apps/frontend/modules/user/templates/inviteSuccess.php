<?php slot('title', 'Uitnodigen'); ?>

<?php use_helper('Form'); ?>
<table class="form">
	<form action="" method="post">
		<tr>
			<th>Email</th>
			<th><textarea name="email" rows="10" cols="10"></textarea></th>
		</tr>
		<tr>
			<th></th>
			<th><input type="submit" value="Verstuur »" name="commit" /></th>
		</tr>
	</form>
</table>