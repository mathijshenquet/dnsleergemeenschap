<?php
require 'config.php';
if(isset($_POST['save']))
{
   $title   = $_POST['title'];
   $content = $_POST['page'];

   if(!get_magic_quotes_gpc())
   {
      $title   = addslashes($title);
      $content = addslashes($content);
   }

   open();

   $query = 'INSERT INTO menu (title, id_page) VALUES ("' . $title . '", "' . $content . '")';
   mysql_query($query) or die('Error ,query failed');

   close();

   echo "Artiekel '$title' is toegevoegd";
}
open();
$result = mysql_query("SELECT * FROM page");
close();
?>
<form method="post" action="add.php">
Title <input type="text" name="title" /><br />
Page <select name="page">
<option value="0">Geen</option>
<?php
while($row = mysql_fetch_array($result)){
    echo '<option value="' . $row[id] . '">' . $row[title] . '</option>';
}
?>
</select>
<input type="submit" name="save" value="Save" />
</form>