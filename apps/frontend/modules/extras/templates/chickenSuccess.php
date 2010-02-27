<?php 
$names=array();

foreach($chicken as $chick){
	$names[] = $chick;
}

echo implode('|',$names);