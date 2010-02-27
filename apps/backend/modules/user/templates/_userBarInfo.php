<div id="userbar" class="info">
  <div>
	  <ul>
	  	<li class="signout">
	  		<label for="signout">Afmelden</label>
	  		<?php echo link_to('Afmelden', '@sf_guard_signout', array('id'=>'signout')); ?>
	  	</li>
	  	<li class="tosite">
	  		<label for="tosite">Site</label>
	  		<?php echo link_to('Terug naar de site', '@frontend.homepage');?>
	  	</li>
	  </ul>
	</div>
</div>