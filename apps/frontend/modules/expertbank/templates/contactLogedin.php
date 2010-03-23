<?php slot('title', 'Contact opnemen met '.$expert->getName()); ?>
<?php 
if($sf_user->hasCredential('expertbank')){
	include_component('user', 'adminBar', array('actions' => array(
	array('id'=>'edit', 'link'=>url_for('@backend.expert_expertbank_edit?id='.$expert->getId()))
	)));
}
?>

<div class="expertbank show">
  <h1>Neem contact op met <?php echo $expert->getName(); ?></h1>

  <form action="<?php echo url_for(sprintf('@expertbank_send?id=%s', $sf_request->getParameter('id'))); ?>" method="post">
	<input type="hidden" name="sf_method" value="put" />
	  <table class="form">
	    <tfoot>
	      <tr>
	      	<td></td>
	        <td>
	          <input type="submit" value="Verstuur" />
	        </td>
	      </tr>
	    </tfoot>
	    <tbody>
	      <?php /*<tr>
	        <th>Naam</th>
	        <td>
	          <input type="text" id="email_name" name="email[name]">
	          <p class="summary">Zet hier jou naam neer.</p>
	        </td>
	      </tr>
	      <tr>
	        <th>Email</th>
	        <td>
	          <input type="text" id="email_email" name="email[email]">
	          <p class="summary">Zet hier jou email neer. (je email word niet opgeslagen en alleen gebruikt door de expert om contact met je op te nemen)</p>
	        </td>
	      </tr> */?>
	      <tr>
	        <th>Project</th>
	        <td>
	          <input type="text" id="email_subject" name="email[subject]">
	          <p class="summary">Geef hier een korte omschrijving van jou project.</p>
	        </td>
	      </tr>
	      <tr>
	        <th>Omschrijving</th>
	        <td>
	          <textarea id="email_subject" name="email[message]">Geachte <?php echo $expert->getName(); ?>, </textarea>
	          <p class="summary">Stel jezelf hier voor en geef een uitgebreid beschrijving van jou project.</p>
	        </td>
	      </tr>
	    </tbody>
	  </table>
	</form>
</div>