<?php
//******************************************************************************************************//
$N=$_POST["N"];
$date=$_POST["DATE"];
$dateeuro=date('Y/m/d');
//********************************************************************************************//
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query_liste = "SELECT * FROM produit  ";
$resultat=mysql_query($query_liste);
//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
   $query_liste1 = 'SELECT idprod,produit,qte,qts,prix FROM produit where idprod ='.$row->idprod  ;
   $requete1 = mysql_query( $query_liste1, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
   $result1 = mysql_fetch_array( $requete1 ) ;
    mysql_free_result($requete1);
   $QP=$_POST["$row->produit"];      
   $STOCKP=$result1["qte"]; 
   $MAJP=$STOCKP-$QP;    
   $sql = 'UPDATE produit SET qte ='.$MAJP.' where idprod ='.$row->idprod  ;
   $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
   if ($QP!=0)
   {
   $eqte=0;
   //insertion dans table 
   $sqli = "INSERT INTO stock (date,eqte,sqte,restock,idproduit) VALUES ('".$dateeuro."','".$eqte."','".$QP."','".$MAJP."','".$row->idprod."')";
   $requete = @mysql_query($sqli, $cnx) or die($sql."<br>".mysql_error());
   } 
  }

 header("Location: ../index.php?uc=SORCOM") ;
?>


