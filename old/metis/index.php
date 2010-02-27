<?php
/******************************************************************************************************************/
// Instellingen
require 'config.php';
require $incdir . 'functions.inc.php';
require $incdir . 'user.inc.php';
/******************************************************************************************************************/
// Omgeving word opgebouwd
session_start();
//$handler = connect();
$debug=true;
$error=true;

$js = array('jquery', 'js');
/******************************************************************************************************************/

if($error){
	//set_error_handler("customError",E_ALL);
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

function print_p($a){
	echo "<pre>";
	print_r($a);
	echo "</pre>";
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

function array_do($bar,$foo){
	foreach($foo as $i => $item)	{
		if(is_array($item)){
			$r[$i]=array_do($bar,$item);	
		}else{
			$r[$i]=$bar($item);
		}
	}
	return $r;
}

$q = split('/', mysql_real_escape_string($_GET['q']));

foreach($pagetype as $type){
	if(check_pro($q[0],$type)){
		$paget = $type;
	}
}
if(!isset($paget)){
	if($q[0]==''){
		$paget = 'home';
	}
	else{
		$paget = $q[0];	
	}
}

if($debug){
	echo $paget;
}

/*******************************************************************************************************/

if($paget == 'node'){
	$node = array_do('stripslashes', query_first("SELECT * FROM `nodes` INNER JOIN `nodes`.`id`=`pcont`.`node` WHERE page=".$page['id']));
	
	if($debug){
		echo '<pre>';
		print_r($node);
		echo '</pre>';
	}
}

if($paget == 'page'){
	
	$page = array_do('stripslashes', query_first("SELECT * FROM `pages` WHERE title='".$q[1]."'"));
	$nodes = array_do('stripslashes', fetch_all_array(build_query('nodes,pcont,INNER,id,node','page='.$page['id'])));
	
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
	if(isset($q[1])){
		$user = array_do('stripslashes', query_first(build_query('users','url_name='.$q[1])));
		$nodes = array_do('stripslashes', fetch_all_array(build_query('nodes','author='.$q[1])));
	
		if($debug){
			$tmp_pass_f98w3n = $user['password'];
			$user['password'] = '*** Hidden ***';
			echo '<br/><b>Over deze gebruiker / print_r($user):</b><pre>';
			print_r($user);
			echo '</pre>';
			echo '<b>Artikelen door deze gebruiker / print_r($nodes):</b><pre>';
			print_r($nodes);
			echo '</pre>';
			$user['password'] = $tmp_pass_f98w3n;
			$tmp_pass_f98w3n = '';
		}
	} else {
		header("Location: login");
	}
}
if($paget == 'login' OR $paget == 'login.php'){
	
	$nodes = array_do('stripslashes', fetch_all_array( mysql_query("SELECT * FROM `nodes` INNER JOIN `pcont` ON `nodes`.`id`=`pcont`.`node` WHERE page='0'")));
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
	$_SESSION['loggedin'] = false;

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
            #_SESSION['loggedin'] = true;<br/>
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
	if (isset($_COOKIE[session_name()]) and "1"=="2") {
	    $_SESSION['logged_out']=true;
	    setcookie(session_name(), '', time()-42000, '/');
	    setcookie('PHPSESSID', '');
	}

	//foreach($_SESSION as $i => $j){
	//	unset($_SESSION[$i]);
	//}

	$_SESSION['loggedin'] = false; // niet meer session_destroy(), want dan gaan ALLE vars verloren
	$_SESSION['hash'] = '';        // deze wel weg, want deze legitimeren de inlogsessie
	//			          de rest hoeft niet weg, dat gebeurt wel als iemand anders inlogt

	header("Location: login");
}
if($paget == 'home'){
	$items = fetch_all_array(
		"SELECT * FROM `nodes` 
INNER JOIN `pcont` 
ON `nodes`.`id`=`pcont`.`node` 
WHERE `pcont`.`page`='2'"
	);
	
	$menu = array(
				  title => 'Portfolio',
				  items => array(
								array(
									  title => 'test',
									  link => 'pagina/test'
									  ),
								array(
									  title => 'test',
									  link => 'pagina/test'
									  ),
								array(
									  title => 'test',
									  link => 'pagina/test'
									  ),
								array(
									  title => 'test',
									  link => 'pagina/test'
									  )
								)
				  );
	
	$side_bar[] = array(title => "Featured", content => array_do('stripslashes', fetch_all_array("SELECT * FROM featured WHERE `stop`>'" . time() . "' LIMIT 0,2")));
	
	if($debug){
		echo 'style/' . $template . '/home.php';
		echo '<pre>';
		print_r($items);    
		print_r($menu);
		print_r($side_items);
		echo '</pre>';
	}
	
	include 'style/' . $template . '/home.php';
}
if($paget == 'survey' && strtoupper($q[1]) == "ELO"){
	$items = array("Test");
	
	include 'style/' . $template . '/home.php';
	exit();
}
if($paget == 'survey'){
	$items = array(
		array(title => 'ELO Enqu&ecirc;te', content => file_get_contents('survey1.html'))
	);
	
	$side_bar[] = array(title => "Info", content => array(array(title => "ELO",comment => "Een ELO of te wel Elektronische Leeromgeving is \"Een sociaal systeem waarbinnen word geleerd en waarbij gebruik word gemaakt van ICT hulmiddelen\". Het doel van een ELO is om het leeren en lesgeven makkelijker te maken." )));
	
	include 'style/' . $template . '/home.php';
}
if($paget == 'survey_check'){
	print_p($_POST);
}
?>