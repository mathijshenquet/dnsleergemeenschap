<?php
class user{
	function gender($gender){
		if($gender == 0){
			return 'Jongen';	
		}
		elseif($gender == 1){
			return 'Meisje';	
		}
		else{
			return false;	
		}
	}
	function gender2($gender2){
		if($gender2 == 'm'){
			return 'Jongen';
		}
		elseif($gender2 == 'f'){
			return 'Meisje';
		}
		else{
			return false;
		}
	}
	function type($type){
		if($type == 0){
			return 'Brugklas';	
		}
		elseif($type == 1){
			return 'VMBO-T/HAVO';	
		}
		elseif($type == 2){
			return 'HAVO/VWO';	
		}
		elseif($type == 3){
			return 'VMBO-T';	
		}
		elseif($type == 4){
			return 'HAVO';	
		}
		elseif($type == 5){
			return 'VWO';	
		}
		elseif($type == 6){
			return 'Leraar';	
		}
		else{
			return false;	
		}
	}
	function year($year){
		if(date("m") > 7){
			$cur = date("y")+1;	
		}else{
			$cur = date("y");
		}
		return $cur - substr($year,0,2);
	}
}
?>