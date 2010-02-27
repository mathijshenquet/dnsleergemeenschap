<div class="cat kernbegrippen">
	<div class="category_title">
		<h2>Kernbegrippen</h2>
		<p class="summary">
			Dit zijn de kernbegrippen
		</p>
	</div>
	
	<ul>
	<?php $i=1;?>
	<?php foreach($kernbegrippen as $kernbegrip):?>
		<li class="item <?php echo $i++%2 ? 'left' : 'right';?>">
			<?php if($kernbegrip->getImage()): ?>
			<div class="img">
				<a href="<?php echo sprintf('/uploads/leerlijn/%s', $kernbegrip->getImage()); ?>" title="<?php echo $kernbegrip->getName(); ?>" rel="prettyPhoto">
					<img src="<?php echo sprintf('/uploads/leerlijn/small/%s', $kernbegrip->getImage()); ?>" alt="<?php echo $kernbegrip->getName(); ?>" />
				</a>
			</div>
			<?php endif;?>
			<h4><?php echo link_to($kernbegrip->getName(), sprintf("@leerlijn_kernbegrip?id=%s&slug=%s", $kernbegrip->getId(), $kernbegrip->getNameSlug())); ?></h4>
		</li>
	<?php endforeach; ?>
	</ul>
</div>