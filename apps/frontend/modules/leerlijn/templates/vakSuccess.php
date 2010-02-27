<?php slot('title', sprintf('Vak %s van leergebied %s', $vak->getName(), $vak->getLeergebied()->getName())); ?>

<div class="leerlijn" id="vak">
	<?php include_partial('breadcrumb', array('items'=>array(
	  	link_to('Leerlijn', '@leerlijn'),
	  	link_to($vak->getLeergebied(), sprintf('@leerlijn_leergebied?id=%s&slug=%s', $vak->getLeergebied()->getId(), $vak->getLeergebied()->getNameSlug()) ),
	  	$vak->getName()
	  )))?>

  	<div class="infobox">
		<div class="content">
	    	<?php if($vak->getImage()):?>
	    	<a href="<?php echo sprintf('/uploads/leerlijn/%s', $vak->getImage()); ?>" rel="prettyPhoto">
				<img src="/uploads/leerlijn/big/<?php echo $vak->getImage(); ?>" alt="<?php echo $vak->getName(); ?>" />
			</a>
		    <?php endif; ?>
		    <h1><?php echo $vak->getName(); ?></h1>
		  	<p class="summary"><?php echo $vak->getDescription(); ?></p>
		</div>
  	</div>
  	
  <div class="overzicht">
  	<div class="category_title">
  		<h2>Vak</h2>
  		<p class="summary">
  			Dit is de inhoud van dit vak
  		</p>
  	</div>
    <ul>
      <?php
      $i=0;
      foreach($vak->getDomein() as $domein):
      ?>
      <li class="block <?php echo $i++ % 2 == 0 ? 'left' : 'right' ?>">
        <h4 class="category_title"><?php echo $domein->getName(); ?></h4>
        <ul>
        <?php foreach($domein->getEindterm() as $eindterm): ?>
          <li class="item clickable">
          	<?php if($eindterm->getImage()): ?>
			<div class="img">
				<a href="<?php echo sprintf('/uploads/leerlijn/%s', $eindterm->getImage()); ?>" rel="prettyPhoto">
					<img src="<?php echo sprintf('/uploads/leerlijn/small/%s', $eindterm->getImage()); ?>" alt="<?php echo $eindterm->getName(); ?>" />
				</a>
			</div>
			<?php endif;?>
            <h3><?php echo link_to($eindterm->getName(), sprintf('@leerlijn_eindterm?id=%s&slug=%s', $eindterm->getId(), $eindterm->getNameSlug())); ?></h3>
            <p><?php echo $eindterm->getSummary(); ?></p>
          </li>
          <?php endforeach; ?>
        </ul>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>