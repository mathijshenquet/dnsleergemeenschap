<div id="userbar" class="signin">
<div>
<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <ul class="userlogin">
  	<li class="username">
  		<?php echo $form['username']->renderRow(); ?>
  	</li>
  	<li class="password">
  		<?php echo $form['password']->renderRow(); ?>
  	</li>
  	<?php //@todo remember me voor login maken 
  	 /*<li class="remember">
  		<?php echo $form['remember']->renderRow(); ?>
  	</li> */ ?>
  	<li class="submit">
  		<?php echo $form['_csrf_token']->render(); ?>
  		<input type="submit" value="Log In">
  	</li>
    <li>
    	<a href="<?php echo url_for('@sf_guard_password') ?>">Wachtwoord vergeten?</a>
    </li>
  </ul>
</form>
</div>
</div>