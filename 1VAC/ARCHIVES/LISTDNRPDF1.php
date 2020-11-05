<?php
require_once('../tcpdf/config/lang/eng.php');
require_once('../tcpdf/tcpdf.php');
$colone=$_POST['colone'];
$word=$_POST['search'];
$colone1=$_POST['colone1'];
$word1=$_POST['search1'];



//**********************************************************************************************
$date=date("d-m-y");
$pdf=new TCPDF('l','cm','A4');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
// $pdf->setRTL(true);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
// $pdf->SetFillColor(255,255,255);
// $pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('aefurat', '', 12);
$pdf->AddPage();
$pdf->Text(8,1,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(6,2.0,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE");
$pdf->Text(6.5,3.0,"DIRECTION DE LA SANTE ET DE LA POPULAION DE LA WILAYA DE DJELFA");
$pdf->Text(0.5,4.0,"ETABLISSEMENT PUBLIC HOSPITALIER AIN OUSSERA ");
$pdf->Text(0.5,5.0,"POSTE DE TRANSFUSION SANGUINE ");
$pdf->Text(0.5,6.0," N°:......./".date("Y"));
$pdf->SetXY(11,7.0);
$pdf->Cell(10.5,1.5,'LISTE NOMINATIVE DES DONNEURS',1,1,'C');
$h=9;
$pdf->SetXY(0.5,$h); 	  
$pdf->cell(2,0.5,"IDP",1,0,'C',1,0);

$pdf->SetXY(2.5,$h); 	  
$pdf->cell(4,0.5,"NOM",1,0,'C',1,0);

$pdf->SetXY(6.5,$h); 	  
$pdf->cell(4,0.5,"PRENOM",1,0,'C',1,0);

$pdf->SetXY(10.5,$h); 	  
$pdf->cell(3.5,0.5,"SEXE",1,0,'C',1,0);

$pdf->SetXY(14,$h); 	  
$pdf->cell(3.5,0.5,"GROUPAGE",1,0,'C',1,0);

$pdf->SetXY(17.5,$h); 	  
$pdf->cell(3.5,0.5,"RHESUS",1,0,'C',1,0);

$pdf->SetXY(21,$h); 	  
$pdf->cell(3.5,0.5,"DATE DON",1,0,'C',1,0);

$pdf->SetXY(24.5,$h); 	  
$pdf->cell(3.5,0.5,"TEL",1,0,'C',1,0);

$pdf->SetXY(0.5,9.5); // marge sup 13


//********************************************************************************************//
$db_host="localhost";
$db_name="gpts2012"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
//$query = "SELECT * from tdon";
$query="select * from tdon where $colone like '$word%' and $colone1 like '$word1%'   ORDER BY nomdnr "; //% %will search form 0-9,a-z
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);

//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
   $pdf->cell(2,0.8,$row->IDP,1,0,'R',0);//5  =hauteur de la cellule origine =7
   $pdf->cell(4,0.8,$row->NOMDNR,1,0,'L',0);
   $pdf->cell(4,0.8,$row->PRENOMDNR,1,0,'L',0);
   $pdf->cell(3.5,0.8,$row->SEXE,1,0,'C',0);
   $pdf->cell(3.5,0.8,$row->GROUPAGE,1,0,'C',0);
   $pdf->cell(3.5,0.8,$row->RHESUS,1,0,'C',0);
   $pdf->cell(3.5,0.8,$row->datedon,1,0,'C',0);
   $pdf->cell(3.5,0.8,$row->TELEPHONE,1,0,'C',0);
   $pdf->SetXY(0.5,$pdf->GetY()+0.8); 
  }
$pdf->SetXY(0.5,$pdf->GetY()); 	  
$pdf->cell(2,0.5,"total",1,0,'C',1,0);	  
$pdf->SetXY(2.5,$pdf->GetY()); 	  
$pdf->cell(25.5,0.5,$totalmbr1."  "."donneurs",1,0,'C',1,0);				 
$pdf->SetXY(13,$pdf->GetY()+2); 	  
$pdf->cell(6,0.5,"DR TIBA PTS AIN OUSSERA ",0,0,'C',0);		
$pdf->Output();
?>


