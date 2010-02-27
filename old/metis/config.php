<?php
$forbidden = array('index.php','index.html'); // Hoe de homepage niet mag worden opgevraagd
$user = array('user','gebruiker','portfolio'); // Wanneer word er een user opgevraagd www.voorbeeld.nl/?/Gebuikersnaam
$node = array('artikel','node','nodes','artiekel'); // Wanneer word er een artiekel opgevraagd www.voorbeeld.nl/?/Artiekelnaam
$page = array('pagina','page','pages','paginas'); // Wanneer word er een pagina opgevraagd www.voorbeeld.nl/?/Pagina
$group = array('groep','group'); // Wanneer word er een groep opgevraagd www.voorbeeld.nl/?/2B
$login = array('login', 'inloggen');

$pagetype = array('user', 'node', 'page', 'group', 'login'); // Alle soorten pagina's
$preftype = array('portfolio', 'artikel', 'pagina', 'groep', 'login'); // Alle soorten pagina's

$incdir = 'system' . '/';
$base_url = '/metis/';
$template = 'beta';

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_db = 'dns';

$rating_units = 0;//Hoeveelheid sterren bij stemmen
?>