<?php slot('title', sprintf('Eindterm %s van Domein %s-%s', $eindterm->getName(), $eindterm->getDomein()->getName(), $eindterm->getDomein()->getVak()->getName())); ?>

<div class="leerlijn">
	<?php echo include_partial('breadcrumb', array('items'=>array(
		link_to('Leerlijn', '@leerlijn'),
		link_to($eindterm->getDomein()->getVak()->getLeergebied(), sprintf('@leerlijn_leergebied?id=%s&slug=%s', $eindterm->getDomein()->getVak()->getLeergebied()->getId(), $eindterm->getDomein()->getVak()->getLeergebied()->getNameSlug())),
		link_to($eindterm->getDomein()->getVak(), sprintf('@leerlijn_vak?id=%s&slug=%s', $eindterm->getDomein()->getVak()->getId(), $eindterm->getDomein()->getVak()->getNameSlug()) ),
		$eindterm->getDomein().' / '.$eindterm,
	))); ?>

	<div class="infobox">
		<div class="content">
	    	<?php if($eindterm->getImage()):?>
	    	<a href="<?php echo sprintf('/uploads/leerlijn/%s', $eindterm->getImage()); ?>" rel="prettyPhoto">
				<img src="/uploads/leerlijn/big/<?php echo $eindterm->getImage(); ?>" alt="<?php echo $eindterm->getName(); ?>" />
			</a>
		    <?php endif; ?>
	      	<h1><?php echo $eindterm->getName(); ?></h1>
			<p class="summary"><?php echo $eindterm->getDescription(); ?></p>
	    </div>
	</div>
	
	<?php include_partial('kernbegrippen', array('kernbegrippen'=> $eindterm->getKernbegrip())); ?>
</div>