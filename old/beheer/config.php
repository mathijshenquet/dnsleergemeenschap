<?php

$host = 'localhost';
$usr = 'dns';
$db = 'dns';
$pass = '!henquet!';

function open(){
    $host = 'localhost';
    $usr = 'dns';
    $db = 'dns';
    $pass = '!henquet!';

    mysql_connect($host, $usr, $pass);
    mysql_select_db($db);
}

function close(){
    $host = 'localhost';
    $usr = 'dns';
    $db = 'dns';
    $pass = '!henquet!';

    mysql_close(mysql_connect($host, $usr, $pass));
}

?>
