<?php 
slot('title', 'Aanmelden voor de Expertbank'); 
include_stylesheets_for_form($form);
include_javascripts_for_form($form);

use_helper('jQuery');
use_javascript('jqueryui/effects.core.min.js');
use_javascript('jqueryui/effects.highlight.min.js');
use_stylesheet('JqueryAutocomplete');
use_stylesheet('ui-lightness/jquery-ui-1.7.2.custom.css');
jq_add_plugins_by_name(array('autocomplete'));
?>

<div class="expertbank new">
  <h1>Expertbank</h1>

  <form action="<?php echo url_for('expertbank/create') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php if (!$form->getObject()->isNew()): ?>
	<input type="hidden" name="sf_method" value="put" />
	<?php endif; ?>
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
	        <th>Naam</th>
	        <td>
	          <?php echo $form['name']->renderError() ?>
	          <?php echo $form['name'] ?>
	        </td>
	      </tr>
	      <?php /*<tr>
	        <th>Wat ben jij?</th>
	        <td>
	          <?php echo $form['type']->renderError() ?>
	          <?php echo $form['type'] ?>
	        </td>
	      </tr>*/ ?>
	      <tr>
	        <th>Expertise</th>
	        <td>
	          <?php echo $form['profession']->renderError() ?>
	          <?php echo $form['profession'] ?>
	          <p class="summary">Vat uw expertise kort samen.</p>
	        </td>
	      </tr>
	      <tr>
	        <th>Omschrijving</th>
	        <td>
	          <?php echo $form['description']->renderError() ?>
	          <?php echo $form['description'] ?>
	          <p class="summary">Geef hier wat meer informatie over uw expertise.</p>
	        </td>
	      </tr>
	      <tr>
	        <th>Zoektermen</th>
	        <td>
	          <?php echo $form['zoektermen']->renderError() ?>
	          <?php echo $form['zoektermen'] ?>
	          <p class="summary">Voeg hier zoektermen toe.</p>
	        </td>
	        <?php 
	        echo javascript_tag('
	        	$("#expert_zoektermen").autocomplete('.json_encode($sf_data->getRaw('tags')).', {
					multiple: true,
					matchContains: true,
					formatItem: function(row){
						return row[0]; 
					},
					formatResult: function(row){
						return row[0].replace(/(<.+?>)/gi, ""); 
					},
					delay: 100,
	        	});
	        ')
	        ?>
	      </tr>
	      <tr>
	        <th>Kernbegrippen</th>
	        <td>
	          <?php echo $form['kernbegrip_list']->renderError() ?>
	          <?php echo $form['kernbegrip_list'] ?>
	          <p class="summary">Voeg hier kernbegrippen toe die tot uw expertise behoren.</p>
	        </td>
	      </tr>
	      <tr>
	        <th>Email</th>
	        <td>
	          <?php echo $form['email']->renderError() ?>
	          <?php echo $form['email'] ?>
	          <p class="summary">Geef hier uw email adres op zodat mensen contact met jou kunnen leggen.</p>
	        </td>
	      </tr>
	    </tbody>
	  </table>
	</form>
</div>