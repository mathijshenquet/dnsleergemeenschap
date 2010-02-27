<?php slot('title', 'Leerlijn overzicht'); ?>
<?php 
if($sf_user->hasCredential('leerlijn_admin')){
	include_component('user', 'adminBar', array('actions' => array(
		array('id'=>'list', 'link'=>url_for('@backend.leerlijn_leergebied_leergebied')),
		array('id'=>'new', 'link'=>url_for('@backend.leerlijn_leergebied_leergebied_new'))
	))); 
}
?>

<div class="leerlijn" id="leerlijn_overview">
    <div class="infobox">
	  <div class="content">
	    <h1>Leerlijn</h1>
	    <p>Welkom bij de leerlijn.</p>
	  </div>
	</div>
	<h2 class="category_title">Overzicht</h2>
	<ul id="leergebieden">
		<?php $i=0; foreach($leergebieden as $leergebied):?>
		<li class="cat leergebied clickable <?php echo ($i=++$i%2)?'left':'right'; ?>">
			<div class="content">
				<?php if($leergebied->getImage()): ?>
				<div class="img">
					<a href="<?php echo sprintf('/uploads/leerlijn/%s', $leergebied->getImage()); ?>" rel="prettyPhoto">
						<img src="<?php echo sprintf('/uploads/leerlijn/small/%s', $leergebied->getImage()); ?>" alt="<?php echo $leergebied->getName(); ?>" />
					</a>
				</div>
				<?php endif;?>
				<h3><?php echo link_to($leergebied->getName(), sprintf('@leerlijn_leergebied?id=%s&slug=%s', $leergebied->getId(), $leergebied->getNameSlug())); ?></h3>
				<p>
					<?php echo $leergebied->getDescription(); ?>
				</p>
				<?php echo link_to(sprintf('Ga naar %s &raquo;', $leergebied->getName()), sprintf('@leerlijn_leergebied?id=%s&slug=%s', $leergebied->getId(), $leergebied->getNameSlug()), array('class'=>'clear right')); ?>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
	
	<h2 class="category_title">Leerjaar</h2>
	<ul id="leerjaren">
	  <?php $i=0; foreach($leerjaren as $leerjaar):?>
	  <li class="cat leergebied <?php echo ($i=++$i%2)?'left':'right'; ?> clickable">
	  	<div class="content">
	  		<?php if($leerjaar->getImage()): ?>
			<div class="img">
				<a href="<?php echo sprintf('/uploads/leerlijn/%s', $leerjaar->getImage()); ?>" rel="prettyPhoto">
					<img src="<?php echo sprintf('/uploads/leerlijn/small/%s', $leerjaar->getImage()); ?>" alt="<?php echo $leerjaar->getName(); ?>" />
				</a>
			</div>
			<?php endif;?>
		    <h3><?php echo link_to($leerjaar->getName(), sprintf('@leerlijn_leerjaar?id=%s&slug=%s', $leerjaar->getId(), $leerjaar->getNameSlug())); ?></h3>
	        <?php if($leerjaar->getImage()): ?>
	        <?php endif;?>
	        <p>
	          <?php // echo $leerjaar->getDescription(); ?>
	        </p>
	        <?php echo link_to(sprintf('Ga naar %s &raquo;', $leerjaar->getName()), sprintf('@leerlijn_leerjaar?id=%s&slug=%s', $leerjaar->getId(), $leerjaar->getNameSlug()), array('class'=>'clear right')); ?>
      	</div>
      </li>
	  <?php endforeach; ?>
	</ul>
</div>