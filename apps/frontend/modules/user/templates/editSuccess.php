<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('user/update'); ?>" method="post">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="form">
    <tfoot>
      <tr>
        <th></th>
        <td>
          <?php echo $form->renderHiddenFields() ?>
          <input type="submit" value="Opslaan" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>Gebruikersnaam</th>
        <td>
          <?php echo $form['username']->renderError() ?>
          <?php echo $form['username'] ?>
          <?php use_helper('Javascript');
          echo javascript_tag('
          $("#sf_guard_user_username").focus(function(){
            if($(this).attr("value") == "Kies een gebruikersnaam"){
          		$(this).attr("value", "");
          	}
          }).blur(function(){
          	if($(this).attr("value") == ""){
          		$(this).attr("value", "Kies een gebruikersnaam");
          	}
          });
          ');
          ?>
        </td>
      </tr>
      <tr>
        <th>Wachtwoord</th>
        <td>
          <?php echo $form['password']->renderError() ?>
          <?php echo $form['password'] ?>
        </td>
      </tr>
      <tr>
        <th>Wachtwoord (herhaling)</th>
        <td>
          <?php echo $form['password_again']->renderError() ?>
          <?php echo $form['password_again'] ?>
        </td>
      </tr>
      <tr>
        <th>Voornaam</th>
        <td>
          <?php echo $form['profile|first_name']->renderError() ?>
          <?php echo $form['profile|first_name'] ?>
        </td>
      </tr>
      <tr>
        <th>Tussenvoegsel</th>
        <td>
          <?php echo $form['profile|preposition']->renderError() ?>
          <?php echo $form['profile|preposition'] ?>
        </td>
      </tr>
      <tr>
        <th>Achternaam</th>
        <td>
          <?php echo $form['profile|last_name']->renderError() ?>
          <?php echo $form['profile|last_name'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>