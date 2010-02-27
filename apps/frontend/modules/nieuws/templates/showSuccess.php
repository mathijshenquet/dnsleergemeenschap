<?php slot('title', $post->getTitle()); ?>
<?php include_component('user', 'adminBar', array('actions' => array(
	array('id'=>'edit', 'link'=>url_for(sprintf('@backend.blog_posts_nieuws_edit?id=%s',$post->getId())))
))); ?>

<div id="post">
	<h1><?php echo $post->getTitle() ?></h1>
	<p>
	<?php echo $post->getBody() ?>
	</p>
</div>
