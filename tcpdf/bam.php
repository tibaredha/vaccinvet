<?php
require('../TCPDF/tcpdf.php');
require('../tcpdf/config/lang/eng.php');
class vet extends TCPDF
{
    function dateUS2FR($date)
	{
	  $date = explode('-', $date);
	  $date = array_reverse($date);
	  $date = implode('/', $date);
	  return $date;
	}
    function bilanentete($titre)
    {
	// session_start() ;
	$session=$_SESSION["USER"];
	$AVN=$_SESSION["AVN"];
    $this->SetFont('aefurat', '', 12);
    $this->Text(80,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
    $this->Text(75,10,"MINISTERE DE L'AGRICULTURE ET DU DEVELOPPEMENT RURAL");
    $this->Text(5,20,"DIRECTION DES SERVICES AGRICOLES DE LA WILAYA DE DJELFA");
    $this->Text(5,25,"INSPECTION VETERINAIRE DE LA WILAYA DE DJELFA");
    $this->SetXY(05,35);
    $this->MultiCell(280,10,$titre,1,'C',0);
    $this->SetFont('aefurat', '', 15);
	}

	function LIGNETABLEAU($h1,$cp,$p,$bov,$ovi,$cap,$equ,$cam,$ndp,$ndt,$trt)
    {
	$this->SetFont('aefurat', '', 10);
	$this->SetXY(05,$h1); 	  
	$this->cell(36,5,$cp,1,0,'C',0);
	$this->SetXY(41,$h1); 	  
	$this->cell(44,5,$p,1,0,'L',0);
	$this->SetXY(85,$h1); 	  
	$this->cell(25,5,$bov,1,0,'C',0);
	$this->SetXY(85+25,$h1); 	  
	$this->cell(25,5,$ovi,1,0,'C',0);
	$this->SetXY(85+25*2,$h1); 	  
	$this->cell(25,5,$cap,1,0,'C',0);
	$this->SetXY(85+25*3,$h1); 	  
	$this->cell(25,5,$equ,1,0,'C',0);
	$this->SetXY(85+25*4,$h1); 	  
	$this->cell(25,5,$cam,1,0,'C',0);
	$this->SetXY(85+25*5,$h1); 	  
	$this->cell(25,5,$ndp,1,0,'C',0);
	$this->SetXY(85+25*6,$h1); 	  
	$this->cell(25,5,$ndt,1,0,'C',0);
	$this->SetXY(85+25*7,$h1); 	  
	$this->cell(30,5,$trt,1,0,'C',0);
	}
	
	function LIGNETABLEAUA($cat,$c1,$c2,$c3,$c4,$datejour1,$datejour2,$avn)
	{
	$this->SetXY(10,$this->GetY()+5); 	  
	$this->cell(40,10,$cat,1,1,'C',0);
	$this->SetXY(50,$this->GetY()-10); 	  
	$this->cell(80,10,"Noms des aviculteurs touchés",1,1,'C',0);
	$this->SetXY(130,$this->GetY()-10); 	  
	$this->cell(40,10,"Type de pathologie",1,1,'C',0);           
	$this->SetXY(170,$this->GetY()-10); 	  
	$this->cell(40,10,"Effectif traité",1,1,'C',0);
	$this->SetXY(210,$this->GetY()-10); 
	$this->cell(40,10,"Effectif Vacciné",1,1,'C',0);
	$this->SetXY(250,$this->GetY()-10); 
	$this->cell(40,10,"Observations ",1,1,'C',0);
		$cnx = mysql_connect("localhost","root","")or die ('I cannot connect to the database because: ' . mysql_error());
		$db  = mysql_select_db("vaccinvet",$cnx) ;
		mysql_query("SET NAMES 'UTF8' ");
		$query = "SELECT * from  bamav  where DATEBAM >='$datejour1'and DATEBAM <='$datejour2' and AVN='$avn' ";
		$resultat=mysql_query($query);
		// $totalmbr1=mysql_num_rows($resultat);
		
		while($row=mysql_fetch_object($resultat))
		  {
		   if($row->$c1!=0 or $row->$c2!=0 or $row->$c3!=0 or $row->$c4!=0 ) 
		   {
		   $this->cell(40,5,'',0,0,'C',0);
		   $this->cell(80,5,$row->NOM.'_'.$row->PRENOM,1,0,'L',0);
		   $this->cell(40,5,$row->$c1,1,0,'C',0);
		   $this->cell(40,5,$row->$c2,1,0,'C',0);
		   $this->cell(40,5,$row->$c3,1,0,'C',0);
		   $this->cell(40,5,$row->$c4,1,0,'C',0);
		   $this->SetXY(10,$this->GetY()+5); 
		  }
		  }
	}
	function LIGNEVACCINATION($h1,$Aviaire,$NomsAviaire)
	{
		$this->SetFont('aefurat', '', 10);	
		$this->SetXY(10,$h1); 	  
		$this->multicell(80,5,$Aviaire,1,'L',0);
		$this->SetXY(90,$h1); 	  
		$this->multicell(40,5,$NomsAviaire,1,'C',0);
		
	}
	
	
	
    
	
	
	
	
	function corps3()
    {
	session_start() ;
	$session=$_SESSION["USER"];
	$AVN=$_SESSION["AVN"];
	$this->Text(5,30,"Nom du vétérinaire mandaté:Dr ".$session );
	$this->Text(150,30,"AVN : ".$AVN);
	$this->Text(170,40,"");
	}
	function corps4()
    {
	session_start() ;
	$session=$_SESSION["USER"];
	$AVN=$_SESSION["AVN"];
	$this->Text(5,40,"Nom du vétérinaire chargé du suivi Dr :".$session );

    $this->Text(150,40,"AVN : ".$AVN);
	$this->Text(170,40,"");
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
	
	
	
	
	
	
	
	

}	