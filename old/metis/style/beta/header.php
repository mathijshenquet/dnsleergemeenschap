<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
if(is_array($css)){
	foreach($css as $sheet){
		echo '<link type="text/css" rel="stylesheet" href="' . $base_url . $sheet . '" charset="UTF-8" />';
	}
}
?>
<link type="text/css" rel="stylesheet" href="<?php echo $base_url; ?>style/<?php echo $template; ?>/css/layout.css" charset="UTF-8" />
<link type="text/css" rel="stylesheet" href="<?php echo $base_url; ?>style/<?php echo $template; ?>/css/default.css" charset="UTF-8" />
<?php 
if(is_array($js)){
	foreach($js as $script){
		echo '<script src="' . $base_url . 'lib/js/' . $script . '.js" type="text/javascript"></script>';
	}
}
?>
<title>Metis - Home</title>
</head>

<body>
	<div id="wrapper">
    	<div id="header">
        	<div id="logo">
                <img src="<?php echo $base_url; ?>style/<?php echo $template; ?>/images/logo.gif" alt="Metis" />
                <p>Using the power of knowledge</p>
            </div>
            <div id="actions">
                <div>
                	<div class="a">
                        <a class="bold" href="#">Gebruiker</a>
                        <ul>
                        	<li>&nbsp;</li>
                            <li><a href="#">Software</a></li>
                            <li><a href="#">Hardware</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="menu_box">
            	<div id="menu">
                    <ul>
                        <li><a href="#" id="nieuws">Nieuws</a></li>
                        <li><a href="#" id="proj">Projecten</a></li>
                        <li><a href="#" id="port">Portfolio</a></li>
                        <li><a href="#" id="comp">Competenties</a></li>
                        <li><a href="#" id="info">InfoCentrum</a></li>
                        <li><a href="#" id="mail">Mail</a></li>
                    </ul>
            	</div>
            </div>
        </div>