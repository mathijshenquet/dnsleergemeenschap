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

   $query = 'INSERT INTO page (title, id_menu) VALUES ("' . $title . '", "' . $content . '")';
   mysql_query($query) or die('Error ,query failed');

   close();

   echo "Artiekel '$title' is toegevoegd";
}
open();
$result = mysql_query("SELECT * FROM menu");
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
<input type="submit" name="save" value="Save" />
</form>