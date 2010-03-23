<?php slot('title', sprintf('Leergebied %s', $leergebied->getName())); ?>
<?php 
if($sf_user->hasCredential('leerlijn_admin')){
	include_component('user', 'adminBar', array('actions' => array(
	array('id'=>'list', 'link'=>url_for('@backend.leerlijn_leergebied_leergebied')),
	array('id'=>'edit', 'link'=>url_for('@backend.leerlijn_leergebied_leergebied_edit?id='.$leergebied->getId())),
	))); 
}?>

<div class="leerlijn" id="leergebied_overzicht">
  <?php include_partial('breadcrumb', array('items'=>array(
  	link_to('Leerlijn', '@leerlijn'),
  	$leergebied->getName()
  )))?>

  <div class="infobox">
    <div class="content">
      <?php if($leergebied->getImage()):?>
      <a href="<?php echo sprintf('/uploads/leerlijn/%s', $leergebied->getImage()); ?>" rel="prettyPhoto">
        <img src="/uploads/leerlijn/big/<?php echo $leergebied->getImage(); ?>" alt="<?php echo $leergebied->getName(); ?>" />
      </a>
      <?php endif; ?>
      <h1><?php echo $leergebied->getName(); ?></h1>
      <p><?php echo $leergebied->getDescription(); ?></p>
    </div>
  </div>
  <div class="overzicht">
  	<div class="category_title">
  		<h2>Overzicht</h2>
  		<p class="summary">
  			Kies voor een ordening op kernen of vakken.
  		</p>
  	</div>
    <ul>
      <li class="block left">
        <div class="category_title">
        	<h4>Kernen</h4>
        	<p class="summary">Kies kernen voor een ordening op kennen en kunnen.</p>
        </div>
        <ul>
        <?php foreach($leergebied->getKern() as $kern): ?>
          <li class="item clickable">
          	<?php if($kern->getImage()): ?>
			<div class="img">
				<a href="<?php echo sprintf('/uploads/leerlijn/%s', $kern->getImage()); ?>" rel="prettyPhoto">
					<img src="<?php echo sprintf('/uploads/leerlijn/small/%s', $kern->getImage()); ?>" alt="<?php echo $kern->getName(); ?>" />
				</a>
			</div>
			<?php endif;?>
            <h3><?php echo link_to($kern->getName(), sprintf('@leerlijn_kern?id=%s&slug=%s', $kern->getId(), $kern->getNameSlug())); ?></h3>
            <p><?php echo $kern->getSummary(); ?></p>
          </li>
          <?php endforeach; ?>
        </ul>
      </li>
      <li class="block right">
        <div class="category_title">
        	<h4>Vakken</h4>
        	<p class="summary">Kies vakken voor een overzicht per examenvak.</p>
        </div>
        <ul>
        <?php foreach($leergebied->getVak() as $vak): ?>
          <li class="item clickable">
          	<?php if($vak->getImage()): ?>
			<div class="img">
				<a href="<?php echo sprintf('/uploads/leerlijn/%s', $vak->getImage()); ?>" rel="prettyPhoto">
					<img src="<?php echo sprintf('/uploads/leerlijn/small/%s', $vak->getImage()); ?>" alt="<?php echo $vak->getName(); ?>" />
				</a>
			</div>
			<?php endif;?>
            <h3><?php echo link_to($vak->getName(), sprintf('@leerlijn_vak?id=%s&slug=%s', $vak->getId(), $vak->getNameSlug())); ?></h3>
            <p><?php echo $vak->getSummary(); ?></p>
          </li>
          <?php endforeach; ?>
        </ul>
      </li>
    </ul>
  </div>
  <div class="leerjaar">
    <div class="category_title">
  		<h2>Leerjaar</h2>
  		<p class="summary">
  			De leerjaren met de thema's die je krijgt aangeboden binnen dit leergebied.
  		</p>
  	</div>
  </div>
</div>
