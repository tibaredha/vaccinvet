<?php
class vet{
	
	 public $nomprenom ="tibaredha";
	 public $db_host="localhost";
	 public $db_name="vaccinvet"; 
     public $db_user="root";
     public $db_pass="";
	 public $utf8 = "" ;
	// protected $;WILAYAR
	// private  $;
	function __construct()
	{
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
	echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">";
	echo "<head>";
	echo "<title>INSPECTION VETERINAIRE DE LA WILAYA DE DJELFA </title>";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">";
	echo '<meta charset="utf-8" />';
	echo "<link rel=\"icon\" type=\"image/png\" href=\"IMAGES/vet.jpg\" />";
	echo "<link type=\"text/css\" href=\"./CSS/masquer.css\"             rel=\"stylesheet\" />";
	echo "<link type=\"text/css\" href=\"./CSS/css.css\"                 rel=\"stylesheet\" />";
	echo "<script type=\"text/javascript\" src=\"./js/jquery.js\"></script>";
	echo "<script type=\"text/javascript\" src=\"./js/menu.js\"></script>";
	echo "<script type=\"text/javascript\" src=\"./js/masquer.js\"></script>";
	echo '<script type="text/javascript" src="./js/js.js?t='.time().'"></script>';
	
	echo "</head>";
	session_start() ;
	echo "<body>";
	$this ->aspirateur();
	}
	
	// function mysqlconnect()
	// {
	// $db_host="localhost";
	// $db_name="vaccinvet"; 
	// $db_user="root";
	// $db_pass="";
	// $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	// $db  = mysql_select_db($db_name,$cnx) ;
	// mysql_query("SET NAMES 'UTF8' ");
	// return $cnx;
	// return $db;
	// }
	
	
	
	function aspirateur()
	{	
	//anti aspirateur qui marche bien 
	$navigateur = $_SERVER["HTTP_USER_AGENT"];
	$bannav = Array('HTTrack','httrack','WebCopier','HTTPClient'); // liste d'aspirateurs bannis
	foreach ($bannav as $banni)
	{ $comparaison = strstr($navigateur, $banni);
	if($comparaison!==false)
		{
		 echo '<center>Aspirateur interdit !<br><br>Votre IP est :<br>';
		 $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		 echo '<br>';
		 echo $hostname;
		 echo '</center>';
		 exit;
		}
	}
	}
	function __destruct()
	{
	 //echo 'this object has been destroyed';
	 echo '</br>';
    }
	
	function mysql_table_exists($db) {
		$requete = 'SHOW TABLES FROM '.$db.' ';
		$exec = mysql_query($requete);
		return mysql_num_rows($exec);
	}
	//echo mysql_table_exists($db='grh')."";

	function frDate() {
		$Jour = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
		$Mois = array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
		$datefr = $Jour[date("w")] . " " . date("d") . " " . $Mois[date("n")] . " " . date("Y");
		return $datefr;
	}
	function arDate() {
		$Jour = array("الاحد", "الاثنين", "الثلثاء", "الاربعاء", "الخميس", "الجمعة", "السبت");
		$Mois = array("", "جانفى", "فيفري", "مارس", "افريل", "ماي", "جوان", "جويلية", "اوت", "سبتمبر", "اكتوبر", "نوفمبر", "ديسمبر");
		$datear = $Jour[date("w")] . " " . date("d") . " " . $Mois[date("n")] . " " . date("Y");
		return $datear;
	}
	//echo $_SESSION["USER"] ;

	function dateFR2US($date)
	{
	$date = explode('-', $date);
	$date = array_reverse($date);
	$date = implode('-', $date);
	return $date;
	}

	function dateUS2FR($date)
	{
	  $date = explode('-', $date);
	  $date = array_reverse($date);
	  $date = implode('-', $date);
	  return $date;
	}
	function jours()
	{
	for ($i=1; $i<=9; $i++) 
	{ 
	echo "<option value=\"0$i\">". $i."</option><br />"; 
	}
	
    echo "<option value=\"10\">"."10"."</option><br />"; 

	for ($i=11; $i<=31; $i++) 
	{ 
	echo "<option value=\"$i\">". $i."</option><br />"; 
	}   
	}
	function mois()
	{
	for ($i=1; $i<=9; $i++) 
	{ 
	echo "<option value=\"0$i\">". $i."</option><br />"; 
	}
	echo "<option value=\"10\">"."10"."</option><br />"; 
	
	 for ($i=11; $i<=12; $i++) 
	{ 
	echo "<option value=\"$i\">". $i."</option><br />"; 
	}   
	}
	function anee()
	{
	for ($i=2010; $i<=2020; $i++) 
	{ 
	echo "<option value=\"$i\">". $i."</option><br />"; 
	}  
	}
	function datearabe($x,$y,$h)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo "<h".$h." >".$this->arDate()."</h".$h.">";
	 echo "</div>";
	}
	function stat()  //
	{
	$a = array(6, 2, 8);
	$moyenne = array_sum($a)/count($a);
	$et = 0;
	foreach ($a as $v){

	  $et += pow(($v - $moyenne), 2);

	}
	$et = $et / (count($a) - 1);
	$et = pow($et, 1/2);
    return $et;
	//echo $et;echo '</br>';
    }
     function median()
    {
	$numbers=array( 1,1,1,2,2,3,3,3 ) ;
	if (!is_array($numbers))
		$numbers = func_get_args();
	rsort($numbers);
	$mid = (count($numbers) / 2);
	return ($mid % 2 != 0) ? $numbers{$mid-1} : (($numbers{$mid-1}) + $numbers{$mid}) / 2;
    }
    function h($h,$x,$y,$txt)
    {
    echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
    echo "<h".$h." >".$txt."</h".$h.">";
    echo "</div>";
	}
	//formulaire
	function f0($url,$method,$form)
	{
	 echo "<form action=\"".$url."\" method=\"".$method."\" name=\"".$form."\" id=\"form1\">";
	}
	function f1()
	{
	 echo "</form> ";
	}
	function txt($x,$y,$name,$size,$value)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" />";
	 echo "</div>";
	}
	
	function txtid($x,$y,$name,$size,$id)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" id=\"".$id."\" />";
	 echo "</div>";
	}
	function label($x,$y,$l)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo $l;
	 echo "</div>";
	}
	function datetime ($x,$y,$name)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <input type=\"date\" name=\"".$name."\"   />";
	 echo "</div>";
	}
	function nbr ($x,$y,$name,$size)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <input type=\"number\" name=\"".$name."\" size=\"".$size."\" min=\"0\" max=\"15\" />";
	 echo "</div>";
	}
	function combov($x,$y,$name,$Jour)  //como vierge
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo "<select name=\"".$name."\" >";
	 foreach ($Jour as $value) 
    {
	 echo "<option>$value</option>";
    }
	 echo "</select> ";	
	 echo "</div>"; 
    }
	function comboprodtuit($x,$y,$name,$db_name) //combo avec base de donnes
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo '<select size=1 name="'.$name.'">'."\n";
    echo '<option   value="-1">choisir produit </option>'."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM produit   " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.$data['1'];
    echo '</option>'."\n";
    }
    echo '</select>'."\n"; 
	echo "</div>";
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
	
	//nouvelle conception wilay daira commune adresse 
	function nbrtowil1($db_name,$tb_name,$colone) //FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE
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
	function nbrtodai($db_name,$tb_name,$colone) //FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE   nbrtodai
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
	$comme=$row->COMMUNE;
	return $comme;
	}
	
	
	
	function WILAYAN($x,$y,$name,$db_name,$tb_name) 
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"country\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">selectionner wilaya</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name order by WILAYAS" );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.$data[1].'</option>';
    }
	echo '</select>'."\n"; 
	echo "</div>";
	}
	function COMMUNEN($x,$y,$name) 
	{
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"COMMUNEN\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">COMMUNE</option>"."\n";
    echo '</select>'."\n"; 
	echo "</div>";
	}
	function WILAYAR($x,$y,$name,$db_name,$tb_name) 
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"countryR\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">selectionner wilaya</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name order by WILAYAS" );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.$data[1].'</option>';
    }
	echo '</select>'."\n"; 
	echo "</div>";
	}
	function COMMUNER($x,$y,$name) 
	{
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"COMMUNER\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">COMMUNE</option>"."\n";
    echo '</select>'."\n"; 
	echo "</div>";
	}
	
	
	//wilaya daira commune adresse 
	function WILAYA1($x,$y,$name,$db_name,$tb_name) 
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"WILAYA1\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">selectionner wilaya</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name order by WILAYAS" );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.$data[1].'</option>';
    }
	echo '</select>'."\n"; 
	echo "</div>";
	}
	function DAIRA2($x,$y,$name) 
	{
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"DAIRA2\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">DAIRA</option>"."\n";
    echo '</select>'."\n"; 
	echo "</div>";
	}
	function COMMUNE3($x,$y,$name) 
	{
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"COMMUNE3\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">COMMUNE</option>"."\n";
    echo '</select>'."\n"; 
	echo "</div>";
	}
	
	function button($x,$y,$value)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo '<button type="button" id="submit_btn">'.$value.'</button>';
	 echo "</div>";
	}
	
	function submit($x,$y,$value)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <input type=\"submit\" name=\"VALIDER\" id=\"VALIDER\" value=\" ".$value."\" />";
	 echo "</div>";
	}
	function hide($x,$y,$name,$size,$value)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <input type=\"hidden\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" />";
	 echo "</div>";
	}
    function sautligne ($x) // fonction saut de lignes 
	{
	for ($i=1; $i<=$x; $i++) 
	{ 
	echo "<br />"; 
	} 
	}
    function url($x,$y,$url,$value,$h)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	 echo "<h".$h." >"."<a href=\"".$url."\">".$value."</a>"."</h".$h.">";
	 echo "</div>";
	}
	function url1($x,$y,$value,$h)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	 echo "<h".$h." >"."<a href=\"javascript:history.go(-1)\">".$value."</a>"."</h".$h.">";
	 echo "</div>";
	}
    function photosx($x,$y,$nom)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <img   src=\"./IMAGES/$nom\" width=\"250\" height=\"250\" alt=\"1\" />";
	 echo "</div>";
	}
    FUNCTION AVND ($x,$y,$valeur)
    { 
    echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1  name=\"AVND\">"."\n";
    echo"<option value=\"".$valeur."\" >".$valeur."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM USERS  where admin=1  order by USER " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data['AVN'].'">'.$data['USER'];
    echo '</option>'."\n";
    }
    echo '</select>'."\n"; 
	echo "</div>";
    }	
    FUNCTION AVNW ($x,$y,$valeur)
    { 
    echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1  name=\"AVNW\">"."\n";
    echo"<option value=\"".$valeur."\" >".$valeur."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM USERS  where admin=1  order by USER " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data['AVN'].'">'.$data['USER'];
    echo '</option>'."\n";
    }
    echo '</select>'."\n"; 
	echo "</div>";
    }
	
    function insereleveur ($titre) 
	{
	$this ->h(2,80,180,$titre.$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"]);
	$this -> sautligne (8);
	$this ->f0('index.php?uc=NELEV1','post','formGCS');
	$this ->submit(1110,250,$titre);
	$this ->label(80,250,'* Date inscription');         $this ->txt(200,250,'dateins',29,date('d-m-Y')); 
	$this ->label(80,280,'* Nom Eleveur');              $this ->txt(200,280,'nomelev',29,'x');
	$this ->label(450,280,'* Prénom Eleveur');          $this ->txt(580,280,'prenomelev',29,'x');
	$this ->label(1000,280,'* Fils De');                $this ->txt(1065,280,'filsde',29,'x');
	$this ->label(80,310,'* N°CIN/PC');                 $this ->txt(200,310,'nicnpc',29,'0');
	$this ->label(450,310,'* Delivre Le');              $this ->txt(580,310,'delivre',20,date('d-m-Y'));  
	$this ->label(800,310,'* Daira De');                $this ->txt(880,310,'dairade',15,'x');
	$this ->label(1020,310,'CFN');                      $this ->txt(1065,310,'CFN',29,'0');
	$this ->label(80,340,'* Wilaya ');                  $this ->WILAYA1(200,340,'WILAYAR','vaccinvet','wil'); 
	$this ->label(450,340,'* Daira ');                  $this ->DAIRA2(580,340,'DAIRA'); 
	$this ->label(800,340,'* Commune ');                $this ->COMMUNE3(880,340,'COMMUNER');                 
	$this ->label(1000,340,'* Adresse ');               $this ->txt(1065,340,'ADRESSE',29,'x');
	$this ->hide(10,10,'AVN',20,$_SESSION["AVN"]);
	$this ->hide(10,10,'AVND',20,$_SESSION["AVND"]);
	$this ->hide(10,10,'AVNW',20,$_SESSION["AVNW"]);
	$this ->f1();
	$this ->label(80,370,'(*)champ obligatoire'); 
	$this -> sautligne (5);
    }
    function insereleveur1 ($titre) //dateFR2US($date) dateUS2FR($date)
	{
	$this ->h(2,80,180,$titre.$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"]);
	mysql_query("SET NAMES 'UTF8' ");// le nom et prenom doit etre lier 
	$sql = "INSERT INTO  elev ( dateins,nomelev,prenomelev,filsde,nicnpc,delivre,dairade,CFN,WILAYAR,DAIRA,COMMUNER,ADRESSE,AVN,AVND,AVNW) 
	VALUES ('".$this->dateFR2US($_POST["dateins"])."','".$_POST["nomelev"]."','".$_POST["prenomelev"]."','".$_POST["filsde"]."','".$_POST["nicnpc"]."','".$this->dateFR2US($_POST["delivre"])."','".$_POST["dairade"]."','".$_POST["CFN"]."','".$_POST["WILAYAR"]."','".$_POST["DAIRA"]."','".$_POST["COMMUNER"]."','".$_POST["ADRESSE"]."','".$_POST["AVN"]."','".$_POST["AVND"]."','".$_POST["AVNW"]."')";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$this -> sautligne (15);
	header("Location: ./index.php?uc=NELEV") ;
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
	
	function list_ord_eleveur ($titre,$AVN,$avn,$idelev) 
	{
	mysql_query("SET NAMES 'UTF8' ");
	$query_liste = "SELECT * FROM ordvet where IDELEV= $idelev";// $AVN=$avn ORDER BY nomelev
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$this ->h(2,80,410,$titre);
	$this ->url(320,413,"index.php?uc=LELEV","Liste Des Eleveurs Inscrits",4);
	echo "<br>";echo "<br>";
	echo( "<table width=\"90%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
	echo( "<tr>
	<td class=\"ligne\">ID</td>
	<td class=\"ligne\">Ordonnance N°</td>
	<td class=\"ligne\">Date/Heure</div></td>
	<td class=\"ligne\">Espèce</td>
	<td class=\"ligne\">Nbr</td>
	<td class=\"ligne\">AGE</td>
	<td class=\"ligne\">Sexe</td>
	<td class=\"ligne\">M</td>
	<td class=\"ligne\">S</td>
	<td class=\"ligne\">MED</td>
	<td class=\"ligne\">ORD</td>
	</tr>" );
	while( $result = mysql_fetch_array( $requete ) )
	{
	echo( "<tr class=\"resultat\"  >\n" );
	echo( "<td><div align=\"center\">".$result['id']."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result['bilan']."</div></td>\n" );
	echo( "<td><div align=\"center\">".$this ->dateUS2FR($result['a1'])."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result['ESPECE']."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result['NBR']."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result['TNBR']."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result['SEXE']."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"modification \" href=\"index.php?uc=***&IDP=".$result['id']."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
    echo( "<td><div align=\"center\">"."<a title=\"Suppression ordonnace + medicaments  \" href=\"index.php?uc=SUPORD&id=".$result['id']."&idelev=".$idelev."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"Ajouter medicaments \" href=\"index.php?uc=NMED&ID=".$result['id']."&idelev=".$idelev."\"><img src='./images/s_okay.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" ); 
	echo( "<td><div align=\"center\">"."<a title=\"Afficher ordonnance \" href=\"./1VAC/FORD.php?uc=".$result['id']."&idelev=".$idelev."\"><img src='./images/Button Round.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	// echo( "<td><div align=\"center\">"."<a title=\"désactiver \" href=\"index.php?uc=***&IDP=".$result['idelev']."\"><img src='./images/s_error.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "</tr>\n" );
	} 
	echo( "<tr>
	<td class=\"ligne\">ID</td>
	<td class=\"ligne\">Ordonnance N°</td>
	<td class=\"ligne\">Date/Heure</div></td>
	<td class=\"ligne\">Espèce</td>
	<td class=\"ligne\">Nbr</td>
	<td class=\"ligne\">AGE</td>
	<td class=\"ligne\">Sexe</td>
	<td class=\"ligne\">M</td>
	<td class=\"ligne\">S</td>
	<td class=\"ligne\">MED</td>
	<td class=\"ligne\">ORD</td>
	</tr>" );
	echo( "</table><br>\n" );
	mysql_free_result($requete);
	}
	
	function list_med_eleveur ($titre,$AVN,$avn,$idelev,$IDORD) 
	{
	$query_liste = "SELECT * FROM medvet where IDELEV= $idelev  and  IDORD = $IDORD";// $AVN=$avn ORDER BY nomelev
	mysql_query("SET NAMES 'UTF8'");
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$this ->h(2,80,410,$titre);
	$this ->url(320,413,"index.php?uc=NORD&IDP=$idelev","Liste Des Ordonnances",4);
	echo "<br>";echo "<br>";
	echo( "<table width=\"90%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
	echo( "<tr>
	<td class=\"ligne\">id</td>
	<td class=\"ligne\">Nom du Médicament vétérinaire</td>
	<td class=\"ligne\">Posologie</div></td>
	<td class=\"ligne\">voie</td>
	<td class=\"ligne\">Rythme d'administration</td>
	<td class=\"ligne\">élai d'attente</td>
	<td class=\"ligne\">M</td>
	<td class=\"ligne\">S</td>
	</tr>" );
	while( $result = mysql_fetch_array( $requete ) )
	{
	echo( "<tr class=\"resultat\"  >\n" );
	echo( "<td><div align=\"center\">".$result['id']."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result['MD']."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result['PS']."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result['VA']."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result['RA']."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result['DA']."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"modification \" href=\"index.php?uc=***&ID=".$result['id']."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
    echo( "<td><div align=\"center\">"."<a title=\"suppression  \" href=\"index.php?uc=SUPMED&id=".$result['id']."&idord=".$IDORD."&idelev=".$idelev."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "</tr>\n" );
	} 
	echo( "<tr>
	<td class=\"ligne\">id</td>
	<td class=\"ligne\">Nom du Médicament vétérinaire</td>
	<td class=\"ligne\">Posologie</div></td>
	<td class=\"ligne\">voie</td>
	<td class=\"ligne\">Rythme d'administration</td>
	<td class=\"ligne\">élai d'attente</td>
	<td class=\"ligne\">M</td>
	<td class=\"ligne\">S</td>
	</tr>" );
	echo( "</table><br>\n" );
	mysql_free_result($requete);
	}
	
	
	function listeleveur ($titre,$AVN,$avn) 
	{
	$query_liste = "SELECT * FROM elev where $AVN=$avn ORDER BY nomelev";
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$this ->h(2,80,390,$titre);
	echo "<br>";echo "<br>";
	echo( "<table width=\"90%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
	echo( "<tr>
	<td class=\"ligne\">IDELEV</td>
	<td class=\"ligne\">Nom_Prenom_Fils de</td>
	<td class=\"ligne\">NCPPC</div></td>
	<td class=\"ligne\">Delivrer le</td>
	<td class=\"ligne\">Daira de </td>
	<td class=\"ligne\">Wilaya </td>
	<td class=\"ligne\">Daira</td>
	<td class=\"ligne\">Commune</td>
	<td class=\"ligne\">Adresse</td>
	<td class=\"ligne\">A</td>
	<td class=\"ligne\">DA</td>
	<td class=\"ligne\">M</td>
	<td class=\"ligne\">S</td><td class=\"ligne\">VAC</td>
	<td class=\"ligne\">ORD</td>
	</tr>" );
	while( $result = mysql_fetch_array( $requete ) )
	{
	echo( "<tr class=\"resultat\"  >\n" );
	echo( "<td><div align=\"center\">".$result['idelev']."</div></td>\n" );
	// echo( "<td><div align=\"center\">".$this ->dateUS2FR($result['dateins'])."</div></td>\n" );
	echo( "<td><div align=\"left\">".strtoupper($result['nomelev']).'_'.ucwords($result['prenomelev']).'_('.ucwords($result['filsde']).')'."</div></td>\n" );
	// echo( "<td><div align=\"center\">".$result['prenomelev'].$result['filsde']."</div></td>\n" );
	// echo( "<td><div align=\"left\">".$result['filsde']."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result['nicnpc']."</div></td>\n" );
	echo( "<td><div align=\"center\">".$this ->dateUS2FR($result['delivre'])."</div></td>\n" );
	echo( "<td><div align=\"left\">".$result['dairade']."</div></td>\n" );
	echo( "<td><div align=\"left\">".$this ->nbrtowil('vacccinvet','wil',$result['WILAYAR'])."</div></td>\n" );//
	echo( "<td><div align=\"left\">".$this ->nbrtodaira('vacccinvet','dai',$result['DAIRA'])."</div></td>\n" );
	echo( "<td><div align=\"left\">".$this ->nbrtocom3('vacccinvet','comm',$result['COMMUNER'])."</div></td>\n" );
	echo( "<td><div align=\"left\">".$result['ADRESSE']."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"activer \" href=\"index.php?uc=***&IDP=".$result['idelev']."\"><img src='./images/s_okay.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"désactiver \" href=\"index.php?uc=***&IDP=".$result['idelev']."\"><img src='./images/s_error.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"modification \" href=\"index.php?uc=***&IDP=".$result['idelev']."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"suppression  \" href=\"index.php?uc=SUPELEV&IDP=".$result['idelev']."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"vaccination \" href=\"index.php?uc=NVACELEV&IDP=".$result['idelev']."\"><img src='./images/Button Next.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" ); 
	echo( "<td><div align=\"center\">"."<a title=\"ordonnance \" href=\"index.php?uc=NORD&IDP=".$result['idelev']."\"><img src='./images/Button Round.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" ); 
	
	echo( "</tr>\n" );
	} 
	echo( "<tr>
	<td class=\"ligne\">IDELEV</td>
	<td class=\"ligne\">Nom_Prenom_Fils de</td>
	<td class=\"ligne\">NCPPC</div></td>
	<td class=\"ligne\">DELIVRER</td>
	<td class=\"ligne\">DAIRA</td>
	<td class=\"ligne\">WILAYAR</td>
	<td class=\"ligne\">DAIRA</td>
	<td class=\"ligne\">COMMUNER</td>
	<td class=\"ligne\">ADRESSE</td>
	<td class=\"ligne\">A</td>
	<td class=\"ligne\">DA</td>
	<td class=\"ligne\">M</td>
	<td class=\"ligne\">S</td><td class=\"ligne\">VAC</td><td class=\"ligne\">ORD</td>
	</tr>" );
	echo( "</table><br>\n" );
	mysql_free_result($requete);
	}
	
	
	function ENTETEVACCIN ($titre,$n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9) 
	{
	             echo "<tr bgcolor=\"YELLOW\">";
				 echo "<td colspan=\"2\" align=\"center\"  width=\"22%\"  >$titre </td>";
			     echo "<td>";
		             echo "<div align=\"center\">";
					   echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n1\" type=\"text\">";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n2\" type=\"text\" >";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n3\" type=\"text\" >";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n4\" type=\"text\" >";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n5\" type=\"text\" >";
					   echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n6\" type=\"text\" >";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n7\" type=\"text\" >";
					   echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n8\" type=\"text\" >";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n9\" type=\"text\"  >"; 
					 echo "</div>";
				   echo "</td>";  
			     echo "</tr>";
	}
	function ENTETEVACCINCC ($titre,$n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9) 
	{
	             echo "<tr bgcolor=\"YELLOW\">";
				 echo "<td colspan=\"2\" align=\"center\"  width=\"22%\"  >$titre </td>";
			     echo "<td>";
		             echo "<div align=\"center\">";
					   echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n1\" type=\"text\">";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n2\" type=\"text\" >";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n3\" type=\"text\" >";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n4\" type=\"text\" >";
		               // echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n5\" type=\"text\" >";
					   // echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n6\" type=\"text\" >";
		               // echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n7\" type=\"text\" >";
					   echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n8\" type=\"text\" >";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n9\" type=\"text\"  >"; 
					 echo "</div>";
				   echo "</td>";  
			     echo "</tr>";
	}
	function LIGNEVACCIN ($titre,$n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$fon) 
	{            echo "<tr bgcolor=\"#E5F0F0\">";
				 echo "<td colspan=\"2\">$titre </td>";
			     echo "<td>";
		             echo "<div align=\"center\">";
					   echo "<input name=\"$n1\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n2\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n3\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n4\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n5\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
					   echo "<input name=\"$n6\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n7\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
					   echo "<input name=\"$n8\"    size=\"10\" value=\"00\" type=\"text\" READONLY onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n9\"    size=\"10\" value=\"00\" type=\"text\"  >"; 
					 echo "</div>";
				   echo "</td>";  
			     echo "</tr>";
	}
	function LIGNEVACCINCC ($titre,$n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$fon) 
	{            echo "<tr bgcolor=\"#E5F0F0\">";
				 echo "<td colspan=\"2\">$titre </td>";
			     echo "<td>";
		             echo "<div align=\"center\">";
					   echo "<input name=\"$n1\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n2\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n3\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n4\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               // echo "<input name=\"$n5\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
					   // echo "<input name=\"$n6\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               // echo "<input name=\"$n7\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
					   echo "<input name=\"$n8\"    size=\"10\" value=\"00\" type=\"text\" READONLY onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n9\"    size=\"10\" value=\"00\" type=\"text\"  >"; 
					 echo "</div>";
				   echo "</td>";  
			     echo "</tr>";
	}
	function ENTETEVACCIN1 ($titre,$n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8) 
	{
	             echo "<tr bgcolor=\"YELLOW\">";
				 echo "<td colspan=\"2\" align=\"center\"  width=\"22%\"  >$titre </td>";
			     echo "<td>";
		             echo "<div align=\"center\">";
					   echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n1\" type=\"text\">";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n2\" type=\"text\" >";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n3\" type=\"text\" >";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n4\" type=\"text\" >";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n5\" type=\"text\" >";
					   echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n6\" type=\"text\" >";
		               echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n7\" type=\"text\" >";
					   echo "<input class=\"entetevet\" name=\"\"  READONLY  size=\"10\" value=\"$n8\" type=\"text\" >";
		              
					 echo "</div>";
				   echo "</td>";  
			     echo "</tr>";
	}
	function LIGNEVACCIN1 ($titre,$n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$fon) 
	{
	             echo "<tr bgcolor=\"#E5F0F0\">";
				 echo "<td colspan=\"2\">$titre </td>";
			     echo "<td>";
		             echo "<div align=\"center\">";
					   echo "<input name=\"$n1\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n2\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n3\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n4\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n5\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
					   echo "<input name=\"$n6\"    size=\"10\" value=\"00\" type=\"text\" onblur=\"$fon()\" ;>";
					   echo "<input name=\"$n7\"    size=\"10\" value=\"00\" type=\"text\" READONLY onblur=\"$fon()\" ;>";
		               echo "<input name=\"$n8\"    size=\"10\" value=\"00\" type=\"text\"  >"; 
					 echo "</div>";
				   echo "</td>";  
			     echo "</tr>";
	}
	function avntonom($db_name,$colone) 
	{
    $result = mysql_query("SELECT * FROM users where AVN=$colone" );
    $row=mysql_fetch_object($result);
	$USER=$row->USER;
	return $USER;
	}
	function eva($titre,$action,$user,$bouton)
	{
	echo "<H1 ALIGN = \"center\">$titre $user</H1>";
	echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
	echo "<form ALIGN=\"center\" action=\"$action\" method=\"post\">";
	echo "<p> du";
	echo "<select name=\"jour\">";
	$this ->jours();
	echo "</select>";
	echo "<select name=\"mois\">";
	$this ->mois();
	echo "</select>";
	echo "<select name=\"annee\">";
	$this ->anee();
	echo "</select>";
	echo "</p>";
	echo "<p> au";
	echo "<select name=\"jour1\">";
	$this ->jours();
	echo "</select>";
	echo "<select name=\"mois1\">";
	$this ->mois();
	echo "</select>";
	echo "<select name=\"annee1\">";
	$this ->anee();
	echo "</select>";
	echo "</p>";
	echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
	echo"<p>VACCIN";
    echo"<select name=\"vaccin\"  >"; 
	echo"<option selected=\"selected\">_______________________</option>";
	echo"<option value=\"0\" >REGISTRE VACCINATION</option>";
	echo"<option value=\"1\" >ANTI-CLAVELEUSE</option>";
	echo"<option value=\"2\" >ANTI-BRUCELLIQUE</option>";
	echo"<option value=\"3\" >ANTI-APHTEUX</option>";
	echo"<option value=\"4\" >ANTI-RABIQUE</option>";
	echo"<option value=\"5\" >REGISTRE_IMPOT</option>";
	
	
	echo"</select></p>";
	echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
	echo "<p><input type=\"submit\" value=\"$bouton\" /></p>";
	echo "</form>";
	echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
	$this -> sautligne (2);  
	}
	function verifannee($annee,$mois,$jour)
	{
		if (!ISSET($annee)||!ISSET($mois)||!ISSET($jour))
		{
		$datejour =date("Y-m-d");
		
		}
		else
		{
		 if(empty($annee)||empty($mois)||empty($jour))
		 {
		 $datejour =date("Y-m-d");
		 
		 }
		 else
		 {
		 $datejour = $annee .'-'.$mois .'-'.$jour;
		
		 }
		}
		return $datejour;
	}
	function REGVAC ($TITRE,$AVN,$avn,$col0,$col1,$elv,$comm,$datejour1,$datejour2) 
	{
	$query_liste = "SELECT * FROM regvac where $AVN='$avn'";
	$requete = mysql_query( $query_liste) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	echo "<H2 align=\"center\">$TITRE".$_SESSION["USER"]." </H2>";
	echo "<H3 align=\"center\">"." DU ".$this->dateUS2FR($datejour1)." AU ". $this->dateUS2FR($datejour2)."  </H3>";
	echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
	echo( "<tr>
	<td class=\"ligne\">date vaccination</div></td>
	<td class=\"ligne\">Nom éleveur</td>
	<td class=\"ligne\">zonne/lieu</td>
	<td class=\"ligne\">ANTI-CLAVELEUSE</td>
	<td class=\"ligne\">ANTI-BRUCELLIQUE</td>
	<td class=\"ligne\">ANTI-APHTEUSE</td>
	<td class=\"ligne\">ANTI-RABIQUE</td>
	<td class=\"ligne\">Mod</div></td>
	<td class=\"ligne\">Sup</div></td>
	</tr>" ); 
	while( $result = mysql_fetch_array( $requete ) )
	{
	 if($result[2]!=0 or $result[3]!=0 or $result[4]!=0 or $result[5]!=0 or $result[6]!=0 or $result[7]!=0 or $result[8]!=0) 
	  {
	  $totalantic=$result[2]+$result[3]+$result[4]+$result[5]+$result[6]+$result[7]+$result[8];
	  $totalantib=$result[9]+$result[10]+$result[11]+$result[12]+$result[13]+$result[14]+$result[15];
	  $totalantia=$result[16]+$result[17]+$result[18]+$result[19]+$result[20]+$result[21];
	  $totalantir=$result[22]+$result[23]+$result[24]+$result[25]+$result[26]+$result[27];
		echo( "<tr class=\"resultat\" >\n" );
		echo( "<td><div align=\"center\">".$this->dateUS2FR($result[$col1])."</div></td>\n" );
		echo( "<td><div align=\"left\">".$result[$elv]."</div></td>\n" );
		echo( "<td><div align=\"left\">".$this ->nbrtocom3('vacccinvet','comm',$result[$comm])."</div></td>\n" );
		echo( "<td><div align=\"center\">".$totalantic."</div></td>\n" );
		echo( "<td><div align=\"center\">".$totalantib."</div></td>\n" );
		echo( "<td><div align=\"center\">".$totalantia."</div></td>\n" );
		echo( "<td><div align=\"center\">".$totalantir."</div></td>\n" );
		echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=MODVAC&IDVAC=".$result[$col0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
		echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=SUPVAC&IDVAC=".$result[$col0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
		echo( "</tr>\n" );
	  }
	} 
	echo( "<tr>
	<td class=\"ligne\">date vaccination</div></td>
	<td class=\"ligne\">Nom éleveur</div></td>
	<td class=\"ligne\">zonne/lieu</div></td>
	<td class=\"ligne\">ANTI-CLAVELEUSE</td>
	<td class=\"ligne\">ANTI-BRUCELLIQUE</td>
	<td class=\"ligne\">ANTI-APHTEUSE</td>
	<td class=\"ligne\">ANTI-RABIQUE</td>
	<td class=\"ligne\">Mod</div></td>
	<td class=\"ligne\">Sup</div></td>
	</tr>" );
	echo( "</table><br>\n" );
	mysql_free_result($requete);
	}
	function REGVACCB ($TITRE,$AVN,$avn,$col0,$col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$DPVAC,$elv,$comm,$datejour1,$datejour2) 
	{
	$query_liste = "SELECT * FROM regvac where $AVN='$avn'  order by datevac";
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	echo "<H2 align=\"center\">$TITRE".$_SESSION["USER"]." </H2>";
	echo "<H3 align=\"center\">"." DU ".$this->dateUS2FR($datejour1)." AU ". $this->dateUS2FR($datejour2)."  </H3>";
	echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
	echo( "<tr>
	<td class=\"ligne\">date vaccination</div></td>
	<td class=\"ligne\">éleveur</div></td>
	<td class=\"ligne\">zonne/lieu</div></td>
	<td class=\"ligne\">Brebis</div></td>
	<td class=\"ligne\">Béliers</div></td>
	<td class=\"ligne\">Antenais</div></td>
	<td class=\"ligne\">Antenaises</div></td>
	<td class=\"ligne\">Agneaux</div></td>
	<td class=\"ligne\">Agnelles</div></td>
	<td class=\"ligne\">Caprins</div></td>
	<td class=\"ligne\">dose perdues</td>
	<td class=\"ligne\">certificat</td>
	<td class=\"ligne\">Mod</div></td>
	<td class=\"ligne\">Sup</div></td>
	</tr>" ); 
	while( $result = mysql_fetch_array( $requete ) )
	{
	 if($result[$col2]!=0 or $result[$col3]!=0 or $result[$col4]!=0 or $result[$col5]!=0 or $result[$col6]!=0 or $result[$col7]!=0 or $result[$col8]!=0) 
	  {
		echo( "<tr class=\"resultat\" >\n" );
		echo( "<td><div align=\"center\">".$this->dateUS2FR($result[$col1])."</div></td>\n" );
		echo( "<td><div align=\"left\">".$result[$elv]."</div></td>\n" );
		echo( "<td><div align=\"left\">".$this ->nbrtocom3('vacccinvet','comm',$result[$comm])."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col2]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col3]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col4]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col5]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col6]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col7]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col8]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$DPVAC]."</div></td>\n" );
		echo( "<td><div align=\"center\">"."<a title=\"Duplicata certificat \" href=\"./1VAC/CERT.PHP?IDVAC=".$result[$col0]."&DATE=".$result[$col1]."&ELEV=".$result[28]."&vac2=".$result[$col2]."&vac3=".$result[$col3]."&vac4=".$result[$col4]."&vac5=".$result[$col5]."&vac6=".$result[$col6]."&vac7=".$result[$col7]."      \"><img src='./images/window-new.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
		echo( "<td><div align=\"center\">"."<a title=\"Modification\" href=\"index.php?uc=MODVAC&IDVAC=".$result[$col0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
		echo( "<td><div align=\"center\">"."<a title=\"Suppression\" href=\"index.php?uc=SUPVAC&IDVAC=".$result[$col0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
		echo( "</tr>\n" );
	  }
	} 
	echo( "<tr>
	<td class=\"ligne\">date vaccination</div></td>
	<td class=\"ligne\">éleveur</div></td>
	<td class=\"ligne\">zonne/lieu</div></td>
	<td class=\"ligne\">Brebis</div></td>
	<td class=\"ligne\">Béliers</div></td>
	<td class=\"ligne\">Antenais</div></td>
	<td class=\"ligne\">Antenaises</div></td>
	<td class=\"ligne\">Agneaux</div></td>
	<td class=\"ligne\">Agnelles</div></td>
	<td class=\"ligne\">Caprins</div></td>
	<td class=\"ligne\">dose perdues</td>
	<td class=\"ligne\">certificat</td>
	<td class=\"ligne\">Mod</div></td>
	<td class=\"ligne\">Sup</div></td>
	</tr>" );
	echo( "</table><br>\n" );
	mysql_free_result($requete);
	}
	function REGVACCB1 ($TITRE,$AVN,$avn,$col0,$col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$DPVAC,$elv,$comm,$datejour1,$datejour2) 
	{
	$query_liste = "SELECT * FROM regvac where $AVN='$avn'order by AVN";
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	echo "<H2 align=\"center\">$TITRE".$_SESSION["USER"]." </H2>";
	echo "<H3 align=\"center\">"." DU ".$this->dateUS2FR($datejour1)." AU ". $this->dateUS2FR($datejour2)."  </H3>";
	echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
	echo( "<tr>
	<td class=\"ligne\">date vaccination</div></td>
	<td class=\"ligne\">éleveur</div></td>
	<td class=\"ligne\">zonne/lieu</div></td>
	<td class=\"ligne\">Brebis</div></td>
	<td class=\"ligne\">Béliers</div></td>
	<td class=\"ligne\">Antenais</div></td>
	<td class=\"ligne\">Antenaises</div></td>
	<td class=\"ligne\">Agneaux</div></td>
	<td class=\"ligne\">Agnelles</div></td>
	<td class=\"ligne\">Caprins</div></td>
	<td class=\"ligne\">dose perdues</td>
	<td class=\"ligne\">certificat</td>
	<td class=\"ligne\">Mod</div></td>
	<td class=\"ligne\">Sup</div></td>
	</tr>" ); 
	while( $result = mysql_fetch_array( $requete ) )
	{
	 if($result[$col2]!=0 or $result[$col3]!=0 or $result[$col4]!=0 or $result[$col5]!=0 or $result[$col6]!=0 or $result[$col7]!=0 or $result[$col8]!=0) 
	  {
		echo( "<tr class=\"resultat\" >\n" );
		echo( "<td><div align=\"center\">".$this->dateUS2FR($result[$col1])."</div></td>\n" );
		echo( "<td><div align=\"left\">".$this->avntonom('vaccinvet',$result["AVN"])."</div></td>\n" );
		echo( "<td><div align=\"left\">".$this ->nbrtocom3('vacccinvet','comm',$result[$comm])."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col2]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col3]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col4]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col5]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col6]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col7]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col8]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$DPVAC]."</div></td>\n" );
		echo( "<td><div align=\"center\">"."<a title=\"Duplicata certificat \" href=\"./1VAC/CERT.PHP?IDVAC=".$result[$col0]."&DATE=".$result[$col1]."&ELEV=".$result[28]."&vac2=".$result[$col2]."&vac3=".$result[$col3]."&vac4=".$result[$col4]."&vac5=".$result[$col5]."&vac6=".$result[$col6]."&vac7=".$result[$col7]."      \"><img src='./images/window-new.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
		echo( "<td><div align=\"center\">"."<a title=\"Modification\" href=\"index.php?uc=MODVAC&IDVAC=".$result[$col0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
		echo( "<td><div align=\"center\">"."<a title=\"Suppression\" href=\"index.php?uc=SUPVAC&IDVAC=".$result[$col0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
		echo( "</tr>\n" );
	  }
	} 
	echo( "<tr>
	<td class=\"ligne\">date vaccination</div></td>
	<td class=\"ligne\">éleveur</div></td>
	<td class=\"ligne\">zonne/lieu</div></td>
	<td class=\"ligne\">Brebis</div></td>
	<td class=\"ligne\">Béliers</div></td>
	<td class=\"ligne\">Antenais</div></td>
	<td class=\"ligne\">Antenaises</div></td>
	<td class=\"ligne\">Agneaux</div></td>
	<td class=\"ligne\">Agnelles</div></td>
	<td class=\"ligne\">Caprins</div></td>
	<td class=\"ligne\">dose perdues</td>
	<td class=\"ligne\">certificat</td>
	<td class=\"ligne\">Mod</div></td>
	<td class=\"ligne\">Sup</div></td>
	</tr>" );
	echo( "</table><br>\n" );
	mysql_free_result($requete);
	}
   function REGVACAR ($TITRE,$AVN,$avn,$col0,$col1,$col16,$col17,$col18,$col19,$col20,$col21,$DPVAA,$elv,$comm,$datejour1,$datejour2) 
   {
	$query_liste = "SELECT * FROM regvac where $AVN='$avn'  order by datevac ";
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	echo "<H2 align=\"center\">$TITRE".$_SESSION["USER"]." </H2>";
	echo "<H3 align=\"center\">"." DU ".$this->dateUS2FR($datejour1)." AU ". $this->dateUS2FR($datejour2)."  </H3>";
	echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
	echo( "<tr>
	<td class=\"ligne\">date vaccination</div></td>
	<td class=\"ligne\">éleveur</div></td>
	<td class=\"ligne\">zonne/lieu</div></td>
	<td class=\"ligne\">Vaches Laitières</div></td>
	<td class=\"ligne\">Génisses</div></td>
	<td class=\"ligne\">Taureaux</div></td>
	<td class=\"ligne\">Taurillons</div></td>
	<td class=\"ligne\">Veaux</div></td>
	<td class=\"ligne\">Velles</div></td>
	<td class=\"ligne\">dose perdues</td>
	<td class=\"ligne\">Mod</div></td>
	<td class=\"ligne\">Sup</div></td>
	</tr>" );
	while( $result = mysql_fetch_array( $requete ) )
	{
	if($result[$col16]!=0 or $result[$col17]!=0 or $result[$col18]!=0 or $result[$col19]!=0 or $result[$col20]!=0 or $result[$col21]!=0 ) 
	   {
		echo( "<tr class=\"resultat\" >\n" );
		echo( "<td><div align=\"center\">".$this->dateUS2FR($result[$col1])."</div></td>\n" );
		echo( "<td><div align=\"left\">".$result[$elv]."</div></td>\n" );
		echo( "<td><div align=\"left\">".$this ->nbrtocom3('vacccinvet','comm',$result[$comm])."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col16]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col17]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col18]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col19]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col20]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col21]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$DPVAA]."</div></td>\n" );
		echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=MODVAC&IDVAC=".$result[$col0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
		echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=SUPVAC&IDVAC=".$result[$col0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
		echo( "</tr>\n" );
	   }
	} 
	echo( "<tr>
	<td class=\"ligne\">date vaccination</div></td>
	<td class=\"ligne\">éleveur</div></td>
	<td class=\"ligne\">zonne/lieu</div></td>
	<td class=\"ligne\">Vaches Laitières</div></td>
	<td class=\"ligne\">Génisses</div></td>
	<td class=\"ligne\">Taureaux</div></td>
	<td class=\"ligne\">Taurillons</div></td>
	<td class=\"ligne\">Veaux</div></td>
	<td class=\"ligne\">Velles</div></td>
	<td class=\"ligne\">dose perdues</td>
	<td class=\"ligne\">Mod</div></td>
	<td class=\"ligne\">Sup</div></td>
	</tr>" );
	echo( "</table><br>\n" );
	mysql_free_result($requete);
   }
	function REGVACAR1 ($TITRE,$AVN,$avn,$col0,$col1,$col16,$col17,$col18,$col19,$col20,$col21,$DPVAA,$elv,$comm,$datejour1,$datejour2) 
   {
	$query_liste = "SELECT * FROM regvac where $AVN='$avn' order by AVN ";
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	echo "<H2 align=\"center\">$TITRE".$_SESSION["USER"]." </H2>";
	echo "<H3 align=\"center\">"." DU ".$this->dateUS2FR($datejour1)." AU ". $this->dateUS2FR($datejour2)."  </H3>";
	echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
	echo( "<tr>
	<td class=\"ligne\">date vaccination</div></td>
	<td class=\"ligne\">éleveur</div></td>
	<td class=\"ligne\">zonne/lieu</div></td>
	<td class=\"ligne\">Vaches Laitières</div></td>
	<td class=\"ligne\">Génisses</div></td>
	<td class=\"ligne\">Taureaux</div></td>
	<td class=\"ligne\">Taurillons</div></td>
	<td class=\"ligne\">Veaux</div></td>
	<td class=\"ligne\">Velles</div></td>
	<td class=\"ligne\">dose perdues</td>
	<td class=\"ligne\">Mod</div></td>
	<td class=\"ligne\">Sup</div></td>
	</tr>" );
	while( $result = mysql_fetch_array( $requete ) )
	{
	if($result[$col16]!=0 or $result[$col17]!=0 or $result[$col18]!=0 or $result[$col19]!=0 or $result[$col20]!=0 or $result[$col21]!=0 ) 
	   {
		echo( "<tr class=\"resultat\" >\n" );
		echo( "<td><div align=\"center\">".$this->dateUS2FR($result[$col1])."</div></td>\n" );
		echo( "<td><div align=\"left\">".$this->avntonom('vaccinvet',$result["AVN"])."</div></td>\n" );
		echo( "<td><div align=\"left\">".$this ->nbrtocom3('vacccinvet','comm',$result[$comm])."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col16]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col17]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col18]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col19]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col20]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$col21]."</div></td>\n" );
		echo( "<td><div align=\"center\">".$result[$DPVAA]."</div></td>\n" );
		echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=MODVAC&IDVAC=".$result[$col0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
		echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=SUPVAC&IDVAC=".$result[$col0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
		echo( "</tr>\n" );
	   }
	} 
	echo( "<tr>
	<td class=\"ligne\">date vaccination</div></td>
	<td class=\"ligne\">éleveur</div></td>
	<td class=\"ligne\">zonne/lieu</div></td>
	<td class=\"ligne\">Vaches Laitières</div></td>
	<td class=\"ligne\">Génisses</div></td>
	<td class=\"ligne\">Taureaux</div></td>
	<td class=\"ligne\">Taurillons</div></td>
	<td class=\"ligne\">Veaux</div></td>
	<td class=\"ligne\">Velles</div></td>
	<td class=\"ligne\">dose perdues</td>
	<td class=\"ligne\">Mod</div></td>
	<td class=\"ligne\">Sup</div></td>
	</tr>" );
	echo( "</table><br>\n" );
	mysql_free_result($requete);
   }
}


?>
