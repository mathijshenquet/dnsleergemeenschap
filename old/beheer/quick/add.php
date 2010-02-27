<?php
require 'config.php';
if(isset($_POST['save']))
{
   $title   = $_POST['title'];
   $content = $_POST['content'];

   if(!get_magic_quotes_gpc())
   {
      $title   = addslashes($title);
      $content = addslashes($content);
   }

   open();

   echo $title;
   echo $content;

   $query = 'INSERT INTO quick (qtitle, id_node) VALUES ("' . $title . '", "' . $content . '")';
   mysql_query($query) or die('Error ,query failed');

   close();

   echo "Artiekel '$title' is toegevoegd";
}
open();
$result = mysql_query("SELECT * FROM nodes");
close();
?>
<form method="post" action="add.php">
Title <input type="text" name="title" /><br />
Node <select name="content">
<?php
while($row = mysql_fetch_array($result)){
    echo '<option value="' . $row[id] . '">' . $row[title] . '</option>';
}
?>
</select>
<input name="save" type="submit" value="make" />
</form>