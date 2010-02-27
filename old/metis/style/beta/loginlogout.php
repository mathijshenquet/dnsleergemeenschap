<?php

//$db_host
//$db_user
//$db_pass
//$db_db

//$query = "SELECT misc.value FROM misc WHERE name='password' LIMIT 1";
//$result_id = mysql_query($query, $handler)
//	or die(mysql_error());
//$row_array = mysql_fetch_row($result_id);



include_once("config.php");

session_start();

$g = $_GET;
$p = $_POST;
$r = $_REQUEST;
$c = $_COOKIE;
$s = $_SESSION;

if($r['a'] == "login"){

//$handler = $db->connectmysql_connect($db_host,$db_user,$db_pass) or die(mysql_error());
//$db_gekozen = mysql_select_db($db_db,$handler) or die(mysql_error());

$sql = "SELECT * FROM `users` WHERE `url_name`='".$r['user']."' AND `password`='".md5($r['pass'])."' LIMIT 1";
//$query = mysql_query($sql, $handler) or die(mysql_error());
$from_db = $db->fetch_array($sql);

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
            print_r($_SESSION);
            echo "</pre>";
}

header("Location: ./");

} else {
echo "Nee, echt niet!<br/><a href=\"login\">Klik hier om terug te gaan</a>";
}

} else if($r['a'] == "loguit"){

unset($_SESSION);

//$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
    $_SESSION['logged_out'];
    setcookie(session_name(), '', time()-42000, '/');
    setcookie('PHPSESSID', '');
}

session_destroy();

header("Location: login");

} else {
header("Location: login");
}

?>
