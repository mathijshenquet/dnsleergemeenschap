<?php slot('title', $kern->getName()); ?>

<div class="leerlijn">
	<?php include_partial('breadcrumb', array('items'=>array(
	  	link_to('Leerlijn', '@leerlijn'),
	  	link_to($kern->getLeergebied(), sprintf('@leerlijn_leergebied?id=%s&slug=%s', $kern->getLeergebied()->getId(), $kern->getLeergebied()->getNameSlug()) ),
	  	$kern->getName()
	  )))?>

	<div class="infobox">
	    <div class="content">
	    	<?php if($kern->getImage()):?>
	    	<a href="<?php echo sprintf('/uploads/leerlijn/%s', $kern->getImage()); ?>" rel="prettyPhoto">
			  <img src="/uploads/leerlijn/big/<?php echo $kern->getImage(); ?>" alt="<?php echo $kern->getName(); ?>" />
			</a>
		    <?php endif; ?>
	      	<h1><?php echo $kern->getName(); ?></h1>
			<p class="summary"><?php echo $kern->getDescription(); ?></p>
	    </div>
	</div>
	
	<?php include_partial('kernbegrippen', array('kernbegrippen'=> $kern->getKernbegrip())); ?>
</div>