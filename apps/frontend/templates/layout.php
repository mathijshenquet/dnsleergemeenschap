<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
	<title><?php include_slot('title'); ?> - DNS Leergemeenschap</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="De leerlingenwebsite van De Nieuwste School; Tilburg" />
	<meta name="copyright" content="Copyright 2009 De Nieuwste School. Alle Rechten Voorbehouden." />
	<meta name="author" content="Mathijs Henquet, Cas Cornelissen en Robin Kanters" />
	<meta http-equiv="X-UA-Compatible" content="IE=8" />
	<meta name="language" content="nl" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
</head>
<body id="top">
	<!-- Bye Bye little spambot -->
	<p style="display: none"><a href="http://english-143330081236.spampoison.com">Dude check out this page</a></p>
	<?php 
	include_component('user', 'userBar');
	
	if($sf_request->getCookie('mycookie', 'true') == 'true'){
		
		include_partial('extras/cowboy');
		include_partial('extras/deadpixel');
		include_partial('extras/chicken');
		
		if(strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE') === false){
			include_partial('extras/gravity');
		}
	}
	?>
	<div id="header">
		<div id="logo">
			<a href="<?php echo url_for('@homepage'); ?>">
				<span class="before text">DNS</span>
				
	            <?php echo image_tag('head.png', array('alt'=>'DNS')); ?>
	            
	            <span class="after text">
	            <?php 
	            if(has_slot('logo')):
				  echo get_slot('logo');
	            else:
	              echo 'Leergemeenschap';
	            endif;
	            ?>
	            </span>
            </a>
		</div>
		<?php include_component('showcase', 'slideshow'); ?>
		<div class="clear"></div>
	</div>
	<div id="navigation">
		<ul>
			<?php /* ?><li><div><?php echo link_to('Home', '@homepage')?></div></li><?php */ ?>
			<li class="first"><div><?php echo link_to('Nieuws', '@nieuws')?></div></li> 
			<li><div><?php echo link_to('Leerlijn', '@leerlijn')?></div></li>
			<li><div><?php echo link_to('Wall of Fame', '@showcase')?></div></li>
			<li><div><?php echo link_to('Expertisebank', '@expertbank')?></div></li>
			<li><div><?php echo link_to('Forum', '@sf_doctrine_simple_forum_index')?></div></li>
			<?php /* ?><li><div><?php echo link_to('Links', '@links')?></div></li><?php */ ?>
		</ul>
		<?php include_slot('admin_bar'); ?>
	</div>
	<div id="content" class="frontend">
		<?php if ($sf_user->hasFlash('notice')): ?>
		  <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
		<?php endif; ?>

		<?php if ($sf_user->hasFlash('error')): ?>
		  <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
		<?php endif; ?>
		<?php echo $sf_content; ?>
	</div>
	<div id="footer">
		<hr/>
		<div class="copyright">
			<p class="credits"><a href="http://www.youtube.com/watch?v=oOMmsyN3nM8">Mathijs Henquet</a> - <a href="http://rawox.deviantart.com">Cas Cornelissen</a> - <a href="http://www.chalk-webdesign.nl">Robin Kanters</a></p>
			<?php if(has_slot('copyright')): ?>
			<p class="small"><?php echo get_slot('copyright'); ?></p>
			<?php else: ?>
			<p class="small">Alle rechten voorbehouden tenzij anders vermeld <span class="gravity">&copy;</span> <a href="http://www.denieuwsteschool.nl/">De Nieuwste School</a></p>
			<?php endif; ?>		
		</div>
	</div>
	<div id="canvas"></div>
	<?php include_partial('extras/cufon'); ?>
</body>
</html>