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
   $query  = "SELECT * ".
             "FROM nodes ".
             "WHERE id = '{$_GET['id']}'";
   $result = mysql_query($query) or die('Error : ' . mysql_error());
   $row = mysql_fetch_array($result);
foreach($row as $key => $value)
   $row[$key] = htmlspecialchars($value);
}
if(isset($_POST['save'])){
   if(!get_magic_quotes_gpc()){
      foreach($_POST as $key => $value){
         $_POST[$key] = addslashes($value);
      }
   }

   $id = $_POST['id'];
   $title = $_POST['title'];
   $content = $_POST['content'];
   $page = $_POST['page'];
   $sticky = 0;
   if(isset($_POST['sticky'])){
      $sticky = 1;
   }

   // update the article in the database
   $query = "UPDATE nodes ".
            "SET title = '$title', content = '$content', id_page = '$page', sticky = '$sticky' ".
            "WHERE id = '$id'";
   mysql_query($query) or die('Error : ' . mysql_error());

   echo "Artikel is '$title' bewerkt";

   // now we will display $title & content
   // so strip out any slashes
   $title   = stripslashes($title);
   $content = stripslashes($content);

   header('Location: edit.php?id=' . $id);
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
  <tr>
    <td width="100">Content</td>
    <td><textarea name="content" cols="50" rows="10" class="box" id="content"><?=$row[content];?></textarea></td>
  </tr>
  <tr>
    <td width="100">Page</td>
    <td><select name="page"><option value="0">Geen</option>
<?php
open();
$result = mysql_query("SELECT * FROM page");

while($row2 = mysql_fetch_array($result)){
    if($row[id_page] == $row2[id]){
        echo '<option value="' . $row2[id] . '" selected="selected">' . $row2[title] . '</option>';
    }
    else{
        echo '<option value="' . $row2[id] . '">' . $row2[title] . '</option>';
    }
} 
close();
?></select></td>
  </tr>
  <tr>
    <td width="100">Sticky</td>
    <td><input type="checkbox" name="sticky" class="box" <?php if($row[sticky] == 1){ echo 'checked="yes" 
'; }?> " /></td>
  </tr>
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
