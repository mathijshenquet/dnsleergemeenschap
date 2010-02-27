<?php use_helper('Date')?>
<li class="item" id="item-<?php echo $post->getId(); ?>">
	<p class="date"><?php echo ucwords(format_date($post->getCreatedAt(), 'P')); ?></p>
	<h2><?php echo link_to($post->getTitle(), sprintf('@nieuws_item?id=%s&slug=%s', $post->getId(), $post->getTitleSlug())); ?></h2>
	<div class="content text">
		<?php echo $post->getRaw('content'); ?>
	</div>
</li>

<?php // echo ucwords(strftime("%A %d %B %Y", strtotime($post->getCreatedAt()))); ?>