<h2>Profiel van <?php echo $user->getFullname(); ?></h2>
<dl>
	<dt>Gebruikersnaam</dt>
	<dd><?php echo $user->getUsername(); ?></dd>
	
	<dt>Naam</dt>
	<dd><?php echo $user->getFullname()?>
	
	<dt>Groepen</dt>
	<dd>
		<ul>
			<?php foreach($user->getGroups() as $group): ?>
			<li><?php echo $group->getName();?></li>
			<?php endforeach;?>
		</ul>
	</dd>
	
	<dt>Rechten</dt>
	<dd>
		<ul>
			<?php foreach($user->getAllPermissions() as $permission): ?>
			<li><?php echo $permission->getDescription();?></li>
			<?php endforeach;?>
		</ul>
	</dd>
</dl>