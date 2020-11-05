<?php
require('../connec/connec.php');
if($_POST['id'])
{
$id=$_POST['id'];
$sql=mysql_query("select * from comm where IDDAI='$id'");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row[0].'">'.$row[3].'</option>';
}
}
?>