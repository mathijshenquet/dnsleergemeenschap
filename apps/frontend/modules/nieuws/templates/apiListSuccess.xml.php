<nieuws>
	<?php foreach($posts as $post): ?>
	<item>
		<title><?php echo $post->getTitle(); ?></title>
		<url><?php echo url_for(sprintf('@nieuws_item?id=%s&slug=%s', $post->getId(), $post->getTitleSlug())); ?></url>
		<summery><?php echo $post->getSummery(); ?></summery>
		<body><?php echo $post->getBody(); ?></body>
		<created_at><?php echo $post->getCreatedAt(); ?></created_at>
		<updated_at><?php echo $post->getUpdatedAt(); ?></updated_at>
	</item>
	<?php endforeach?>
</nieuws>