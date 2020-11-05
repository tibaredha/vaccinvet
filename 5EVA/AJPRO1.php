<?php 	
     $produit      = $_POST["produit"] ;
	 $qts          = $_POST["qts"] ;
	 $prix         = $_POST["prix"] ;
     mysql_query("SET NAMES 'UTF8' ");
     $sql = "INSERT INTO produit (produit,qts,prix) 
                  VALUES ('".$produit."','".$qts."','".$prix."')";
     $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  if($requete)
{
    //echo("La modification a ete correctement effectuee") ;
	header("Location:index.php?uc=AJPRO") ;
}
else
{
    //echo("La modification à echouee") ;
	header("Location:index.php?uc=AJPRO") ;
}
 
?>  
