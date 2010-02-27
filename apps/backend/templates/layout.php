<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
<title><?php include_slot('title'); ?> - Leerlingensite De Nieuwste School</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="copyright" content="Copyright 2009 De Nieuwste School. Alle Rechten Voorbehouden." />
<meta name="author" content="Mathijs Henquet, Cas Cornelissen en Robin Kanters" />
<meta name="language" content="nl" />
<?php //include_stylesheets(); ?>
<link rel="shortcut icon" href="/favicon_backend.ico" type="image/x-icon" />
<?php //include_javascripts(); ?>
</head>
<body id="top" class="backend">
<!-- Bye Bye little spambot -->
<p style="display: none"><a href="http://english-143330081236.spampoison.com">Dude check out this page</a></p>
<?php include_component('user', 'userBar');?>
<div id="header">
	<div id="logo">
		<?php echo link_to('<img src="/images/backend_logo.png" title="De Nieuwste School - Verder in verwondering" alt="De Nieuwste School" />', '@homepage'); ?>
	</div>
</div>
<div id="navigation">
	<ul>
		<li class="first">
			<div><?php echo link_to('Home', '@homepage')?></div>
		</li>
		<li>
			<div><?php echo link_to('Leerlijn', '@leerlijn')?></div>
		</li>
		<li>
			<div><?php echo link_to('Showcase', '@showcase')?></div>
		</li>
		<li>
			<div><?php echo link_to('Expertbank', '@expert')?></div>
		</li>
		<li><div><?php echo link_to('Gebruikers', '@sf_guard_user')?></div></li>
	</ul>
</div>
<?php //include_component('navigations', 'breadcrumb');?>
<div id="content">
	<?php echo $sf_content; ?>
</div>
<div id="footer">
	<hr/>
	<div>
		<p class="credits"><a href="http://www.youtube.com/watch?v=oOMmsyN3nM8">Mathijs Henquet</a> - <a href="http://rawox.deviantart.com">Cas Cornelissen</a> - <a href="http://www.chalk-webdesign.nl">Robin Kanters</a></p>
		<p class="small">Alle rechten voorbehouden <span class="gravity">&copy;</span> <a href="http://www.denieuwsteschool.nl/">De Nieuwste School</a></p>
	</div>
</div>
</body>
</html>