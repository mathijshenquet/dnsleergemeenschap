<?php 
include_stylesheets_for_form($form);
include_javascripts_for_form($form);
use_helper('Javascript');
?>

<div class="expertbank new">
  <form action="<?php echo url_for('expertbank/create') ?>" method="post">
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
	      <tr>
	        <th>Email</th>
	        <td>
	          <?php echo $form['email']->renderError() ?>
	          <?php echo $form['email'] ?>
	          <p class="summary">Geef hier uw email adres op zodat mensen contact met jou kunnen leggen.</p>
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
	    </tbody>
	  </table>
	</form>
</div>