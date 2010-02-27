<?php
class mysql{
	function build_query($from_s, $where_s){
		$from_s = explode('&', $from_s);
		if(count($from_s) == 1){
			$from = "`$from_s[0]`";
		}
		elseif(count($from_s) == 5){
			$from = "`$from_s[0]`";
			$from .= " ";
			$from .= strtoupper($from_s[2])." JOIN";
			$from .= " ";
			$from .= "`$from_s[1]`";
			$from .= " ";
			$from .= "ON";
			$from .= " ";
			$from .= "`$from_s[0].$from_s[3]`";
			$from .= "=";
			$from .= "`$from_s[1].$from_s[4]`";
		}
		else{
			$this->error();
		}
		$where_s = explode('&', $where_s);
		if(count($where_s) == 1){
			$where_this = explode('=', $where_s[0]);
			if(count($where_this) == 2){
				$where = "`$where_this[0]`='$where_this[1]'";
			}
			else{
				$this->error('Het 1ste "WHERE" argument is ongeldig');
			}
		}
		elseif(count($where_s) > 1){
			foreach($where_s as $key => $where_c){
				$where_this = explode('=', $where_c);
				if(count($where_this) == 2){
					$where[] = "`$where_this[0]`='$where_this[1]'";
				}
				else{
					$this->error('Het '. $key+1 .'de "WHERE" argument is ongeldig');
				}
			}
			$where = implode(' AND ', $where);
		}
		else{
			$this->error('Er zijn onverloende "WHERE" argumenten');
		}
		return $query = "SELECT * FROM " . $from . " WHERE " . $where . "";
	}
	function error($a="fout"){
		echo $a;
	}
}
?>