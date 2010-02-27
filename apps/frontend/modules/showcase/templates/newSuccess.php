<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('showcase/create') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table class="form">
    <tfoot>
      <tr>
      	<td></td>
        <td>
          <?php echo $form->renderHiddenFields() ?>
          <input type="submit" value="Toevoegen" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>Titel</th>
        <td>
          <?php echo $form['short_title']->renderError() ?>
          <?php echo $form['short_title'] ?>
          <p class="summary">Geef hier een titel van ongeveer 20 tekens.</p>
        </td>
      </tr>
      <tr>
        <th>Lange titel</th>
        <td>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title'] ?>
          <p class="summary">Geef hier een uitgebreide titel.</p>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['image']->renderLabel() ?></th>
        <td>
          <?php echo $form['image']->renderError() ?>
          <?php echo $form['image'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
