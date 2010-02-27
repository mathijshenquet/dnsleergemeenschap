<ul class="newswidget">
	<?php foreach($posts as $post): ?>
	<li>
		<?php echo link_to($post->getTitle(), sprintf('@nieuws_item?id=%s&slug=%s', $post->getId(), $post->getTitleSlug())); ?>
	</li>
	<?php endforeach; ?>
</ul>