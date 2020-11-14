<?php
require('../connec/connec.php');  
if($_POST['id'])
{
$id=$_POST['id'];
$sql=mysql_query("select * from products where categorie='$id' order by name");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row[2].'">'.$row[2].'</option>';
}
}
?>