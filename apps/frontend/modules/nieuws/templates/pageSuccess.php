<?php 
slot('title', 'Nieuws');

use_stylesheet('content');
use_javascript('content');
use_javascript('jquery.scrollTo-min.js');
use_javascript('easing');

if($sf_user->hasCredential('news_write')){
	include_component('user', 'adminBar', array('actions' => array(
		array('id'=>'list', 'link'=>url_for('@backend.blog_posts_nieuws')),
		array('id'=>'new', 'link'=>url_for('@backend.blog_posts_nieuws_new'))
	))); 
}?>

<ul id="nieuws">
	<?php foreach($posts as $post): ?>
	<?php include_partial('list_item', array('post'=>$post)); ?>
	<?php endforeach?>
	<?php include_partial('load_next', array('page'=>$page)); ?>
</ul>