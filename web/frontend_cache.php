<?php
$env = 'cache';
$app = 'frontend';

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration($app, $env, true);
sfContext::createInstance($configuration)->dispatch();