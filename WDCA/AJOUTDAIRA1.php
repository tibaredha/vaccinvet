<?php
$sql = "INSERT INTO dai (DAIRAFR,DAIRAAR,IDWIL) 
                 VALUES ('".$_POST["DAIRA"]."','".$_POST["DAIRAAR"]."','".$_POST["WILAYA"]."')";
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
header("Location: ./index.php?uc=AJOUTDAIRA") ;
?>