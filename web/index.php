<?php
$env = 'prod';
$app = 'frontend';
if($_SERVER['HTTP_HOST'] == 'dnsleerroutes.net'){
  $app = 'frontend';
}elseif($_SERVER['HTTP_HOST'] == 'beheer.dnsleerroutes.net'){
  $app = 'backend';
}elseif($_SERVER['HTTP_HOST'] == 'help.dnsleerroutes.net'){
  $app = 'help';
}

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration($app, $env, false);

sfContext::createInstance($configuration)->dispatch();