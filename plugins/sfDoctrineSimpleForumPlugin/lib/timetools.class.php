<?php 
 /* 
  * Source of script: http://woork.blogspot.com/2007/10/time-and-date-  difference-using-php.html
  */
class timetools
{

static function dateTimeDiff($data_ref){

$current_date	= date('Y-m-d H:i:s');

// Extract $current_date
$current_year		= substr($current_date,0,4);	
$current_month		= substr($current_date,5,2);
$current_day		= substr($current_date,8,2);

// Extract $data_ref
$ref_year		= substr($data_ref,0,4);	
$ref_month		= substr($data_ref,5,2);
$ref_day		= substr($data_ref,8,2);

// create a string like 20071021
$tempMaxDate		=	$current_year . $current_month .  $current_day;
$tempDataRef		=	$ref_year . $ref_month . $ref_day;

$tempDifference		= 	$tempMaxDate-$tempDataRef;

if($tempDifference >= 10){
	echo $data_ref;
	} else {
	// Extract $current_date H:m:ss
	$current_hour		= substr($current_date,11,2);
	$current_min		= substr($current_date,14,2);
	$current_seconds	= substr($current_date,17,2);
	// Extract $data_ref Date H:m:ss
	$ref_hour			= substr($data_ref,11,2);
	$ref_min			= substr($data_ref,14,2);
	$ref_seconds		= substr($data_ref,17,2);
	
	$dDf		=	$current_day-$ref_day;
	$hDf		=	$current_hour-$ref_hour;
	$mDf		=	$current_min-$ref_min;
	$sDf		=	$current_seconds-$ref_seconds;
			
	if($dDf<1){
		// Hours
		if($hDf>0){
			if($mDf<0){
				$mDf	=	60 + $mDf;
				$hDf	= $hDf -1;
				echo $hDf. ' hr ' . $mDf . ' min ago';
			} else {
				echo $mDf .' min ago';
			}
		} else {
			if($mDf>0){
				echo $mDf . ' min ' . $sDf . ' sec ago';
			} else {
				echo $sDf . ' sec ago';
			}
		}
	} else {
		echo $dDf . ' days ago';
	}
	}
}
}
?>