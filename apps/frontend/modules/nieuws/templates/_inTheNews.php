<div class="in_the_news">
	<?php foreach($inTheNews->channel->item as $item):?>
		<p><?php echo htmlspecialchars_decode($item->description) ?></p>
	<?php endforeach; ?>
</div>