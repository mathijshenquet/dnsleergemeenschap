<?php
/******************************************************************************************************************/
// Instellingen
require 'config.php';
require $incdir . 'functions.inc.php';
require $incdir . 'user.inc.php';
/******************************************************************************************************************/
// Omgeving word opgebouwd
session_start();
$db = new Database($db_host,$db_user,$db_pass,$db_db);
$_user = new user;
$debug=false;
$error=false;
/******************************************************************************************************************/
if($error){
	error_reporting(E_ALL);
}
// Dingen voor scriptuitvoer
$loc = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = pathinfo($_SERVER['REQUEST_URI']);
foreach($forbidden as $forbid){
	if($path['basename'] == $forbid){ //Check of de pagina niet op een verkeerde plek word opgevraagd
		header( 'Location: ./' ); //Pagina word doorverwezen naar een goede pagina
		exit(); //Script word afgesloten
	}
}

function check_pro($q,$p){
	global $$p;
	foreach($$p as $pp){
		if($q==$pp){ //Word $p opgevraagd?
			return true;
		}
	}
	return false;
}

function array_do($foo,$bar){
	foreach($bar as $i => $a){
		if(is_array($bar[$i])){
			foreach($bar[$i] as $j => $a ){
				if(is_array($bar[$i][$j])){
					foreach($bar[$i][$j] as $k => $a ){
						$bar[$i][$j][$k]=$foo($bar[$i][$j][$k]);
					}
				}
				$bar[$i][$j]=$foo($bar[$i][$j]);
			}
		}
		else{
			$bar[$i]=$foo($bar[$i]);
		}
	}
	return $bar;
}

$db->connect();
$q = split('/', mysql_real_escape_string($_GET['q'])); //De url word uit elkaar gehaald om te kijken welk bestand word opgevraagd

foreach($pagetype as $type){
	if(check_pro($q['0'],$type)){
		$paget = $type;
	}
}
if(!isset($paget)){
	if($q[0] == ''){
		$paget = 'page';
		$q[1] = 'home';
	}else{
		$paget = $q[0];
	}
}
if($debug){
	echo $paget;
}

function query_first("SELECT * FROM nodes INNER JOIN pcont ON `nodes`.id=`pcont`.node") {
	$query_id = mysql_query("SELECT * FROM nodes INNER JOIN pcont ON `nodes`.id=`pcont`.node") or die(mysql_error());
	$out = mysql_fetch_assoc($query_id);
	mysql_free_result($query_id);
	return $out;
}

/*******************************************************************************************************/

if($paget == 'node'){
	$node = array_do('stripslashes', query_first("SELECT * FROM nodes INNER JOIN pcont ON `nodes`.id=`pcont`.node"));
	
	if($debug){
		echo '<pre>';
		print_r($node);
		echo '</pre>';
	}
}

if($paget == 'page'){
	
	$page = array_do('stripslashes', query_first("SELECT * FROM pages WHERE title='.$q[1]'"));
	$nodes = array_do('stripslashes', $db->fetch_all_array($db->build_query('nodes,pcont,INNER,id,node','page='.$page['id'])));
	
	if($debug){
		echo '<pre>';
		print_r($page);
		echo '</pre>';
		echo '<pre>';
		print_r($nodes);
		echo '</pre>';
	}
}

if($paget == 'user'){
	
	$user = array_do('stripslashes', $db->query_first($db->build_query('users','url_name='.$q[1])));
	$nodes = array_do('stripslashes', $db->fetch_all_array($db->build_query('nodes','author='.$q[1])));
	
	if($debug){
		echo '<pre>';
		print_r($user);
		echo '</pre>';
		echo '<pre>';
		print_r($nodes);
		echo '</pre>';
	}
}
if($paget == 'login' OR $paget == 'login.php'){
	
	$nodes = array_do('stripslashes', $db->fetch_all_array( $db->build_query('nodes,pcont,INNER,id,node','page=2')));
	include 'style/' . $template . '/login.php';
	
	if($debug){
		echo '<pre>';
		print_r($nodes);
		echo '</pre>';
	}
}
if($paget == 'dologin'){
	include_once("config.php");

	$sql = "SELECT * FROM `users` WHERE `url_name`='".$_REQUEST['user']."' AND `password`='".md5($_REQUEST['pass'])."' LIMIT 1";
	$query = $db->query($sql) or die(mysql_error());
	$from_db = $db->fetch_array($query);

	if(mysql_num_rows($query) > 0){

	$_SESSION['id'] = $from_db['id'];
	$_SESSION['name'] = $from_db['name'];
	$_SESSION['stamgroep'] = $from_db['stamgroep'];
	$_SESSION['url_name'] = $from_db['url_name'];
	$_SESSION['full_name'] = $from_db['full_name'];
	$_SESSION['gender'] = $from_db['gender2'];    // "m" voor jongen of "f" voor meisje
	$_SESSION['type'] = $from_db['type'];
	$_SESSION['birth'] = $from_db['birth'];
	$_SESSION['syear'] = $from_db['name'];
	$_SESSION['hash'] = md5(md5($_SESSION['id'].$_SESSION['name'].$_SESSION['url_name'].$_SESSION['full_name'])."MeTiS");

	if($debug){
            $output = <<<EOOUTPUT
Gezette vars:<br/>
            #_SESSION['id'] = #from_db['id'];<br/>
            #_SESSION['name'] = #from_db['name'];<br/>
            #_SESSION['url_name'] = #from_db['url_name'];<br/>
            #_SESSION['full_name'] = #from_db['full_name'];<br/>
            #_SESSION['gender'] = #from_db['gender'];    // "m" voor jongen of "f" voor meisje<br/>
            #_SESSION['type'] = #from_db['type'];<br/>
            #_SESSION['birth'] = #from_db['birth'];<br/>
            #_SESSION['syear'] = #from_db['name'];<br/>
            #_SESSION['hash'] = md5(md5(#id.#name.#url_name.#full_name)."MeTiS");// Ter controle<br/>
EOOUTPUT;

            $output = str_replace("#", "$", $output);
            echo $output."<br/><br/>";

echo "<pre>";
            print_r($from_db);
            echo "</pre>";
            echo "<pre>";
            print_r($_SESSION);
            echo "</pre>";
	}
	if(!$debug){
		header("Location: ./");
	}

	} else {
		echo "Nee, echt niet!<br/><a href=\"login\">Klik hier om terug te gaan</a>";
	}
}
if($paget == 'dologout'){
	if (isset($_COOKIE[session_name()])) {
	    $_SESSION['logged_out']=true;
	    setcookie(session_name(), '', time()-42000, '/');
	    setcookie('PHPSESSID', '');
	}

	foreach($_SESSION as $i => $j){
		unset($_SESSION[$i]);
	}

	session_destroy();

	header("Location: login");
}
?>