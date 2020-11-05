<?php
require('../TCPDF/tcpdf.php');
require('../tcpdf/config/lang/eng.php');
class bat extends TCPDF
{

    function dateUS2FR($date)
	{
	  $date = explode('-', $date);
	  $date = array_reverse($date);
	  $date = implode('/', $date);
	  return $date;
	}
    function entete()
    {
	session_start() ;
	$session=$_SESSION["USER"];
	$AVN=$_SESSION["AVN"];
	$this->Text(60,10,"الجمهـــــورية الجزائرية الديموقراطية الشعبــية");
	$this->Text(75,20,"وزارة الفلاحة و التنمية الريفية");
	$this->Text(5,30,"DIRECTIONS DES SERVICES AGRICOLES");
	$this->Text(150,30,"مديرية المصالح الفلاحية");
	$this->Text(5,40,"INSPECTION VETERINAIRE DE LA WILAYA :DJELFA ");
	$this->Text(150,40,"المفتشية البيطرية لولاية:");
	$this->Text(5,50,"N°REF ");
	$this->Text(70,60," CERTIFICAT DE SALUBRITE");
	$this->Text(50,70," DES PRODUITS ANIMAUX ET D’ORIGINE ANIMALE");
	$this->Text(55,80," شهادة صحية للمنتوجات الحيوانية و/أو ذات مصدر حيواني");
	$this->Text(15,90," Loi n°88-08 du 26janvier1988 ,Décret n°95-363 du 11 novembre 1995 et Arrête IM du 21 novembre 1999");
	 $this->SetFont('aefurat', '', 9);
	$this->Rect(5, 100, 200, 15 ,"d");$this->Line(100 ,100 ,100,185 ); 
	$this->Text(6,100,"Nom et Prénom du Dr vétérinaire ".$session); 
	$this->Text(6,105,"Nom et Prénom du Dr vétérinaire ".$session); 
	$this->Text(6,110,"N°d’AVN".$AVN);// 
	}

    
	
	
	function corps($datevaccination,$nomeleveur,$prenomleveur,$filsde,$CIN,$parladairasde,$CFN,$delivrer,$wr,$dr,$cr,$ar)
    {
	session_start() ;
	$session=$_SESSION["USER"];
	$AVN=$_SESSION["AVN"];
	$this->Text(5,40,"Nom du vétérinaire mandaté:Dr ".$session );
    $this->Text(150,40,"AVN : ".$AVN);
	$this->Text(170,40,"");
	$this->Text(5,90,"Je soussigné (e) Dr : ".$session."  Certifie avoir vacciné ce jour le : ".$this->dateUS2FR($datevaccination)." le cheptel");
	$this->Text(5,100,"ovin et/ou caprin;Appartenant à Mr :".$nomeleveur." ".$prenomleveur."  fils de :".$filsde."  N°CIN/PC: ".$CIN);
	$this->Text(5,110,"délivré le : ".$this->dateUS2FR($delivrer)." par la daira de : ".$parladairasde."  CFN : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _demeurant ");
	$this->Text(135,110,$CFN);
	$this->Text(5,120,"à:".$ar." Commune:".$cr." Daira:".$dr);
	// $this->Text(5,120,$wr);
	$this->Text(15,130,"dont la composition est comme suite ");
	$this->SetFont('aefurat', '', 9.6);
	}
	function corps1($datevaccination,$nomeleveur,$prenomleveur,$filsde,$CIN,$parladairasde,$CFN,$delivrer,$wr,$dr,$cr,$ar)
    {
	$session=$_SESSION["USER"];
	$AVN=$_SESSION["AVN"];
	$this->Text(5,40,"Nom du vétérinaire mandaté:Dr ".$session );
	
    $this->Text(150,40,"AVN : ".$AVN);
	$this->Text(170,40,"");
	$this->Text(5,90,"Je soussigné (e) Dr : ".$session."  Certifie avoir vacciné ce jour le : ".$this->dateUS2FR($datevaccination)." le cheptel");
	$this->Text(5,100,"bovins;Appartenant à Mr :".$nomeleveur." ".$prenomleveur."  fils de :".$filsde."  N°CIN/PC: ".$CIN);
	$this->Text(5,110,"délivré le : ".$this->dateUS2FR($delivrer)." par la daira de : ".$parladairasde."  CFN : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _demeurant ");
	$this->Text(135,110,$CFN);
	$this->Text(5,120,"à:".$ar." Commune:".$cr." Daira:".$dr);
	$this->Text(135,110,$CFN);
	$this->Text(15,130,"dont la composition est comme suite ");
	$this->SetFont('aefurat', '', 9.6);
	}
	function corps3()
    {
	session_start() ;
	$session=$_SESSION["USER"];
	$AVN=$_SESSION["AVN"];
	$this->Text(5,40,"Nom du vétérinaire mandaté:Dr ".$session );
	$this->Text(150,40,"AVN : ".$AVN);
	$this->Text(170,40,"");
	}
	function corps4()
    {
	session_start() ;
	$session=$_SESSION["USER"];
	$AVN=$_SESSION["AVN"];
	$this->Text(5,25,"Nom du vétérinaire chargé du suivi Dr :".$session );

    $this->Text(150,25,"AVN : ".$AVN);
	$this->Text(170,40,"");
	}
	
	function avndlist()
    {
	session_start() ;
	$session=$_SESSION["USER"];
	$AVND=$_SESSION["AVND"];
	return $AVND;
	}
	function avndlist1()
    {
	
	$session=$_SESSION["USER"];
	$AVND=$_SESSION["AVND"];
	return $session;
	}
	
	
	
	
	
	function avn()
    {
	$AVN=$_SESSION["AVN"];
	return $AVN;
	}
	function avnd()
    {
	$AVND=$_SESSION["AVND"];
	return $AVND;
	}
	function avnw()
    {
	$AVNW=$_SESSION["AVNW"];
	return $AVNW;
	}
    function ligne($y,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9)
    {
    $this->SetXY(05,$y); 	  
	$this->cell(40,10,$v1,1,0,'C',0);
	$this->SetXY(45,$y); 	  
	$this->cell(20,10,$v2,1,0,'C',0);
	$this->SetXY(65,$y); 	  
	$this->cell(20,10,$v3,1,0,'C',0);
	$this->SetXY(85,$y); 	  
	$this->cell(20,10,$v4,1,0,'C',0);
	$this->SetXY(105,$y); 	  
	$this->cell(20,10,$v5,1,0,'C',0);
	$this->SetXY(125,$y); 	  
	$this->cell(20,10,$v6,1,0,'C',0);
	$this->SetXY(145,$y); 	  
	$this->cell(20,10,$v7,1,0,'C',0);
	$this->SetXY(165,$y); 	  
	$this->cell(20,10,$v8,1,0,'C',0);
	$this->SetXY(185,$y); 	  
	$this->cell(20,10,$v9,1,0,'C',0);
    }
    function ligne1($y,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8)
    {
    $this->SetXY(05,$y); 	  
	$this->cell(40,10,$v1,1,0,'C',0);
	
	$this->SetXY(45,$y); 	  
	$this->cell(30,10,$v2,1,0,'C',0);
	
	$this->SetXY(75,$y); 	  
	$this->cell(20,10,$v3,1,0,'C',0);
	
	$this->SetXY(95,$y); 	  
	$this->cell(20,10,$v4,1,0,'C',0);
	
	$this->SetXY(115,$y); 	  
	$this->cell(20,10,$v5,1,0,'C',0);
	
	$this->SetXY(135,$y); 	  
	$this->cell(20,10,$v6,1,0,'C',0);
	
	$this->SetXY(155,$y); 	  
	$this->cell(20,10,$v7,1,0,'C',0);
	
	$this->SetXY(175,$y); 	  
	$this->cell(30,10,$v8,1,0,'C',0);
    }
	
	function pied($daira,$datecertificat)
    {
	$session=$_SESSION["USER"];
	//$commune=$_SESSION["COMMUNE"]; en instance 
	$this->Text(5,210,"Visa de l'Inspecteur Vétérinaire ");
	$this->Text(5,215,"chargé du suivi des compagnes ");
	$this->Text(120,210,"Fait  à :".$daira." le : ".$this->dateUS2FR($datecertificat));
	$this->Text(135,215,"Griffe et Signature");
	$this->Text(130,220,"du Vétérinaire  mandaté");
	$this->Text(130,225,"Dr ".$session);
	}
	
	function piedbon()
    {
	// $session=$_SESSION["USER"];
	// $this->Rect(5, $pdf->GetY()+20, 75, 25,"d");$pdf->Rect(130, $pdf->GetY()+20, 75, 25,"d");
    // $this->Text(130,$pdf->GetY()+15,"********* le: ".$dateeuro);
    // $this->Text(25,$pdf->GetY()+10,"cachet du service ");$pdf->Text(145,$pdf->GetY(),"LE VETERINAIRE "); 
	}
	
	function nbrtowil($db_name,$tb_name,$colone) //FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name where IDWIL=$colone" );
    $row=mysql_fetch_object($result);
	$wilaya=$row->WILAYAS;
	return $wilaya;
	}
	function nbrtocom($db_name,$tb_name,$colone) //FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name where IDCOM=$colone" );
    $row=mysql_fetch_object($result);
	$wilaya=$row->COMMUNE;
	return $wilaya;
	}
	function nbrtodaira($db_name,$tb_name,$colone) //FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name where IDDAIRA=$colone" );
    $row=mysql_fetch_object($result);
	$daira=$row->DAIRAFR;
	return $daira;
	}
	function AVNTONOMVET($db_name,$tb_name,$colone) //FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name where AVN=$colone" );
    $row=mysql_fetch_object($result);
	$NOMVET=$row->USER;
	return $NOMVET;
	}
	
	
	//nouvelle conception wilaya daira commune adresse 
	function nbrtodai2($db_name,$tb_name,$colone) //FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE   nbrtodai
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name where IDDAIRA=$colone" );
    $row=mysql_fetch_object($result);
	$daira=$row->DAIRAFR;
	return $daira;
	}
	function nbrtocom3($db_name,$tb_name,$colone) //FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name where IDCOM=$colone" );
    $row=mysql_fetch_object($result);
	$comme=$row->COMMUNEFR;
	return $comme;
	}
	function lbc($h1,$N,$DES,$STOCK,$DEM)
    {
    
	$this->SetXY(05,$h1); 	  
	$this->cell(15,5,$N,1,0,'C',0);
	
	$this->SetXY(20,$h1); 	  
	$this->cell(105,5,$DES,1,0,'L',0);
	
	$this->SetXY(125,$h1); 	  
	$this->cell(25,5,$STOCK,1,'C',0);
	
	$this->SetXY(150,$h1); 	  
	$this->cell(25,5,$DEM,1,0,'C',0);
	
	$this->SetXY(175,$h1); 	  
	$this->cell(30,5,"",1,0,'C',0);
	
	
    }
	
	function NBRVET($colone) //FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
	$db_name="vaccinvet";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM USERS where COMMUNE=$colone" );
	$totalmbr1=mysql_num_rows($result);
	return $totalmbr1;
	}
	function NBRVET1() //FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
	$db_name="vaccinvet";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM USERS " );
	$totalmbr1=mysql_num_rows($result);
	return $totalmbr1;
	}
	
	
	
	

}	