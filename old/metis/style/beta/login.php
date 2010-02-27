<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="style/<?php echo $config['template']; ?>/css/login.css" charset="UTF-8" />
<link type="text/css" rel="stylesheet" href="style/<?php echo $config['template']; ?>/css/default.css" charset="UTF-8" />
<title>Metis - Login</title>
</head>

<body>
	<div id="wrapper">
    	<div id="header">
        	<img src="style/<?php echo $config['template']; ?>/images/logo.gif" alt="Metis" />
            <p>Using the power of knowledge</p>
        </div>
        <div id="content_box">
        	<div id="top">
            </div>
            <div class="content" id="content">
            	<div class="box" id="left">
                	<h4><?php echo $nodes[0]['title']; ?></h4>
                    <p><?php echo $nodes[0]['content']; ?></p>
                </div>
                <div class="box">
                	<h4><?php echo $nodes[1]['title']; ?></h4>
                	<p><?php echo $nodes[1]['content']; ?></p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="dark content">
                <div class="box" id="left">
                	<p>Inloggen:</p>
                    <input class="text" type="text" />
                    <p>Wachtwoord:</p>
                    <input class="text" type="password" />
                    <p>Iets vergeten? <input class="submit" type="submit" /></p>
                </div>
                <div class="box">
                	<p>Inloggen:</p>
                    <input type="text" class="text" />
                    <p>Wachtwoord:</p>
                    <input type="password" class="text" />
                    <input class="submit_w" type="submit" />
                </div>
                <div class="clear"></div>
            </div>
            <div id="help" class="content center">
                <p>Problemen? Vraag de beheerder om hulp</p>
            </div>
            <div id="bot"></div>
        </div>
        <div id="foot">
        </div>
    </div>
</body>
</html>