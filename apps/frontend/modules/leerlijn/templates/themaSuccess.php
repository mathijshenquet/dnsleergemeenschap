<?php slot('title', $kern->getName()); ?>

<div class="leerlijn">
	<div class="infobox">
	    <div class="content">
	    	<?php if($kern->getImage()):?>
	    	<a href="<?php echo sprintf('/uploads/leerlijn/%s', $kern->getImage()); ?>" rel="prettyPhoto">
			  <img src="/uploads/leerlijn/big/<?php echo $kern->getImage(); ?>" alt="<?php echo $kern->getName(); ?>" />
			</a>
		    <?php endif; ?>
	      	<h1><?php echo $kern->getName(); ?></h1>
	    </div>
	</div>
	
	<?php include_partial('kernbegrippen', array('kernbegrippen'=> $kern->getKernbegrip())); ?>
</div>