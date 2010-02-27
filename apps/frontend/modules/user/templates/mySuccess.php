<div id="profile">
	<div class="infobox">
	    <div class="content">
	        <?php /* if($user->getImage()):?>
	        <img src="/uploads/avatar/<?php echo $user->getImage(); ?>" alt="<?php echo $user->getUsername(); ?>" />
	        <?php endif; */ ?>
	        <h2>Profiel van <?php echo $profile->getFullname(); ?></h2>
	        <?php echo $sf_data->getRaw('user')->getInformation(); ?>
	    </div>
	</div>
	<dl>
		<dt>Gebruikersnaam</dt>
		<dd><h4><?php echo $user->getUsername(); ?></h4></dd>

		<dt>Naam</dt>
		<dd><h4><?php echo $profile->getFullname()?></h4></dd>
	</dl>
	
	<?php /*?><form action="<?php echo url_for('messages/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php if (!$form->getObject()->isNew()): ?>
	<input type="hidden" name="sf_method" value="put" />
	<?php endif; ?>
	  <table class="messages">
	    <tfoot>
	      <tr>
	        <td>
	        </td>
	        <td>
	          <?php echo $form->renderHiddenFields() ?>
	          <input type="submit" value="Maak" />
	        </td>
	      </tr>
	    </tfoot>
	    <tbody>
	      <?php echo $form->renderGlobalErrors() ?>
	      <tr>
	        <th>Naam</th>
	        <td>
	          <?php echo $form['user']->renderError() ?>
	          <?php echo $form['user'] ?>
	        </td>
	      </tr>
	      <tr>
	        <th>Bericht</th>
	        <td>
	          <?php echo $form['body']->renderError() ?>
	          <?php echo $form['body'] ?>
	        </td>
	      </tr>
	      <?php /*<tr>
	        <th><?php echo $form['donation']->renderLabel() ?></th>
	        <td>
	          <?php echo $form['donation']->renderError() ?>
	          <?php echo $form['donation'] ?>
	        </td>
	      </tr>*?/ ?>
	    </tbody>
	  </table>
	</form><?php */ ?>
</div>