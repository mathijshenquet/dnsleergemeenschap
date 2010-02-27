<html>
<head>
<title>Edit An Article</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.box {
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
border: 1px solid #000000;
}
-->
</style>
</head>

<body>
<?php
include 'config.php';
open();

if(isset($_GET['id']))
{
   $query  = "SELECT * FROM menu WHERE id = '{$_GET['id']}'";
   $result = mysql_query($query) or die('Error : ' . mysql_error());
   $row = mysql_fetch_array($result);
}
if(isset($_POST['save']))
{
   $id = $_POST['id'];
   $title = $_POST['title'];
   $content = $_POST['page'];

   if(!get_magic_quotes_gpc())
   {
      $title = addslashes($title);
      $content = addslashes($content);
   }

   // update the article in the database
   $query = "UPDATE menu SET title='$title', id_page='$content' WHERE id='$id'";
   mysql_query($query) or die('Error : ' . mysql_error());

   echo "Artikel is '$title' bewerkt";

   // now we will display $title & content
   // so strip out any slashes
   $title   = stripslashes($title);
   $content = stripslashes($content);
}

close();
?>
<form method="post">
<input type="hidden" name="id" value="<?=$row[id];?>">
<table width="700" border="0" cellpadding="2" cellspacing="1" class="box">
<tr>
<td width="100">Title</td>
<td><input name="title" type="text" class="box" id="title" value="<?=$row[title];?>"></td>
</tr>
<td width="100">Node</td>
<td><select name="page">
<option value="0">Geen</option>
<?php
open();
$nodes = mysql_query("SELECT * FROM page");
close();
while($node = mysql_fetch_array($nodes)){
?>
<option value="<?=$node[id];?>"<?php if($row[id_page] == $node[id]) echo ' selected="yes"';?>><?=$node[title];?></option>
<?php
}?>
</select></td>
</tr>
<tr>
<tr>
<td width="100">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2" align="center"><input name="save" type="submit" class="box" id="update" value="Update Article"></td>
</tr>
</table>
<p align="center"><a href="index.php">Back to admin page</a></p>
</form>
</body>
</html>
