<?php

function connect() {
	global $db_host, $db_user, $db_pass, $db_db;
	
	$new_link_id=mysql_connect($db_host,$db_user,$db_pass);

	if (!$new_link_id) {//open failed
		die("Could not connect to server");
	}

	if(!@mysql_select_db($db_db, $new_link_id)) {//no database
		die("Could not open database");
	}

	// unset the data so it can't be dumped
	
	return $new_link_id;
}


function close($link_id) {
	if(!mysql_close($link_id)){
		die("Connection close failed.");
	}
}


function escape($string) {
	if(get_magic_quotes_gpc()) $string = stripslashes($string);
	return mysql_real_escape_string($string);
}


function query($sql) {
	$query_id = @mysql_query($sql, $link_id);

	if (!$query_id) {
		die(mysql_error());
	}
	
	$affected_rows = @mysql_affected_rows();

	return $query_id;
}


function fetch_array($query_id=-1) {
	if (isset($query_id)) {
		$record = @mysql_fetch_assoc($query_id);
	}else{
		die(mysql_error());
	}

	// unescape records
	if($record){
		$record=array_map("stripslashes", $record);
	}
	return $record;
}

function fetch_all_array($sql) {
	$out = array();

	while ($row = fetch_array($sql)){
		$out[] = $row;
	}

	return $out;
}

function build_query($from_s, $where_s){
	$from_s = explode(',', $from_s);
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
		$from .= "`$from_s[0]`.$from_s[3]";
		$from .= "=";
		$from .= "`$from_s[1]`.$from_s[4]";
	}
	else{
		$this->error();
	}
	$where_s = explode(',', $where_s);
	if(count($where_s) == 1){
		$where_this = explode('=', $where_s[0]);
		if(count($where_this) == 2){
			$where = "`$where_this[0]`='$where_this[1]'";
		}
		else{
			$this->oops('Het 1ste "WHERE" argument is ongeldig');
		}
	}
	elseif(count($where_s) > 1){
		foreach($where_s as $key => $where_c){
			$where_this = explode('=', $where_c);
			if(count($where_this) == 2){
				$where[] = "`$where_this[0]`='$where_this[1]'";
			}
			else{
				$this->oops('Het '. $key+1 .'de "WHERE" argument is ongeldig');
			}
		}
		$where = implode(' AND ', $where);
	}
	else{
		$this->oops('Er zijn onverloende "WHERE" argumenten');
	}
	return $query = "SELECT * FROM " . $from . " WHERE " . $where . "";
}


?>