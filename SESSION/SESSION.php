<?php
/* code dune page type : a ne pas toucher il doit etre present dans toutes les pages du site   
s il ya  une variable session 
s il n'ya pas une variable session le visiteur est renvoyee ver   page de connection conn.php
apre connection verification si USER mds existe 
*/

if(!isset($_SESSION["USER"]) || $_SESSION["USER"] == ""  || $_SESSION["OK"] == 0  )
{	
  header("Location: index.php?uc=CONNECTION") ;
}//fin if
else
{
//suite du user online   affichage des membre connect
$session=session_id();
$time=time();
$time_check=$time-300; //SET TIME 5 Minute
$USER=$_SESSION["USER"];
$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="vaccinvet"; 
$tbl_name="user_online"; 
mysql_connect("$host", "$username", "$password")or die("cannot connect to server");
mysql_select_db("$db_name")or die("cannot select DB");
$sql="SELECT * FROM $tbl_name WHERE user='$USER'";
$result=mysql_query($sql);
// $count=mysql_num_rows($result);
// if($count=="0")
// {
// $sql1="INSERT INTO $tbl_name(session,time,user)VALUES('$session','$time','$USER')";
// $result1=mysql_query($sql1);
// }
// else 
// {
// $sql2="UPDATE $tbl_name SET time='$time' WHERE user='$USER'";
// $result2=mysql_query($sql2);
// }

// if over 5 minute, delete session 
$sql4="DELETE FROM $tbl_name WHERE time<$time_check";
$result4=mysql_query($sql4);


  //echo $USER;
  //echo("<pre>") ;
  //print_r($_SESSION) ;
  //echo("</pre>") ;
  //echo("Votre identifiant de session est ".session_id()."<br/>") ;
  //echo("Bonjour ".$_SESSION["login"]." vous êtes maintenant connectez<br/>") ; 
  //echo("Pour allez à la page 2, cliquez <a href=\"page2.php\">ici</a><br/>") ;
  //echo("Pour vous déconnecter, cliquez <a href=\"deconnection.php\">ici</a><br/>") ;
}//fin else
?>