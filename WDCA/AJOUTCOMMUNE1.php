<?php
$sql = "INSERT INTO comm (IDWIL,IDDAI,COMMUNEFR,COMMUNEAR) 
                 VALUES ('".$_POST["WILAYA"]."','".$_POST["DAIRA"]."','".$_POST["COMMUNEFR"]."','".$_POST["COMMUNEAR"]."')";
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
header("Location: ./index.php?uc=AJOUTCOMMUNE") ;
?>