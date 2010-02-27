<?php
require 'config.php';
if(isset($_POST['save']))
{
   $title   = $_POST['title'];
   $content = $_POST['content'];
   $page = $_POST['page'];
   $sticky = $_POST['sticky'];

   if(!get_magic_quotes_gpc())
   {
      $title   = addslashes($title);
      $content = addslashes($content);
      $page = addslashes($page);
      $sticky = addslashes($sticky);
   }

   open();

   $query = 'INSERT INTO nodes (title, content, date, id_page, sticky) VALUES ("' . $title . '", "' . $content . '", "' . time() . '", "' . $page . '", "' . $sticky . '")';
   mysql_query($query) or die('Kon tabel niet toevoegen');

   close();

   echo "Artiekel '$title' is toegevoegd";
}
open();
$query = "SELECT * FROM `page` ORDER BY `id` DESC";
$result = mysql_query($query) or die("Kon pagina's niet ophalen");
close();
?>
<form method="post" action="add.php">
Title <input type="text" name="title" /><br />
Content <textarea name="content"></textarea><br />
Sticky <input type="checkbox" value="1" name="sticky" /><br />
Menu <select name="page">
<option value="0">Geen</option>
<?php
while($row = mysql_fetch_array($result)){
echo '<option value="' . $row[id] . '">' . $row[title] . '</option>';
}
?>
</select>
<br />
<input type="submit" name="save" value="Save" />
</form>
