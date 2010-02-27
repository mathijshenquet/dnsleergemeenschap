<?php use_javascript('walloffame'); ?>

<div id="walloffame">
	<h1><?php echo $item->getTitle(); ?> door <?php echo $item->getUser()->getFullname(); ?></h1>
	<?php echo link_to(sprintf('<img src="/uploads/showcase/%s" alt="%s" />', $item->getImage(), $item->getTitle()), sprintf('@showcase_item?id=%s&slug=%s', $item->getId(), $item->getTitleSlug()), array("class"=>"image")); ?>
</div>