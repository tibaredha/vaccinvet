<?php 
include('./SESSION/SESSION.php');
if ($_POST["WILAYAR"] !=1 and $_POST["DAIRA"] !='' and $_POST["COMMUNER"] !='' and $_POST["nomelev"] !='' and $_POST["prenomelev"] !='') 
{
$per ->insereleveur1 ("NOUVEAU ELEVEUR / Dr:"); 
}
else
{
header("Location: ./index.php?uc=NELEV") ;
}
?>