<?php 
use_javascript('jqueryui/effects.core.min.js');
use_javascript('jqueryui/effects.highlight.min.js');
use_javascript('walloffame');
use_helper('jQuery'); 
?>

<?php
if($sf_user->hasCredential('showcase_admin')):
	include_component('user', 'adminBar', array('actions' => array(
		array('id'=>'list', 'link'=>url_for('@backend.showcase'))
	))); 
endif;
?>

<div id="walloffame">
	<div class="infobox">
		<div class="content">
			<h1>Wall of Fame</h1>
			<p>De wall of fame is een plek om de dingen te laten zien waar jij trots op bent.</p>
		</div>
	</div>
	<ul>
	<?php foreach($items as $item): ?>
	  <li>
	    <?php echo link_to(sprintf('<img src="/uploads/showcase/125x125/%s" alt="%s" />', $item->getImage(), $item->getTitle()), sprintf('@showcase_item?id=%s&slug=%s', $item->getId(), $item->getTitleSlug()), array("class"=>"image")); ?>
	  	<h6>
		    <?php echo link_to($item->getTitle(), sprintf('@showcase_item?id=%s&slug=%s', $item->getId(), $item->getTitleSlug())); ?>
	  	</h6>
	  	<div>
		    <p>
		    	Door <?php echo $item->getUser()->getFullname(); ?>
		    </p>
	    </div>
	  </li>
	<?php endforeach;?>
	</ul>
	
	<div class="form"></div>
	
	<?php if($sf_user->hasCredential('showcase_add')): ?>
	<h5 class="signup_button"> 
		<img src="/images/icons/add.png" alt="toevoegen" />
		<?php
		if_javascript();
			echo jq_link_to_remote('Voeg jou kunstwerk toe &raquo;', array(
				'update'=>'#walloffame .form',
				'url'=>'showcase/new',
				'complete'	=>	'Cufon.refresh(); $("#walloffame .form").effect("highlight", {}, 2000);'
			));
		end_if_javascript();
		?>
		<noscript>
			<?php echo link_to('Voeg jou kunstwerk toe &raquo;', 'showcase/new');?>
		</noscript>
	</h5>
	<?php endif; ?>
</div>