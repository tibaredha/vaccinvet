<?php
$IDDNR=$_GET["iddnr"]; 
$nomdnr=$_GET["nomdnr"]; 
$prenomdnr=$_GET["prenomdnr"]; 
$sexe=$_GET["sexe"]; 
$GROUPAGE=$_GET["GROUPAGE"]; 
$RHESUS=$_GET["RHESUS"]; 
$Dns=$_GET["DATENAISSANCE"];
$dateeuro=date('d/m/Y');
$x=substr($dateeuro,6,4);
$Y=substr($_GET["DATENAISSANCE"],6,4);
$AGE=$x-$Y;
//******************************************************************************************************//  
require('../PDF/DNR.php');
$pdf = new DNR ( 'P', 'mm', 'A4' );
$pdf->entete1();
$pdf->Text(5,45,$IDDNR);
$pdf->Text(5,60,"Date:".$dateeuro);
$pdf->Text(182,40,$GROUPAGE);
$pdf->Text(182,45,$RHESUS);
$pdf->Text(15,80,$nomdnr);
$pdf->Text(100,80,$prenomdnr);
$pdf->Text(175,80,$sexe);
$pdf->Text(20,90,$Dns);
$pdf->Text(175,90,$AGE."ans");

//******************************************************************************************************//
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  //la connection a la base de donnes 
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  //sélection de la base de données
  $db  = mysql_select_db($db_name,$cnx) ;
//******************************************************************************************************//
 $IDRECmg ;
  //requette de recherche si un idrec existe 
  $sql = "SELECT IDDNR FROM TDON WHERE  IDDNR = '".$IDDNR."' "	;
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
  $result = mysql_fetch_object($requete) ;
  if(is_object($result))
  {
   $IDDNRmg =" NB:Le donneur figure dans notre base de donnees *****" ;
  }  
  else
  {
   $IDDNRmg ="NB:Le donneur ne figure pas dans notre base de donnees " ; 
  }

 // $pdf->Text(5,160,$IDDNRmg); 
//**********************************************liste des dons ********************************************************//  
$pdf->SetTextColor(0,0,0);
$h=150;
$pdf->SetXY(05,$h); 	  
$pdf->cell(20,05,"date",1,0,'C',0);
$pdf->SetXY(25,$h); 	  
$pdf->cell(20,05,"lieu",1,0,'C',0);
$pdf->SetXY(45,$h); 	  
$pdf->cell(20,05,"id don",1,0,'C',0);
$pdf->SetXY(65,$h); 	  
$pdf->cell(20,05,"id poche",1,0,'C',0);
$pdf->SetXY(85,$h); 	  
$pdf->cell(20,05,"ta",1,0,'C',0);
$pdf->SetXY(105,$h); 	  
$pdf->cell(20,05,"poids",1,0,'C',0);
$pdf->SetXY(125,$h); 	  
$pdf->cell(20,05,"vap",1,0,'C',0);
$pdf->SetXY(145,$h); 	  
$pdf->cell(50,05,"incidents",1,0,'C',0);
$pdf->SetXY(5,155); // marge sup 13
//********************************************************************************************//
$query = "select datedon,str,idon,idp,ta,poids,vap,incidents from tdon WHERE  IDDNR = '$IDDNR'";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);

//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
   $pdf->cell(20,5,$row->datedon,1,0,'R',0);//5  =hauteur de la cellule origine =7
   $pdf->cell(20,5,$row->str,1,0,'C',0);
   $pdf->cell(20,5,$row->idon,1,0,'C',0);
   $pdf->cell(20,5,$row->idon,1,0,'C',0);
   $pdf->cell(20,5,$row->ta,1,0,'C',0);
   $pdf->cell(20,5,$row->poids,1,0,'C',0);
   $pdf->cell(20,5,$row->vap,1,0,'C',0);
   $pdf->cell(50,5,$row->incidents,1,0,'C',0);
   $pdf->SetXY(05,$pdf->GetY()+5); 
  }
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(40,5," TOTAL DON",1,0,'C',0);	  
$pdf->SetXY(45,$pdf->GetY());
$pdf->cell(150,5,$totalmbr1,1,0,'C',0);	
$pdf->SetXY(150,$pdf->GetY()+15);				 
$pdf->cell(40,5,"Signature  médecin:",1,0,'C',0);
$pdf->SetXY(150,$pdf->GetY()+10);				 
$pdf->cell(40,5,"DR tiba",1,0,'C',0);
$pdf->Output();


?>


