<div class="leerlijn" id="leerjaar">
	<div class="cat">
		<div class="category_title">
			<h2><?php echo $leerjaar->getName(); ?></h2>
			<p class="summary">
				Dit zijn alle thema's die bij een leerjaar horen.
			</p>
		</div>
		
		<ul>
		<?php $i=1;?>
		<?php foreach($leerjaar->getThema() as $thema):?>
			<li class="item <?php echo $i++%2 ? 'left' : 'right';?>">
				<?php if($thema->getImage()): ?>
				<div class="img">
					<a href="<?php echo sprintf('/uploads/leerlijn/%s', $thema->getImage()); ?>" title="<?php echo $thema->getName(); ?>" rel="prettyPhoto">
						<img src="<?php echo sprintf('/uploads/leerlijn/small/%s', $thema->getImage()); ?>" alt="<?php echo $thema->getName(); ?>" />
					</a>
				</div>
				<?php endif;?>
				<h4><?php echo link_to($thema->getName(), sprintf("@leerlijn_thema?id=%s&slug=%s", $thema->getId(), $thema->getNameSlug())); ?></h4>
			</li>
		<?php endforeach; ?>
		</ul>
	</div>
</div>