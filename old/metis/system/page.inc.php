<?php
function get_page($q){
	$query = "SELECT * FROM pages WHERE title='" . $q . "'";
	$result = mysql_query($query);
	$page = mysql_fetch_row($result);
	
	$query = "SELECT * FROM nodes INNER JOIN pcont ON pcont.node=nodes.id WHERE page='" . $page[0] . "'";
	$result = mysql_query($query);
	while($node = mysql_fetch_array($result)){
		$i[] = array_merge($node, mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='" . $node[author] . "'")));
	}
	$p[id] = $page[0];
	$p[title] = $page[1];
	$p[content] = $page[2];
	return array('p'=>$p,'i'=>$i);
}
?>