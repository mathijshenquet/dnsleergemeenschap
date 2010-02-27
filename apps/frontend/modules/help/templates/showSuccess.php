<?php 
use_stylesheet('content');
use_javascript('content');
use_javascript('jquery.scrollTo-min.js');
use_javascript('easing');
?>

<h1><?php echo $article->getTitle(); ?></h1>

<div class="text">
<?php echo $article->getRaw('content'); ?>
</div>