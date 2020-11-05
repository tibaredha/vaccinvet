<?php
//la connection a la base de donnes 
  $db_host="localhost";
  $db_name="grh"; 
  $db_user="root";
  $db_pass="";
  //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
  $db  = mysql_select_db($db_name,$cnx) ;
  mysql_query("SET NAMES 'UTF8' ");
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