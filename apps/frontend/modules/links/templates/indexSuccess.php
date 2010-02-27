<ul>
	<?php foreach($links as $link): ?>
	<li>
		<a href="<?php echo $link->getUrl(); ?>?iframe=true&width=90%&height=101%" rel="prettyPhoto" title="<?php echo $link->getTitle(); ?>">
			<img src="/uploads/links/<?php echo $link->getImage(); ?>" alt="<?php echo $link->getTitle(); ?>" />
		</a>
	</li>
	<?php endforeach; ?>
</ul>