<?php
require('../TCPDF/tcpdf.php');//session start a ete initialiser avec le constructeur de tcpdf
require('../tcpdf/config/lang/eng.php');
class vet extends TCPDF
{
  function Code39($xpos, $ypos, $code, $baseline=0.5, $height=5){

	$wide = $baseline;
	$narrow = $baseline / 3 ; 
	$gap = $narrow;

	$barChar['0'] = 'nnnwwnwnn';
	$barChar['1'] = 'wnnwnnnnw';
	$barChar['2'] = 'nnwwnnnnw';
	$barChar['3'] = 'wnwwnnnnn';
	$barChar['4'] = 'nnnwwnnnw';
	$barChar['5'] = 'wnnwwnnnn';
	$barChar['6'] = 'nnwwwnnnn';
	$barChar['7'] = 'nnnwnnwnw';
	$barChar['8'] = 'wnnwnnwnn';
	$barChar['9'] = 'nnwwnnwnn';
	$barChar['A'] = 'wnnnnwnnw';
	$barChar['B'] = 'nnwnnwnnw';
	$barChar['C'] = 'wnwnnwnnn';
	$barChar['D'] = 'nnnnwwnnw';
	$barChar['E'] = 'wnnnwwnnn';
	$barChar['F'] = 'nnwnwwnnn';
	$barChar['G'] = 'nnnnnwwnw';
	$barChar['H'] = 'wnnnnwwnn';
	$barChar['I'] = 'nnwnnwwnn';
	$barChar['J'] = 'nnnnwwwnn';
	$barChar['K'] = 'wnnnnnnww';
	$barChar['L'] = 'nnwnnnnww';
	$barChar['M'] = 'wnwnnnnwn';
	$barChar['N'] = 'nnnnwnnww';
	$barChar['O'] = 'wnnnwnnwn'; 
	$barChar['P'] = 'nnwnwnnwn';
	$barChar['Q'] = 'nnnnnnwww';
	$barChar['R'] = 'wnnnnnwwn';
	$barChar['S'] = 'nnwnnnwwn';
	$barChar['T'] = 'nnnnwnwwn';
	$barChar['U'] = 'wwnnnnnnw';
	$barChar['V'] = 'nwwnnnnnw';
	$barChar['W'] = 'wwwnnnnnn';
	$barChar['X'] = 'nwnnwnnnw';
	$barChar['Y'] = 'wwnnwnnnn';
	$barChar['Z'] = 'nwwnwnnnn';
	$barChar['-'] = 'nwnnnnwnw';
	$barChar['.'] = 'wwnnnnwnn';
	$barChar[' '] = 'nwwnnnwnn';
	$barChar['*'] = 'nwnnwnwnn';
	$barChar['$'] = 'nwnwnwnnn';
	$barChar['/'] = 'nwnwnnnwn';
	$barChar['+'] = 'nwnnnwnwn';
	$barChar['%'] = 'nnnwnwnwn';

	$this->SetFont('aefurat','',10);
	$this->Text($xpos, $ypos + $height ,"AVN :".$code);//text du nombre mis en evidence
	$this->SetFillColor(0);

	$code = '*'.strtoupper($code).'*';
	for($i=0; $i<strlen($code); $i++){
		$char = $code[$i];
		if(!isset($barChar[$char])){
			$this->Error('Invalid character in barcode: '.$char);
		}
		$seq = $barChar[$char];
		for($bar=0; $bar<9; $bar++){
			if($seq[$bar] == 'n'){
				$lineWidth = $narrow;
			}else{
				$lineWidth = $wide;
			}
			if($bar % 2 == 0){
				$this->Rect($xpos, $ypos, $lineWidth, $height, 'F');
			}
			$xpos += $lineWidth;
		}
		$xpos += $gap;
	}
}

    function mysqlconnect()
	{
	$db_host="localhost";
	$db_name="vaccinvet"; 
	$db_user="root";
	$db_pass="";
	$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $cnx;
	return $db;
	}

    function dateUS2FR($date)
	{
	  $date = explode('-', $date);
	  $date = array_reverse($date);
	  $date = implode('-', $date);
	  return $date;
	}
	function bilanentetepdf($titre)
    {
    $this->SetFont('aefurat', '', 12);
    $this->Text(55+40,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
    $this->Text(50+40,10,"MINISTERE DE L'AGRICULTURE ET DU DEVELOPPEMENT RURAL");
    $this->Text(5,15,"DIRECTIONS DES SERVICES AGRICOLES DE LA WILAYA DE DJELFA");
    $this->Text(5,20,"INSPECTION VETERINAIRE DE LA WILAYA DE DJELFA");
    $this->SetXY(05,30);
    $this->MultiCell(280,10,$titre,1,'C',0);
    $this->SetFont('aefurat', '', 10);
	}
	
    function bilanentete($titre)
    {
	
    $this->SetFont('aefurat', '', 12);
    $this->Text(80,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
    $this->Text(75,10,"MINISTERE DE L'AGRICULTURE ET DU DEVELOPPEMENT RURAL");
    $this->Text(5,15,"DIRECTION DES SERVICES AGRICOLES DE LA WILAYA DE DJELFA");
    $this->Text(5,20,"INSPECTION VETERINAIRE DE LA WILAYA DE DJELFA");
    $this->SetXY(05,30);
    $this->MultiCell(280,10,$titre,1,'C',0);
    $this->SetFont('aefurat', '', 10);
	}
    function bilanentetef($titre)
    {
    $this->SetFont('aefurat', '', 12);
    $this->Text(50,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
    $this->Text(45,10,"MINISTERE DE L'AGRICULTURE ET DU DEVELOPPEMENT RURAL");
    $this->Text(5,15,"DIRECTION DES SERVICES AGRICOLES DE LA WILAYA DE DJELFA");
    $this->Text(5,20,"INSPECTION VETERINAIRE DE LA WILAYA DE DJELFA");
    $this->SetXY(05,30);
    $this->MultiCell(200,10,$titre,1,'C',0);
    $this->SetFont('aefurat', '', 10);
	}
    function entete($titre,$bilan,$NCERT)
    {
    $this->SetFont('aefurat', '', 12);
    $this->Text(55,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
    $this->Text(50,15,"MINISTERE DE L'AGRICULTURE ET DU DEVELOPPEMENT RURAL");
    $this->Text(5,30,"DIRECTION DES SERVICES AGRICOLES DE LA WILAYA DE DJELFA");
    $this->Text(5,35,"INSPECTION VETERINAIRE DE LA WILAYA DE DJELFA");
    $this->SetXY(05,50);
    $this->MultiCell(200,10,$titre,1,'C',0);
    $this->SetXY(05,255);
    $this->MultiCell(200,10,"NB : Ce certificat n'a qu'une valeur sanitaire. \n         Ce document ne peut etre considéré comme attestation d'eleveur",1,'L',0);
	$this->SetFont('aefurat', '', 13);
	$this->Text(5,70,"BILAN N°:".$bilan);
    $this->Text(5,75,"N°: ".$NCERT."          /".date('Y'));
	}
	
	function nbrtomed($colone,$ncolone)
	{
	$tb_name="products";
    $cnx = mysql_connect("localhost","root","")or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db("vaccinvet",$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name where id=$colone" );
    if ($row=mysql_fetch_object($result))
	{
		$xy=$row->$ncolone;	
	}
	else 
	{
		$xy="??????";	
	}
	return $xy;
	}
	
	
	
	
	function enteteord($titre,$bilan,$date,$espece,$NBR,$TNBR,$AGE,$TAGE,$SEXE,$IDELEV,$uc)
    {
    $this->SetFont('aefurat', '', 12);
    $this->Image("logo.png", $x=75, $y=5, $w=0, $h=0, $type='PNG', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	$this->Text(5,10,"REBHI Mohammed");
    $this->Text(5,$this->GetY()+5,"Docteur Vétérinaire");
    $this->Text(5,$this->GetY()+5,"AVN : 89034");
    $this->Text(5,$this->GetY()+10,"Adresse : Station de monte ");
	$this->Text(5,$this->GetY()+5,"Rue Mohamed Boudiaf  Ain oussera ");
    $this->Text(5,$this->GetY()+5,"Tél : 0550885260");
    $this->Text(5,$this->GetY()+5,"Mail : rebhimohamed96@gmail.com");
    $this->Text(5,$this->GetY()+10,"N° : ".$bilan." /".date('Y')); $this->Text(140,$this->GetY(),"Date de prescription : ".$this->dateUS2FR($date));
    $style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,128),
    'bgcolor' => array(255,255,128), //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
    );
	$this->write1DBarcode($bilan, "C39", $x=5, $y=65, $w=100, 18, 0.4, $style,'N');
	$this->write1DBarcode($IDELEV, "C39", $x=150, $y=65, $w=100, 18, 0.4, $style, 'N');
	$this->SetFont('aefurat', '', 30);
	$this->SetXY(05,65);$this->MultiCell(200,5,$titre,0,'C',0);
    $this->SetFont('aefurat', '', 11);
	$this->SetXY(05,76);$this->MultiCell(200,5,"(Décret exécutif n°90-240 du 04-08-1990)",0,'C',0);
	    $this->mysqlconnect();
	    $query_listex = "SELECT * FROM elev where idelev=$IDELEV";
		$resultatx=mysql_query($query_listex);
	    $rowx=mysql_fetch_object($resultatx);
	    $dairax=$rowx->ADRESSE	;
	$this->Text(5,$this->GetY()+5,"Nom et Prénom de l'éleveur : ".$rowx->nomelev."_".$rowx->prenomelev."_(".$rowx->filsde.")");
	$this->Text(5,$this->GetY()+5,"Adresse : ".$this->nbrtowil('vaccinvet','wil',$rowx->WILAYAR)." /".$this->nbrtodai2('vaccinvet','dai',$rowx->DAIRA)." /".$this->nbrtocom3('vaccinvet','comm',$rowx->COMMUNER)." /".$rowx->ADRESSE);
	$this->Text(5,$this->GetY()+5,"Identification de l'animal :");
	
	$this->Text(5,$this->GetY()+5,"Espèce : ".$espece);$this->Text(50,$this->GetY(),"Nbr : ".$NBR." ".$TNBR);$this->Text(50+50,$this->GetY(),"Age : ".$AGE." ".$TAGE);$this->Text(150,$this->GetY(),"Sexe : ".$SEXE);
	
	$this->Text(5,$this->GetY()+5,"_____________________________________________________________________________________________");
		$this->mysqlconnect();
		$query_liste = "SELECT * FROM medvet where IDELEV = $IDELEV and IDORD=$uc order by id";
		$resultat=mysql_query($query_liste);
		$x=0;
		while($row=mysql_fetch_object($resultat)) 
		{
		$x=$x+1;	
		$this->medord($x.") ".$this->nbrtomed($row->MD,"name"),$row->PS,$row->VA,$row->RA,$this->nbrtomed($row->MD,"DA"));
		}
	$this->SetXY(05,230);$this->MultiCell(200,10,"* MENTION RENOUVELLEMNT INTERDIT *",0,'C',0);
	$this->SetXY(05,235);$this->MultiCell(200,10,"Griffe et signature",0,'R',0);
	$this->SetXY(05,240);$this->MultiCell(200,10,"du vétérinaire",0,'R',0);
	$this->Text(5,$this->GetY()+5,"_____________________________________________________________________________________________");
	$this->SetFont('aefurat', '', 11);
	$this->SetXY(05,265);$this->MultiCell(200,10,"NB /Souche d'ordonnance à conserver au moins une année (12 mois) chez le vétérinaire et chez l'éleveur même après l'abattage ",0,'L',0);
	}
	
	function medord($m,$p,$v,$r,$d)
    {
    $this->SetFont('times', 'BIU', 14);
    $this->Text(12,$this->GetY()+10,$m);$this->SetFont('aefurat', '', 12);
    $this->Text(15,$this->GetY()+6,"Posologie: ".$p);$this->Text(70,$this->GetY(),"voie: ".$v); $this->Text(120,$this->GetY(),"Rythme: ".$r);  
    $this->Text(15,$this->GetY()+6,"Délai d'attente: ".$d." jour(s)");
	}
	
	
	function listvet($titre)
    {
	
    $this->SetFont('aefurat', '', 12);
    $this->Text(55,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
    $this->Text(50,15,"MINISTERE DE L'AGRICULTURE ET DU DEVELOPPEMENT RURAL");
    $this->Text(5,30,"DIRECTION DES SERVICES AGRICOLES DE LA WILAYA DE DJELFA");
    $this->Text(5,35,"INSPECTION VETERINAIRE DE LA WILAYA DE DJELFA");
    $this->SetXY(05,50);
    $this->MultiCell(200,10,$titre,1,'C',0);
    $this->SetFont('aefurat', '', 10);
	}
	function corps($datevaccination,$nomeleveur,$prenomleveur,$filsde,$CIN,$parladairasde,$CFN,$delivrer,$wr,$dr,$cr,$ar)
    {
	
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
	
	$session=$_SESSION["USER"];
	$AVN=$_SESSION["AVN"];
	$this->Text(5,25,"Nom du vétérinaire mandaté:Dr ".$session );
	$this->Text(150,25,"AVN : ".$AVN);
	$this->Text(170,40,"");
	}
	function corps4()
    {
	$session=$_SESSION["USER"];
	$AVN=$_SESSION["AVN"];
	$this->Text(5,42,"Nom du vétérinaire chargé du suivi Dr :".$session );
    $this->Text(150,42,"AVN : ".$AVN);
	
	}
	
	function corpsPPR($datevaccination,$nomeleveur,$prenomleveur,$filsde,$CIN,$parladairasde,$CFN,$delivrer,$wr,$dr,$cr,$ar)
    {
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
	
	
	
	
	function corpsord($datevaccination,$nomeleveur,$prenomleveur,$filsde,$CIN,$parladairasde,$CFN,$delivrer,$wr,$dr,$cr,$ar)
    {
	
	// $session=$_SESSION["USER"];
	// $AVN=$_SESSION["AVN"];
	// $this->Text(5,40,"Nom du vétérinaire mandaté:Dr ".$session );
    // $this->Text(150,40,"AVN : ".$AVN);
	// $this->Text(170,40,"");
	// $this->Text(5,90,"Je soussigné (e) Dr : ".$session."  Certifie avoir vacciné ce jour le : ".$this->dateUS2FR($datevaccination)." le cheptel");
	// $this->Text(5,100,"ovin et/ou caprin;Appartenant à Mr :".$nomeleveur." ".$prenomleveur."  fils de :".$filsde."  N°CIN/PC: ".$CIN);
	// $this->Text(5,110,"délivré le : ".$this->dateUS2FR($delivrer)." par la daira de : ".$parladairasde."  CFN : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _demeurant ");
	// $this->Text(135,110,$CFN);
	// $this->Text(5,120,"à:".$ar." Commune:".$cr." Daira:".$dr);
	
	// $this->Text(15,130,"dont la composition est comme suite ");
	// $this->SetFont('aefurat', '', 9.6);
	}
	
	
	function boncommande($titre)
    {

	$session=$_SESSION["USER"];
	$AVN=$_SESSION["AVN"];
	$this->Text(170,40,"");
    $this->SetFont('aefurat', '', 12);
    $this->Text(55,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
    $this->Text(50,15,"MINISTERE DE L'AGRICULTURE ET DU DEVELOPPEMENT RURAL");
    $this->Text(5,30,"DIRECTION DES SERVICES AGRICOLES DE LA WILAYA DE DJELFA");
    $this->Text(5,35,"INSPECTION VETERINAIRE DE LA WILAYA DE DJELFA");
    $this->SetXY(05,50);
    $this->MultiCell(200,10,$titre,1,'C',0);
    $this->Text(5,40,"Nom du vétérinaire mandaté:Dr ".$session );
	$this->Text(150,40,"AVN : ".$AVN);
	$this->Text(145,135,"LE VETERINAIRE "); 
	$this->Text(140,140,$session); 
	$this->SetFont('aefurat', '', 13);
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
	
	function calcule($vac,$datejour1,$datejour2,$AVN,$avn)
	{
	$query_liste = "SELECT datevac,SUM($vac)as Qvac  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and $AVN='$avn' ";
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvac=$row['Qvac'];
	mysql_free_result($requete);
	return $Qvac;
	}
	
	function REGVACCPDF($TITRE,$AVN,$avn,$col1,$col2,$col3,$col4,$col5,$col6,$DPVAC,$datejour1,$datejour2) 
    {
	$this->AddPage('L','A4');
	$this->SetFont('aefurat', '', 10);
	$this->bilanentete($TITRE.$this->dateUS2FR($datejour1)." AU ".$this->dateUS2FR($datejour2)."");
	$this->corps3();
	$h1=45;
	$this->SetXY(05,$h1); 	  
	$this->cell(10,14,"N°",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(70,14,"Nom de l'eleveur",1,0,'C',0);
	$this->SetFont('aefurat', '', 9);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(25,14,"Nbr ovins vaccinés",1,0,'C',0);
	$this->SetFont('aefurat', '', 10);
	$this->SetXY($this->GetX(),$h1);
	$this->cell(30,14,"Zone/Lieu",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Brebis",1,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Béliers",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Antenais",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Antenaises",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Agneaux",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Agnelles",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(55,14,"Nombre de doses perdues",1,0,'C',0);
	$this->SetXY(140,$h1); 	  
	$this->cell(90,7,"Repartition par age des ovins vaccinees",1,0,'C',0);
	$this->SetXY(05,59); // marge sup 13Caprins
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and $AVN='$avn' order by  NCERTIFICAT";
	$resultat=mysql_query($query_liste);
	while($row=mysql_fetch_object($resultat))
	  {
	  if($row->$col1!=0 or $row->$col2!=0 or $row->$col3!=0 or $row->$col4!=0 or $row->$col5!=0 or $row->$col6!=0  ) {
	   $this->cell(10,5,$row->NCERTIFICAT,1,0,'C',0); 
	   $this->cell(70,5,$row->nomeleveur."/".strtolower($row->FILSDE),1,0,'L',0);
	   $this->cell(25,5,$row->$col1+$row->$col2+$row->$col3+$row->$col4+$row->$col5+$row->$col6,1,0,'C',0);     
	   $this->cell(30,5,$this->nbrtocom3('vacccinvet','comm',$row->zonnelieu),1,0,'L',0);//$row->zonnelieu
	   $this->cell(15,5,$row->$col1,1,0,'C',0);
	   $this->cell(15,5,$row->$col2,1,0,'C',0);
	   $this->cell(15,5,$row->$col3,1,0,'C',0);
	   $this->cell(15,5,$row->$col4,1,0,'C',0);
	   $this->cell(15,5,$row->$col5,1,0,'C',0);
	   $this->cell(15,5,$row->$col6,1,0,'C',0);
	   $this->cell(55,5,$row->$DPVAC,1,0,'C',0);
	   $this->SetXY(05,$this->GetY()+5); 
	   }
	  }
	$totalovins=$this->calcule($col1,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col2,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col3,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col4,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col5,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col6,$datejour1,$datejour2,$AVN,$avn);	
	$this->SetXY(05,$this->GetY()); 	  
	$this->cell(80,0.5,"TOTAL",1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(25,0.5,$totalovins,1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(30,0.5,'***',1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col1,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col2,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col3,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col4,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col5,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col6,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(55,0.5,$this->calcule($DPVAC,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->Text(5,$this->GetY()+5,"Total des ovins vaccinés: ".$totalovins);
	$this->Text(5,$this->GetY()+5,"Tous les éleveurs cités ci-dessus ont été destinataire d'une copie de certificat de vaccination");	$this->Text(220,$this->GetY(),$this->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));	  
	$this->Text(25,$this->GetY()+5,"Signature de l'IVW  ");$this->Text(205,$this->GetY(),"Griffe et Signature du vétérinaire mandaté ");
	$this->Text(215,$this->GetY()+5,$_SESSION["USER"]);
	}
	function REGVACBPDF($TITRE,$AVN,$avn,$col1,$col2,$col3,$col4,$col5,$col6,$col7,$DPVAB,$datejour1,$datejour2) 
    {
	$this->AddPage('L','A4');
	$this->SetFont('aefurat', '', 10);
	$this->bilanentete($TITRE.$this->dateUS2FR($datejour1)." AU ".$this->dateUS2FR($datejour2)."");
	$this->corps3();
	$h1=50;
	$this->SetXY(05,$h1); 	  
	$this->cell(10,14,"N°",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(60,14,"Nom de l'eleveur",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(20,14,"Nbr ovins ",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(20,14,"Nbr caprins ",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1);
	$this->cell(30,14,"Zone/Lieu",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Brebis",1,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Béliers",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Antenais",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Antenaises",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Agneaux",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Agnelles",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Caprins",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(40,14,"Nombre de doses perdues",1,0,'C',0);
	$this->SetXY(145,$h1); 	  
	$this->cell(90,7,"Repartition par age des ovins vaccinees",1,0,'C',0);
	$this->SetXY(235,$h1); 	  
	$this->cell(15,7,"Caprins",1,0,'C',0);
	$this->SetXY(05,64);
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and $AVN='$avn' order by  NCERTIFICAT";
	$resultat=mysql_query($query_liste);
	while($row=mysql_fetch_object($resultat))
	  {
	  if($row->$col1!=0 or $row->$col2!=0 or $row->$col3!=0 or $row->$col4!=0 or $row->$col5!=0 or $row->$col6!=0 or $row->$col7!=0 ) {
	   $this->cell(10,5,$row->NCERTIFICAT,1,0,'C',0); 
	   $this->cell(60,5,$row->nomeleveur." / ".$row->FILSDE,1,0,'L',0);
	   $this->cell(20,5,$row->vabc1+$row->vabc2+$row->vabc3+$row->vabc4+$row->vabc5+$row->vabc6,1,0,'C',0);
	   $this->cell(20,5,$row->vabc7,1,0,'C',0);  
	   $this->cell(30,5,$this->nbrtocom3('vacccinvet','comm',$row->zonnelieu),1,0,'L',0);//$row->zonnelieu
	   $this->cell(15,5,$row->vabc1,1,0,'C',0);
	   $this->cell(15,5,$row->vabc2,1,0,'C',0);
	   $this->cell(15,5,$row->vabc3,1,0,'C',0);
	   $this->cell(15,5,$row->vabc4,1,0,'C',0);
	   $this->cell(15,5,$row->vabc5,1,0,'C',0);
	   $this->cell(15,5,$row->vabc6,1,0,'C',0);  
	   $this->cell(15,5,$row->vabc7,1,0,'C',0);   
	   $this->cell(40,5,$row->DPVAB,1,0,'C',0);
	   $this->SetXY(05,$this->GetY()+5); 
	   }
	  }
	$totalovins=$this->calcule($col1,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col2,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col3,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col4,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col5,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col6,$datejour1,$datejour2,$AVN,$avn);	
	$totalovins1=$this->calcule($col7,$datejour1,$datejour2,$AVN,$avn);	
	$this->SetXY(05,$this->GetY()); 	  
	$this->cell(70,0.5,"TOTAL",1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(20,0.5,$totalovins,1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(20,0.5,$totalovins1,1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(30,0.5,'***',1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col1,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col2,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col3,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col4,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col5,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col6,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col7,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(40,0.5,$this->calcule($DPVAB,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->Text(5,$this->GetY()+5,"Total des ovins vaccinés: ".$totalovins);
	$this->Text(5,$this->GetY()+5,"Total des caprins vaccinés: ".$totalovins1);
	$this->Text(5,$this->GetY()+5,"Tous les éleveurs cités ci-dessus ont été destinataire d'une copie de certificat de vaccination");	$this->Text(220,$this->GetY(),$this->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));	  
	$this->Text(25,$this->GetY()+5,"Signature de l'IVW  ");$this->Text(205,$this->GetY(),"Griffe et Signature du vétérinaire mandaté ");
	$this->Text(215,$this->GetY()+5,$_SESSION["USER"]); 
	}
	function REGVACAPDF($TITRE,$AVN,$avn,$col1,$col2,$col3,$col4,$col5,$col6,$col7,$DPVAA,$datejour1,$datejour2) 
    {
	$this->AddPage('L','A4');
	$this->SetFont('aefurat', '', 10);
	$this->bilanentete($TITRE.$this->dateUS2FR($datejour1)." AU ".$this->dateUS2FR($datejour2)."");
	$this->corps3();
	$h1=50;
	$this->SetXY(05,$h1); 	  
	$this->cell(10,14,"N°",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(62,14,"Nom de l'eleveur",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(30,14,"Nbr bovins vaccinés",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(37,14,"Zone/Lieu",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(30,7,"Vaches Laitieres",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Génisses",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Taureaux",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Taurillons",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Veaux",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1+7); 	  
	$this->cell(15,7,"Velles",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(40,14,"Nombre de doses perdues",1,0,'C',0);
	$this->SetXY(144,$h1); 	  
	$this->cell(105,7,"Repartition par age des bovins vaccinés",1,0,'C',0);
	$this->SetXY(05,64);
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and $AVN='$avn' order by  NCERTIFICAT";
	$resultat=mysql_query($query_liste);
	while($row=mysql_fetch_object($resultat))
	  {
	  if($row->$col1!=0 or $row->$col2!=0 or $row->$col3!=0 or $row->$col4!=0 or $row->$col5!=0 or $row->$col6!=0) {
	   $this->cell(10,5,$row->NCERTIFICAT,1,0,'C',0); 
	   $this->cell(62,5,$row->nomeleveur." / ".$row->FILSDE,1,0,'L',0); 
	   $this->cell(30,5,$row->$col1+$row->$col2+$row->$col3+$row->$col4+$row->$col5+$row->$col6,1,0,'C',0);        
	   $this->cell(37,5,$this->nbrtocom3('vacccinvet','comm',$row->zonnelieu),1,0,'L',0);//$row->zonnelieu
	   $this->cell(30,5,$row->$col1,1,0,'C',0);
	   $this->cell(15,5,$row->$col2,1,0,'C',0);
	   $this->cell(15,5,$row->$col3,1,0,'C',0);
	   $this->cell(15,5,$row->$col4,1,0,'C',0);
	   $this->cell(15,5,$row->$col5,1,0,'C',0);
	   $this->cell(15,5,$row->$col6,1,0,'C',0);
	   $this->cell(40,5,$row->$DPVAA,1,0,'C',0);
	   $this->SetXY(05,$this->GetY()+5); 
	   }
	  }	
	$totalbovins=$this->calcule($col1,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col2,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col3,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col4,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col5,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col6,$datejour1,$datejour2,$AVN,$avn);
	$this->SetXY(05,$this->GetY()); 	  
	$this->cell(72,0.5,"TOTAL",1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(30,0.5,$totalbovins,1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(37,0.5,'***',1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(30,0.5,$this->calcule($col1,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col2,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col3,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col4,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col5,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(15,0.5,$this->calcule($col6,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(40,0.5,$this->calcule($DPVAA,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	$this->Text(5,$this->GetY()+5,"Total des bovins vaccinés: ".$totalbovins);
	$this->Text(5,$this->GetY()+5,"Tous les éleveurs cités ci-dessus ont été destinataire d'une copie de certificat de vaccination");	$this->Text(220,$this->GetY(),$this->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));	  
	$this->Text(25,$this->GetY()+5,"Signature de l'IVW  ");$this->Text(205,$this->GetY(),"Griffe et Signature du vétérinaire mandaté ");
	$this->Text(215,$this->GetY()+5,$_SESSION["USER"]);
	}
	function IMPOTPDF($TITRE,$AVN,$avn,$col1,$col2,$col3,$col4,$col5,$col6,$col7,$DPVAA,$datejour1,$datejour2) 
    {
	$this->AddPage('L','A4');
	$this->SetFont('aefurat', '', 10);
	$this->bilanentete($TITRE.$this->dateUS2FR($datejour1)." AU ".$this->dateUS2FR($datejour2)."");
	$this->corps3();
	$h1=50;
	$this->SetXY(05,$h1); 	  
	$this->cell(10,14,"N°",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(62,14,"Nom de l'eleveur",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(30,14,"Nbr bovins vaccinés",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(30,14,"Nbr ovins vaccinés",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(37,14,"Zone/Lieu",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(37,14,"N° CIN",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(37,14,"Date De Delivrance",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(37,14,"Daira",1,0,'C',0);
	
	
	// $this->SetXY($this->GetX(),$h1+7); 	  
	// $this->cell(30,7,"Vaches Laitieres",1,0,'C',0);
	// $this->SetXY($this->GetX(),$h1+7); 	  
	// $this->cell(15,7,"Génisses",1,0,'C',0);
	// $this->SetXY($this->GetX(),$h1+7); 	  
	// $this->cell(15,7,"Taureaux",1,0,'C',0);
	// $this->SetXY($this->GetX(),$h1+7); 	  
	// $this->cell(15,7,"Taurillons",1,0,'C',0);
	// $this->SetXY($this->GetX(),$h1+7); 	  
	// $this->cell(15,7,"Veaux",1,0,'C',0);
	// $this->SetXY($this->GetX(),$h1+7); 	  
	// $this->cell(15,7,"Velles",1,0,'C',0);
	// $this->SetXY($this->GetX(),$h1); 	  
	// $this->cell(40,14,"Nombre de doses perdues",1,0,'C',0);
	// $this->SetXY(144,$h1); 	  
	// $this->cell(105,7,"Repartition par age des bovins vaccinés",1,0,'C',0);
	$this->SetXY(05,64);
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and $AVN='$avn' order by  NCERTIFICAT";
	$resultat=mysql_query($query_liste);
	while($row=mysql_fetch_object($resultat))
	  {
	  // if($row->$col1!=0 or $row->$col2!=0 or $row->$col3!=0 or $row->$col4!=0 or $row->$col5!=0 or $row->$col6!=0) {
	   $this->cell(10,5,$row->NCERTIFICAT,1,0,'C',0); 
	   $this->cell(62,5,$row->nomeleveur." / ".$row->FILSDE,1,0,'L',0); 
	   $this->cell(30,5,$row->vare1+$row->vare2+$row->vare3+$row->vare4+$row->vare5+$row->vare6,1,0,'C',0);        
	   $this->cell(30,5,$row->vacb1+$row->vacb2+$row->vacb3+$row->vacb4+$row->vacb5+$row->vacb6,1,0,'C',0);        
	   $this->cell(37,5,$this->nbrtocom3('vacccinvet','comm',$row->zonnelieu),1,0,'L',0);//$row->zonnelieu
	   $this->cell(37,5,$row->CINPC,1,0,'C',0);
	   $this->cell(37,5, $this->dateUS2FR($row->DELE),1,0,'C',0);
	   $this->cell(37,5,$row->DAIRADE,1,0,'C',0);
	   $this->SetXY(05,$this->GetY()+5); 
	   // }
	  }	
	// $totalbovins=$this->calcule($col1,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col2,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col3,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col4,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col5,$datejour1,$datejour2,$AVN,$avn)+$this->calcule($col6,$datejour1,$datejour2,$AVN,$avn);
	// $this->SetXY(05,$this->GetY()); 	  
	// $this->cell(72,0.5,"TOTAL",1,0,'C',0);
	// $this->SetXY($this->GetX(),$this->GetY()); 	  
	// $this->cell(30,0.5,$totalbovins,1,0,'C',0);
	// $this->SetXY($this->GetX(),$this->GetY()); 	  
	// $this->cell(37,0.5,'***',1,0,'C',0);
	// $this->SetXY($this->GetX(),$this->GetY()); 	  
	// $this->cell(30,0.5,$this->calcule($col1,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	// $this->SetXY($this->GetX(),$this->GetY()); 	  
	// $this->cell(15,0.5,$this->calcule($col2,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	// $this->SetXY($this->GetX(),$this->GetY()); 	  
	// $this->cell(15,0.5,$this->calcule($col3,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	// $this->SetXY($this->GetX(),$this->GetY()); 	  
	// $this->cell(15,0.5,$this->calcule($col4,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	// $this->SetXY($this->GetX(),$this->GetY()); 	  
	// $this->cell(15,0.5,$this->calcule($col5,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	// $this->SetXY($this->GetX(),$this->GetY()); 	  
	// $this->cell(15,0.5,$this->calcule($col6,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	// $this->SetXY($this->GetX(),$this->GetY()); 	  
	// $this->cell(40,0.5,$this->calcule($DPVAA,$datejour1,$datejour2,$AVN,$avn),1,0,'C',0);
	// $this->Text(5,$this->GetY()+5,"Total des bovins vaccinés: ".$totalbovins);
	// $this->Text(5,$this->GetY()+5,"Tous les éleveurs cités ci-dessus ont été destinataire d'une copie de certificat de vaccination");	
	$this->Text(220,$this->GetY(),$this->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));	  
	// $this->Text(25,$this->GetY()+5,"Signature de l'IVW  ");
	$this->Text(205,$this->GetY()+5,"Griffe et Signature du vétérinaire mandaté ");
	$this->Text(215,$this->GetY()+5,$_SESSION["USER"]);
	}
	
	
	
	function REGVACPDF($TITRE,$AVN,$avn,$datejour1,$datejour2) 
    {
	$this->AddPage('L','A4');
	$this->SetFont('aefurat', '', 10);
	$this->bilanentete($TITRE.$this->dateUS2FR($datejour1)." AU ".$this->dateUS2FR($datejour2)."");
	$this->corps3();
	$h1=50;
	$this->SetXY(05,$h1); 	  
	$this->cell(65,10,"Nom de l'eleveur",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(35,10,"Zone/Lieu",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(22,10,"VCLAV",1,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(22,10,"PCLAV",1,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(22,10,"VBRUC",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(22,10,"PBRUC",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(22,10,"VAPHT",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(22,10,"PAPHT",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(22,10,"VRABI",1,0,'C',0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(25,10,"PRABI",1,0,'C',0);
	$this->SetXY(05,60); // marge sup 13Caprins
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and $AVN='$avn' ";
	$resultat=mysql_query($query_liste);
	//***********************************************************************//
	while($row=mysql_fetch_object($resultat))
	  {
	  //if($row->vacb1!=0 and $row->vacb2!=0 and $row->vacb3!=0 and $row->vacb4!=0 and $row->vacb5!=0 and $row->vacb6!=0  and $row->vacb7!=0) {
	  $totalantic=$row->vacb1+$row->vacb2+$row->vacb3+$row->vacb4+$row->vacb5+$row->vacb6;
	  $totalanticp=$row->DPVAC;
	  $totalantib=$row->vabc1+$row->vabc2+$row->vabc3+$row->vabc4+$row->vabc5+$row->vabc6+$row->vabc7;
	  $totalantibp=$row->DPVAB;
	  $totalantia=$row->vaad1+$row->vaad2+$row->vaad3+$row->vaad4+$row->vaad5+$row->vaad6;
	  $totalantiap=$row->DPVAA;
	  $totalantir=$row->vare1+$row->vare2+$row->vare3+$row->vare4+$row->vare5+$row->vare6;
	  $totalantirp=$row->DPVAR;
	   $this->cell(65,5,$row->nomeleveur." / ".ucwords($row->FILSDE),1,0,'L',0);          
	   $this->cell(35,5,$this->nbrtocom3('vacccinvet','comm',$row->zonnelieu),1,0,'L',0);//$row->zonnelieu
	   $this->cell(22,5,$totalantic,1,0,'C',0);
	   $this->cell(22,5,$totalanticp,1,0,'C',0);
	   $this->cell(22,5,$totalantib,1,0,'C',0);
	   $this->cell(22,5,$totalantibp,1,0,'C',0);
	   $this->cell(22,5,$totalantia,1,0,'C',0);
	   $this->cell(22,5,$totalantibp,1,0,'C',0);
	   $this->cell(22,5,$totalantir,1,0,'C',0);
	   $this->cell(25,5,$totalantirp,1,0,'C',0);
	   $this->SetXY(05,$this->GetY()+5); 
	  // }
	  }
		//ANTI-CLAVELEUSE
		$query_liste = "SELECT datevac,SUM(DPVAC)as DPVAC,SUM(vacb1)as Qvacb1,SUM(vacb2)as Qvacb2,SUM(vacb3)as Qvacb3,SUM(vacb4)as Qvacb4,SUM(vacb5)as Qvacb5,SUM(vacb6)as Qvacb6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and $AVN='$avn' ";
		$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
		$row = mysql_fetch_array($requete); 
		$Qvacb1=$row['Qvacb1'];
		$Qvacb2=$row['Qvacb2'];
		$Qvacb3=$row['Qvacb3'];
		$Qvacb4=$row['Qvacb4'];
		$Qvacb5=$row['Qvacb5'];
		$Qvacb6=$row['Qvacb6'];
		$DPVAC=$row['DPVAC'];
		$totalvac=$Qvacb1+$Qvacb2+$Qvacb3+$Qvacb4+$Qvacb5+$Qvacb6;
		mysql_free_result($requete);
		//ANTI-BRUCELLIQUE
		$query_liste = "SELECT datevac,SUM(DPVAB)as DPVAB,SUM(vabc1)as Qvabc1,SUM(vabc2)as Qvabc2,SUM(vabc3)as Qvabc3,SUM(vabc4)as Qvabc4,SUM(vabc5)as Qvabc5,SUM(vabc6)as Qvabc6 ,SUM(vabc7)as Qvabc7 FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and $AVN='$avn' ";
		$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
		$row = mysql_fetch_array($requete); 
		$Qvabc1=$row['Qvabc1'];
		$Qvabc2=$row['Qvabc2'];
		$Qvabc3=$row['Qvabc3'];
		$Qvabc4=$row['Qvabc4'];
		$Qvabc5=$row['Qvabc5'];
		$Qvabc6=$row['Qvabc6'];
		$Qvabc7=$row['Qvabc7'];
		$DPVAB=$row['DPVAB'];
		$totalvab=$Qvabc1+$Qvabc2+$Qvabc3+$Qvabc4+$Qvabc5+$Qvabc6+$Qvabc7;
		mysql_free_result($requete);
		//ANTI-APHTEUSE vaad1
		$query_liste = "SELECT datevac,SUM(DPVAA)as DPVAA,SUM(vaad1)as Qvaad1,SUM(vaad2)as Qvaad2,SUM(vaad3)as Qvaad3,SUM(vaad4)as Qvaad4,SUM(vaad5)as Qvaad5,SUM(vaad6)as Qvaad6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and $AVN='$avn' ";
		$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
		$row = mysql_fetch_array($requete); 
		$Qvaad1=$row['Qvaad1'];
		$Qvaad2=$row['Qvaad2'];
		$Qvaad3=$row['Qvaad3'];
		$Qvaad4=$row['Qvaad4'];
		$Qvaad5=$row['Qvaad5'];
		$Qvaad6=$row['Qvaad6'];
		$DPVAA=$row['DPVAA'];
		$totalvaa=$Qvaad1+$Qvaad2+$Qvaad3+$Qvaad4+$Qvaad5+$Qvaad6;
		mysql_free_result($requete);
		//ANTI-RABIQUE vare1
		$query_liste = "SELECT datevac,SUM(DPVAR)as DPVAR,SUM(vare1)as Qvare1,SUM(vare2)as Qvare2,SUM(vare3)as Qvare3,SUM(vare4)as Qvare4,SUM(vare5)as Qvare5,SUM(vare6)as Qvare6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and $AVN='$avn' ";
		$requete = mysql_query( $query_liste) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
		$row = mysql_fetch_array($requete); 
		$Qvare1=$row['Qvare1'];
		$Qvare2=$row['Qvare2'];
		$Qvare3=$row['Qvare3'];
		$Qvare4=$row['Qvare4'];
		$Qvare5=$row['Qvare5'];
		$Qvare6=$row['Qvare6'];
		$DPVAR=$row['DPVAR'];
		$totalvar=$Qvare1+$Qvare2+$Qvare3+$Qvare4+$Qvare5+$Qvare6;
		mysql_free_result($requete);
	$this->SetXY(05,$this->GetY()); 	  
	$this->cell(100,0.5,"TOTAL",1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(22,0.5,$totalvac,1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(22,0.5,$DPVAC,1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(22,0.5,$totalvab,1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(22,0.5,$DPVAB,1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(22,0.5,$totalvaa,1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(22,0.5,$DPVAA,1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(22,0.5,$totalvar,1,0,'C',0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(25,0.5,$DPVAR,1,0,'C',0);
	$totalactesvaccination=$totalvac+$totalvab+$totalvaa+$totalvar;	  
	$this->Text(5,$this->GetY()+10,"Total des actes de vaccination: ".$totalactesvaccination);
	$this->Text(5,$this->GetY()+5,"Tous les éleveurs cités ci-dessus ont été destinataire d'une copie de certificat de vaccination");		  
	$this->Text(130,$this->GetY()+15,$this->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));
	$this->Text(25,$this->GetY()+10,"Signature de l'IVW  ");$this->Text(125,$this->GetY(),"Griffe et Signature du vétérinaire mandaté ");
	$this->Text(137,$this->GetY()+5,$_SESSION["USER"]);	
	}
	//***************************************************//
	    function NBRTETE($colone,$avn,$datejour1,$datejour2) //nbr de tete par veterinaire 
		{
		$result = mysql_query("SELECT SUM($colone) as $colone ,AVN,datevac FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN=$avn " );
		$row = mysql_fetch_array($result); 
		//introdure la condition pour remlacer les vides avec les zero 
		if($row[$colone]!=0 )
		{
		$Qvabc1=$row[$colone];
		return $Qvabc1;
		}
		else 
		{
		$Qvabc1=0;
		return $Qvabc1;
		}
		}
		function NBRELEVEUR($avn,$col1,$col2,$col3,$col4,$col5,$col6,$datejour1,$datejour2 ) //nbr de tete par veterinaire 
		{
		
		// $result = mysql_query("SELECT * FROM regvac where $col1!='0'  or $col2!='0'  or $col3!='0'  or $col4!='0' or $col5!='0'  or $col6!='0'   and (datevac >='$datejour1'and datevac <='$datejour2' and AVN=$avn ) " );
		$result = mysql_query("SELECT * FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN=$avn  and  ($col1!='0' or  $col2!='0' or $col3!='0'  or $col4!='0' or $col5!='0'  or $col6!='0'  )  " );
		$totalmbr1=mysql_num_rows($result);
		return $totalmbr1;
		}
		
		
		
		function STOCK($avn,$colone) //quantite en stock pour chaque vaccin colone
		{
		$result = mysql_query("SELECT AVN,$colone FROM users where AVN=$avn " );
		$row=mysql_fetch_object($result);
		$wilaya=$row->$colone;
		return $wilaya;
		}
		function SUMNBRTETE($colone,$avnd,$datejour1,$datejour2) //nbr de tete par veterinaire COORDINATEUR   a controle par la realite pas encor clair
		{
		$result = mysql_query("SELECT SUM($colone) as $colone,datevac FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVND=$avnd" );
		$row = mysql_fetch_array($result); 
		if($row[$colone]!=0 )
		{
		$Qvabc1=$row[$colone];
		return $Qvabc1;
		}
		else 
		{
		$Qvabc1=0;
		return $Qvabc1;
		}
		}
		function NBRELEVEUR1($avn,$col1,$col2,$col3,$col4,$col5,$col6,$datejour1,$datejour2) //nbr de tete par veterinaire coordinateur
		{
		$result = mysql_query("SELECT * FROM regvac where $col1!='0'  or $col2!='0'  or $col3!='0'  or $col4!='0' or $col5!='0'  or $col6!='0'   and (datevac >='$datejour1'and datevac <='$datejour2' and AVND=$avn ) " );
		$totalmbr1=mysql_num_rows($result);
		return $totalmbr1;
		}
		
	function BPD($TITRE,$AVN,$avn,$col1,$col2,$col3,$col4,$col5,$col6,$DPVAC,$VACQE,$datejour1,$datejour2) 
    {
	$this->AddPage('L','A4');
	$this->SetFont('aefurat', '', 10);
	$this->bilanentete($TITRE.$this->dateUS2FR($datejour1)." AU ".$this->dateUS2FR($datejour2)."");
	$this->corps4();
	$h1=48;
	$wid=16.5;
	$this->SetFillColor(220);
	$this->SetXY(05,$h1); 
	$this->cell(55,10,"Nom  du vétérinaire Mandaté",1,0,'C',1,0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell(35,10,"quantite vaccin attribué",1,0,'C',1,0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell($wid,10,"Brebis",1,0,'C',1,0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell($wid,10,"Béliers",1,0,'C',1,0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell($wid,10,"Antenais",1,0,'C',1,0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell($wid,10,"Antenaises",1,0,'C',1,0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell($wid,10,"Agneaux",1,0,'C',1,0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell($wid,10,"Agnelles",1,0,'C',1,0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell($wid,10,"Total",1,0,'C',1,0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell($wid+5,10,"doses perdues",1,0,'C',1,0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell($wid+10,10,"Nombre eleveurs",1,0,'C',1,0);
	$this->SetXY($this->GetX(),$h1); 	  
	$this->cell($wid+10,10,"Stock",1,0,'C',1,0);
	$this->SetXY(05,58); 
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM USERS where $AVN=$avn   and OK!=0  and ADMIN=0 order by USER "; //and OK!=0 instruction qui bloque les veto non autoriser ADMIN=0 =eliminer les coordinateur 
	$resultat=mysql_query($query_liste);
	while($row=mysql_fetch_object($resultat))
	  {
	  $val1=$this->NBRTETE($col1,$row->AVN,$datejour1,$datejour2);
	  $val2=$this->NBRTETE($col2,$row->AVN,$datejour1,$datejour2);
	  $val3=$this->NBRTETE($col3,$row->AVN,$datejour1,$datejour2);
	  $val4=$this->NBRTETE($col4,$row->AVN,$datejour1,$datejour2);
	  $val5=$this->NBRTETE($col5,$row->AVN,$datejour1,$datejour2);
	  $val6=$this->NBRTETE($col6,$row->AVN,$datejour1,$datejour2);
	  $NBRELEVEUR=$this->NBRELEVEUR($row->AVN,$col1,$col2,$col3,$col4,$col5,$col6,$datejour1,$datejour2);
	  
	   if($val1!=0 or $val2!=0  or $val3!=0 or $val4!=0 or $val5!=0 or $val6!=0 ) 
	   {
	   $this->cell(55,5,$row->USER.':'.$row->AVN,1,0,1,'L',0);
	   $this->cell(35,5,$this->STOCK($row->AVN,$VACQE)+$this->NBRTETE($DPVAC,$row->AVN,$datejour1,$datejour2)+$this->NBRTETE($col1,$row->AVN,$datejour1,$datejour2)+$this->NBRTETE($col2,$row->AVN,$datejour1,$datejour2)+$this->NBRTETE($col3,$row->AVN,$datejour1,$datejour2)+$this->NBRTETE($col4,$row->AVN,$datejour1,$datejour2)+$this->NBRTETE($col5,$row->AVN,$datejour1,$datejour2)+$this->NBRTETE($col6,$row->AVN,$datejour1,$datejour2),1,0,'C',0);
	   $this->cell($wid,5,$val1,1,0,'C',0);
	   $this->cell($wid,5,$val2,1,0,'C',0);
	   $this->cell($wid,5,$val3,1,0,'C',0);
	   $this->cell($wid,5,$val4,1,0,'C',0);
	   $this->cell($wid,5,$val5,1,0,'C',0);
	   $this->cell($wid,5,$val6,1,0,'C',0);
	   $this->cell($wid,5,$this->NBRTETE($col1,$row->AVN,$datejour1,$datejour2)+$this->NBRTETE($col2,$row->AVN,$datejour1,$datejour2)+$this->NBRTETE($col3,$row->AVN,$datejour1,$datejour2)+$this->NBRTETE($col4,$row->AVN,$datejour1,$datejour2)+$this->NBRTETE($col5,$row->AVN,$datejour1,$datejour2)+$this->NBRTETE($col6,$row->AVN,$datejour1,$datejour2),1,0,'C',1,0);
	   $this->cell($wid+5,5,$this->NBRTETE($DPVAC,$row->AVN,$datejour1,$datejour2),1,0,'C',0);
	   $this->cell($wid+10,5,$NBRELEVEUR,1,0,'C',0);
	   $this->cell($wid+10,5,$this->STOCK($row->AVN,$VACQE),1,0,'C',1,0);
	   $this->SetXY(05,$this->GetY()+5); 
       }	   
	  }	
	$avnd=$this->avnd();	
	$TOTALACTE=$this->SUMNBRTETE($col1,$avnd,$datejour1,$datejour2)+$this->SUMNBRTETE($col2,$avnd,$datejour1,$datejour2)+$this->SUMNBRTETE($col3,$avnd,$datejour1,$datejour2)+$this->SUMNBRTETE($col4,$avnd,$datejour1,$datejour2)+$this->SUMNBRTETE($col5,$avnd,$datejour1,$datejour2)+$this->SUMNBRTETE($col6,$avnd,$datejour1,$datejour2);	  
	$this->SetXY(05,$this->GetY()); 	  
	$this->cell(55,0.5,"TOTAL",1,0,'C',1,0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(35,0.5,$TOTALACTE+$this->SUMNBRTETE($DPVAC,$avnd,$datejour1,$datejour2),1,0,'C',1,0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell($wid,0.5,$this->SUMNBRTETE($col1,$avnd,$datejour1,$datejour2),1,0,'C',1,0);    //nbr de tete de avn coordinateur 
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell($wid,0.5,$this->SUMNBRTETE($col2,$avnd,$datejour1,$datejour2),1,0,'C',1,0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell($wid,0.5,$this->SUMNBRTETE($col3,$avnd,$datejour1,$datejour2),1,0,'C',1,0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell($wid,0.5,$this->SUMNBRTETE($col4,$avnd,$datejour1,$datejour2),1,0,'C',1,0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell($wid,0.5,$this->SUMNBRTETE($col5,$avnd,$datejour1,$datejour2),1,0,'C',1,0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell($wid,0.5,$this->SUMNBRTETE($col6,$avnd,$datejour1,$datejour2),1,0,'C',1,0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell($wid,0.5,$TOTALACTE,1,0,'C',1,0);
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell($wid+5,0.5,$this->SUMNBRTETE($DPVAC,$avnd,$datejour1,$datejour2),1,0,'C',1,0);
	$this->SetXY($this->GetX(),$this->GetY()); 	                                  
	
	//probleme non resolu pour nbr deleveur total ??????????
	//$NBRELEVEUR1=$this->NBRELEVEUR1($avnd,$col1,$col2,$col3,$col4,$col5,$col6,$datejour1,$datejour2);
	$NBRELEVEUR1="";
	$this->cell(26.5,0.5,$NBRELEVEUR1,1,0,'C',1,0); 
	$this->SetXY($this->GetX(),$this->GetY()); 	  
	$this->cell(26.5,0.5,00,1,0,'C',1,0); 
	$this->Text(230,$this->GetY()+5,$this->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));
	$this->Text(225,$this->GetY()+5,"Griffe et Signature du vétérinaire "); 
	}	

}	