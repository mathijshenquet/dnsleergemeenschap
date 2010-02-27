<?php
// START WITH INCLUDING LOCAL SETTINGS //
require 'config.php';
open();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>General Admin Page</title>
</head>
<body>
<?php
// GETTING AND RETURING ALL THE PAGES AND CONTENTS //
$page_result = mysql_query("SELECT * FROM page");

// RETURNING //
?>
<table border="1">
  <tr class="disc">
    <td>
	  Title
	</td>
	<td>
	  Date
	</td>
	<td width="300">
	  Content
	</td>
	<td>
	  Sticky
	</td>
  </tr>
<?php
while($page = mysql_fetch_array($page_result)){
  ?>
  <tr class="page">
    <td><?=$page[title];?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <?php
  $node_result = mysql_query("SELECT * FROM nodes WHERE id_page='" . $page[id] . "'");
  while($node = mysql_fetch_array($node_result)){
  ?>
  <tr class="node">
    <td>&bull;&nbsp;<?=$node[title];?></td>
	<td><?=$node[date];?></td>
	<td><?=substr(nl2br($node[content]), 0, 200);?></td>
	<td><?=$node[sticky];?></td>
  </tr>
  <?php
  }
}
?>
</table>
<div id="footer"> - All rights reserved 2008 Mathijs Henquet &copy; - </div>
</body>
</html>
<?php
close();
?>