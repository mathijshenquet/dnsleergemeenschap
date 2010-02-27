<?php
include 'config.php';
open();

if(isset($_GET['del']))
{
   $query = "DELETE FROM quick WHERE id = '{$_GET['del']}'";
   mysql_query($query) or die('Error : ' . mysql_error());

   // redirect to current page so when the user refresh this page
   // after deleting an article we won't go back to this code block
   echo 'Deleted';
   header('Location: ' . $_SERVER['PHP_SELF']);
   exit;
}
?>

<html>
<head>
<title>Admin Page For Content Management System (CMS)</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">
function delArticle(id, title)
{
   if (confirm("Are you sure you want to delete '" + title + "'"))
   {
      window.location.href = 'index.php?del=' + id;
   }
}
</script>
</head>

<body>
<?php
$query = "SELECT * FROM quick LEFT JOIN nodes ON (quick.id_node=nodes.id) ORDER BY quick.id DESC";
$result = mysql_query($query) or die('Error : ' . mysql_error());
?>
<table width="600" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#999999">
<tr align="center" bgcolor="#CCCCCC">
<td width="50">
ID
</td>
<td width="150">
Quick tag
</td>
<td width="150">
Node
</td>
<td width="150"><strong>Action</strong></td>
</tr>
<?php
while($row = mysql_fetch_array($result))
{

?>
<tr bgcolor="#FFFFFF">
<td width="50">
<?php echo $row[id];?>
</td>
<td width="150">
<?php echo $row[qtitle];?>
</td>
<td width="150">
<?php echo $row[title];?>
</td>
<td width="150" align="center">
<a href="edit.php?id=<?=$row[0];?>">edit</a>
| 
<a href="javascript:delArticle('<?php echo $row[0];?>',
'<?php echo $row[qtitle];?>');">delete</a></td>
</tr>
<?php
}

close();
?>
</table>
<p align="center"><a href="add.php">Add an article</a></p>
</body>
</html>