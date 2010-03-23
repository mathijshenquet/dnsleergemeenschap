<?php 
slot('title', 'Expertisebank'); 
use_helper('jQuery');
use_javascript('jqueryui/effects.core.min.js');
use_javascript('jqueryui/effects.highlight.min.js');
use_stylesheet('JqueryAutocomplete');
use_stylesheet('ui-lightness/jquery-ui-1.7.2.custom.css');
jq_add_plugins_by_name(array('autocomplete'));

if($sf_user->hasCredential('expertbank')){ 
	include_component('user', 'adminBar', array('actions' => array(
	array('id'=>'list', 'link'=>url_for('@backend.expert_expertbank'))
	))); 
}
?>

<div class="infobox">
	<div class="content">
		<h1>Expertisebank</h1>
		<p>De expertisebank is bedoelt als plaats waar leerlingen, leraren en ouders hun expertise kenbaar kunnen maken aan de rest van leergemeenschap. Zo kunnen leerlingen of de school beroep doen op de kennis en expertise van mensen.</p>
	</div>
</div>

<ul class="expertbank">
	<?php foreach ($expert_list as $expert): ?>
	<li class="clickable">
		<p class="right">
			<img src="/images/icons/email.png" alt="toevoegen" />
			<?php echo link_to('Kom in contact &raquo;',  sprintf('@expertbank_show?id=%s&name_slug=%s&profession_slug=%s', $expert->getId(), $expert->getNameSlug(), $expert->getProfessionSlug()))?>
		</p>
		<div class="content">
			<?php 
			if($expert->getType()=='leerling'){ 
				$image = 'user';
			}elseif($expert->getType()=='ouder'){ 
				$image = 'user_gray';
			}elseif($expert->getType()=='leraar'){ 
				$image = 'user_suit';
			}elseif($expert->getType()=='anders'){ 
				$image = 'vcard';
			}
			?>
			<h3><?php echo link_to($expert->getProfession(), sprintf('@expertbank_show?id=%s&name_slug=%s&profession_slug=%s', $expert->getId(), $expert->getNameSlug(), $expert->getProfessionSlug())); ?> - <?php echo $expert->getName(); ?> <img class="type" src="/images/icons/<?php echo $image; ?>.png" alt="<?php echo $expert->getType(); ?>" /> <span class="type hidden"><?php echo $expert->getType(); ?> - </span></h3>
			<p><?php echo $expert->getDescription(); ?></p>
			
			<ul class="kernbegrippen">
				<?php foreach($expert->getKernbegrip() as $kernbegrip): ?>
				<li>\<?php echo link_to($kernbegrip->getName(), sprintf('@leerlijn_kernbegrip?id=%s&slug=%s', $kernbegrip->getId(), $kernbegrip->getNameSlug()))?></li>
				<?php endforeach; ?>
				<?php foreach($expert->getTags() as $tag): ?>
				<li>\<?php echo $tag; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</li>
	<?php endforeach; ?>
	<li class="signup_button">
		<div class="response">
		
		</div>
		
		<div class="form">
		
		</div>
		
		<h5> 
			<img src="/images/icons/add.png" alt="toevoegen" />
			<?php
			if_javascript();
				echo jq_link_to_remote('Meld je ook aan &raquo;', array(
					'update'	=>	'.signup_button .form',
					'url'		=>	'expertbank/new',
					'complete'	=>	'Cufon.refresh(); $(".signup_button .form").effect("highlight", {}, 2000);'
				));
			end_if_javascript();
			?>
			<noscript>
				<?php echo link_to('Meld je ook aan &raquo;', 'expertbank/new');?>
			</noscript>
		</h5>
	</li>
</ul>