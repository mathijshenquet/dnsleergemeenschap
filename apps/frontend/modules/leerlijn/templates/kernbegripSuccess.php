<?php slot('title', $kernbegrip->getName()); ?>

<div class="leerlijn" id="kernbegrip">
	<ul>
	<?php foreach($kernbegrip->getThema() as $thema):?>
	<?php foreach($thema->getLeerjaar() as $leerjaar): ?>
		<li>
			<?php echo include_partial('breadcrumb', array('items'=>array(
				link_to('Leerlijn', '@leerlijn'),
				link_to($leerjaar->getName(), sprintf('@leerlijn_leerjaar?id=%s&slug=%s', $leerjaar->getId(), $leerjaar->getNameSlug()) ),
				link_to($thema, sprintf('@leerlijn_thema?id=%s&slug=%s', $thema->getId(), $thema->getNameSlug())),
			))); ?>
		</li>
	<?php endforeach; ?>
	<?php endforeach; ?>
	<?php foreach($kernbegrip->getKern() as $kern):?>
		<li>
			<?php echo include_partial('breadcrumb', array('items'=>array(
				link_to('Leerlijn', '@leerlijn'),
				link_to($kern->getLeergebied(), sprintf('@leerlijn_leergebied?id=%s&slug=%s', $kern->getLeergebied()->getId(), $kern->getLeergebied()->getNameSlug()) ),
				link_to($kern, sprintf('@leerlijn_kern?id=%s&slug=%s', $kern->getId(), $kern->getNameSlug())),
			))); ?>
		</li>
	<?php endforeach; ?>
	<?php foreach($kernbegrip->getEindterm() as $eindterm):?>
		<li>
			<?php echo include_partial('breadcrumb', array('items'=>array(
				link_to('Leerlijn', '@leerlijn'),
				link_to($eindterm->getDomein()->getVak()->getLeergebied(), sprintf('@leerlijn_leergebied?id=%s&slug=%s', $eindterm->getDomein()->getVak()->getLeergebied()->getId(), $eindterm->getDomein()->getVak()->getLeergebied()->getNameSlug())),
				link_to($eindterm->getDomein()->getVak(), sprintf('@leerlijn_vak?id=%s&slug=%s', $eindterm->getDomein()->getVak()->getId(), $eindterm->getDomein()->getVak()->getNameSlug()) ),
				link_to($eindterm->getDomein().' / '.$eindterm, sprintf('@leerlijn_eindterm?id=%s&slug=%s', $eindterm->getId(), $eindterm->getNameSlug())),
			))); ?>
		</li>
	<?php endforeach; ?>
	</ul>

	<div class="infobox">
	    <div class="content">
	    	<?php if($kernbegrip->getImage()):?>
	    	<a href="<?php echo sprintf('/uploads/leerlijn/%s', $kernbegrip->getImage()); ?>" rel="prettyPhoto">
				<img src="/uploads/leerlijn/big/<?php echo $kernbegrip->getImage(); ?>" alt="<?php echo $kernbegrip->getName(); ?>" />
		    </a>
	    	<?php endif; ?>
	      	<h1><?php echo $kernbegrip->getName(); ?></h1>
			<p class="summary"><?php echo $kernbegrip->getDescription(); ?></p>
	    </div>
	</div>
	
	<div class="category_title">
		<h2>Sleutelinzichten</h2>
		<p class="summary">
			Dit zijn de sleutelinzichten
		</p>
	</div>
	<ul class="block">
	<?php foreach($kernbegrip->getSleutelinzicht() as $sleutelinzicht):?>
		<li class="item sleutelinzicht">
			<?php if($sleutelinzicht->getNiveau()->getImage()): ?>
			<div class="img">
				<img src="<?php echo sprintf('/uploads/leerlijn/tiny/%s', $sleutelinzicht->getNiveau()->getImage()); ?>" alt="Sleutelinzicht" />
			</div>
			<?php endif;?>
	      	<p>
	      		<?php echo $sleutelinzicht->getDescription(); ?>
	      	</p>
		</li>
	<?php endforeach; ?>
	</ul>
</div>