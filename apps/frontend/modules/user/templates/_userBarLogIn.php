<div id="userbar" class="signin">
  <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <ul class="userlogin">
    <?php if($form->hasErrors()): ?>
  	<li class="error">
	  <label for="login_error">Fout</label>
  	  <span id="login_error">Gebruikersnaam of wachtwoord fout</span>
  	</li>
  	<?php endif; ?>
  	<li class="username">
  		<?php echo $form['username']->renderLabel(); ?>
  		<?php echo $form['username']; ?>
  	</li>
  	<li class="password">
  		<?php echo $form['password']->renderLabel(); ?>
  		<?php echo $form['password']; ?>
  	</li>
  	<li class="submit">
  		<?php echo $form['_csrf_token']->render(); ?>
  		<input type="submit" value="Log In" />
  	</li>
  	<?php //@todo remember me voor login maken
  	 /*<li class="remember">
  		<?php echo $form['remember']->renderRow(); ?>
  	</li>
    <li>
    	<a href="<?php echo url_for('@sf_guard_password') ?>">Wachtwoord vergeten?</a>
    </li>
    <li>
    	<a href="<?php echo url_for('@sf_guard_password') ?>">Registreren</a>
    </li>*/ ?>
  </ul>
  </form>
</div>