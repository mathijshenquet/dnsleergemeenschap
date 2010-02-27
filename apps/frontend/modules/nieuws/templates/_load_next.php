<?php use_helper('jQuery'); ?>
<?php use_javascript('jqueryui/effects.core.min.js'); ?>
<?php use_javascript('jqueryui/effects.highlight.min.js'); ?>


<li class="loadnext signup_button" id="loadnext-<?php echo $page; ?>">
	<h5>
	<?php echo image_tag('/images/icons/page_add.png'); ?>
	<?php echo jq_link_to_remote('Meer berichten &raquo;', array(
		'update'=>'nieuws',
		'url'=>'@nieuws_page?page='.($page+1),
		'position'=>'bottom',
		'success'=>'
						$("#nieuws").append(data).effect("highlight", {}, 2000); 
						$("#loadnext-'. $page .'").remove();
						window.location.hash = $(data).attr("id");
						Cufon.refresh();
					'
	)); ?>
	</h5>
</li>