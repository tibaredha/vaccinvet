<?php
require('../connec/connec.php');  
if($_POST['id'])
{
$id=$_POST['id'];
$sql=mysql_query("select * from com where idwil='$id'order by COMMUNE");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row[0].'">'.$row[1].'</option>';
}
}
?>