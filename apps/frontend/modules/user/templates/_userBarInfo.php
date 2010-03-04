

<div id="userbar" class="info">
  <ul>
  	<?php //* ?><li class="username">
  		<label for="user">Gebruiker</label>
  		<?php echo link_to($sf_user->getProfile()->getFullName()?$sf_user->getProfile()->getFullName():'Niet Bekent', '@profile', $sf_user->getProfile()->getFullName()?array('id'=>'user'):array('id'=>'user', 'class'=>'unknown')); ?>
  	</li><?php // */ ?>
  	<?php /* ?><li class="mailbox">
  		<label for="mailbox">Mailbox</label>
  		<?php echo link_to('Berichten', '@mailbox', array('id'=>'mailbox')); ?>
  	</li><?php */ ?>
  	<li class="signout">
  		<label for="signout">Afmelden</label>
  		<?php echo link_to('Afmelden', '@sf_guard_signout', array('id'=>'signout')); ?>
  	</li>
  	<?php if($sf_user->hasCredential(array('expertbank_admin', 'leerlijn_admin', 'forum_admin', 'users_admin', 'showcase_admin'))): ?>
  	<li class="admin">
  		<label for="beheer">Beheer</label>
  		<?php echo link_to('Beheer', '@backend.homepage?referer=frontend', array('id'=>'beheer')); ?>
  	</li>
  	<?php endif; ?>
  	<?php if(sfConfig::get('app_invite', false) && $sf_user->hasCredential('user_invite')): ?>
  	<li class="invite">
  		<label for="invite">Uitnodigen</label>
  		<?php echo link_to('Uitnodigen', '@invite', array('id'=>'invite')); ?>
  	</li>
  	<?php endif; ?>
  </ul>
</div>