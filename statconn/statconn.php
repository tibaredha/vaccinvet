<?php 
//statconnection permet de savoire les differents statistique concernat la visite du site 
//recuperation de la date du jours
$date_courante = date( "y-m-d h:i:s");
//recuperation de la page visite 
if ($_SERVER['QUERY_STRING'] == "")
{
$page_courante= $_SERVER['PHP_SELF'];
}
else
{
$page_courante= $_SERVER['PHP_SELF'];
}
//RECUPERE L ADRESSE IP  DU VISITEUR
if ( ISSET ($_SERVER['HTTP_x_forwarded_for']))
{
$ip=$_SERVER['HTTP_x_forwarded_for'];
}
elseif ( ISSET ($_SERVER['HTTP_client_ip']))
{
$ip=$_SERVER['HTTP_client_ip'];
}
else 
{
$ip=$_SERVER['REMOTE_ADDR'];
}
//ADRESSE IP PAR DEFAULT $ip=1921680101;

//connection base de donnes

$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
//sélection de la base de données
$db  = mysql_select_db($db_name) ;
//création de la requête SQL
$sql = "INSERT INTO tconn ( dateconn ,ip,pageconn) VALUES ('".$date_courante."', '".$ip."','".$page_courante."')";
//exécution de la requête SQL
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
//si la requête s'est bien passé, on affiche un message de succès
//mysql_close(); 
 ?>