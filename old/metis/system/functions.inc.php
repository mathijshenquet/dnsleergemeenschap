<?php
require "db.inc.php";

function replace_dynamic_vars($input){
$input = str_replace("%id%",$_SESSION['id'],$input);
$input = str_replace("%name%",$_SESSION['name'],$input);
$input = str_replace("%stamgroep%",$_SESSION['stamgroep'],$input);
$input = str_replace("%url_name%",$_SESSION['url_name'],$input);
$input = str_replace("%full_name%",$_SESSION['full_name'],$input);
$input = str_replace("%gender%",$_SESSION['gender'],$input);
$input = str_replace("%type%",$_SESSION['type'],$input);
$input = str_replace("%birth%",$_SESSION['birth'],$input);
$input = str_replace("%syear%",$_SESSION['syear'],$input);

return $input;

}
/*
function customError($errno, $errstr, $errfile, $errline){
$errfile = str_replace("/home/robin/domains/robinkanters.nl/public_html/metis", "", $errfile);
echo "<b>Error in $errfile on line $errline:</b> [$errno] $errstr<br/>";
}
set_error_handler("customError",E_ALL);
*/

?>