<?php use_javascript('walloffame'); 
use_stylesheet('content');?>

<?php slot('title', $item->getTitle().' door '.$item->getUser()->getFullname()); ?>

<?php 
if($sf_user->hasCredential('showcase_admin')):
	include_component('user', 'adminBar', array('actions' => array(
		array('id'=>'edit', 'link'=>url_for(sprintf('@backend.showcase_edit?id=%s',$item->getId())))
	))); 
endif;
?>
<div>
	<h1><?php echo $item->getTitle(); ?> door <?php echo $item->getUser()->getFullname(); ?></h1>
	<a rel="prettyPhoto" href="/uploads/showcase/<?php echo $item->getImage(); ?>"><?php echo sprintf('<img src="/uploads/showcase/125x125/%s" alt="%s" />', $item->getImage(), $item->getTitle()); ?></a>
	<div class="text">
		<?php  echo $sf_data->getRaw('item')->getContent(); ?>
	</div>
</div>