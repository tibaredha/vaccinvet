<?PHP
function donparmois($AVN,$datejour1,$datejour2) //datedon donparmois
{
 $db_host="localhost";
 $db_name="vaccinvet"; 
 $db_user="root";
 $db_pass="";
 $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
 $db  = mysql_select_db($db_name,$cnx) ;
 mysql_query("SET NAMES 'UTF8' "); 
 $sql = " select datevac,vacb1,vacb2,vacb3,vacb4,vacb5,vacb6,AVN from regvac where AVN ='$AVN'and datevac >='$datejour1'and datevac <='$datejour2'";
 $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
 $OP=mysql_num_rows($requete);
 mysql_free_result($requete);
 return $OP;
}

function donparmoisd($AVN,$datejour1,$datejour2) //datedon donparmois
{
 $db_host="localhost";
 $db_name="vaccinvet"; 
 $db_user="root";
 $db_pass="";
 $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
 $db  = mysql_select_db($db_name,$cnx) ;
 mysql_query("SET NAMES 'UTF8' "); 
 $sql = " select datevac,vacb1,vacb2,vacb3,vacb4,vacb5,vacb6,AVND from regvac where AVND ='$AVN'and datevac >='$datejour1'and datevac <='$datejour2'";
 $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
 $OP=mysql_num_rows($requete);
 mysql_free_result($requete);
 return $OP;
}

function ctomysqlcgr($GROUPAGE,$RHESUS) 
{
$db_host="localhost";
 $db_name="GPTS2012"; 
 $db_user="root";
 $db_pass="";
 $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
 $db  = mysql_select_db($db_name,$cnx) ;
 mysql_query("SET NAMES 'UTF8' "); 
$sql = " select GROUPAGE,RHESUS from cgr where GROUPAGE='$GROUPAGE' and  RHESUS='$RHESUS'";
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}

function ctomysqlpfc($GROUPAGE,$RHESUS) 
{
$db_host="localhost";
 $db_name="GPTS2012"; 
 $db_user="root";
 $db_pass="";
 $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
 $db  = mysql_select_db($db_name,$cnx) ;
 mysql_query("SET NAMES 'UTF8' "); 
$sql = " select GROUPAGE,RHESUS from pfc where GROUPAGE='$GROUPAGE' and  RHESUS='$RHESUS'";
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}

function ctomysqlcps($GROUPAGE,$RHESUS) 
{
$db_host="localhost";
 $db_name="GPTS2012"; 
 $db_user="root";
 $db_pass="";
 $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
 $db  = mysql_select_db($db_name,$cnx) ;
 mysql_query("SET NAMES 'UTF8' "); 
$sql = " select GROUPAGE,RHESUS from cps where GROUPAGE='$GROUPAGE' and  RHESUS='$RHESUS'";
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}



function ctomysql1() 
{
$db_host="localhost";
 $db_name="GPTS2012"; 
 $db_user="root";
 $db_pass="";
 $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
 $db  = mysql_select_db($db_name,$cnx) ;
 mysql_query("SET NAMES 'UTF8' "); 
$sql = " select GROUPAGE,RHESUS from tdon ";
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}


function don($GROUPAGE,$RHESUS) //datedon donparmois
{
 $db_host="localhost";
 $db_name="GPTS2012"; 
 $db_user="root";
 $db_pass="";
 $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
 $db  = mysql_select_db($db_name,$cnx) ;
 mysql_query("SET NAMES 'UTF8' "); 
 $sql = " select GROUPAGE,RHESUS from tdon WHERE GROUPAGE='$GROUPAGE' and  RHESUS='$RHESUS' ";
 $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
 $OP=mysql_num_rows($requete);
 mysql_free_result($requete);
 return $OP;
}

function NBRTETEAVND($colone,$avn) //nbr de tete par veterinaire 
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
    $result = mysql_query("SELECT SUM($colone) as $colone ,AVND FROM regvac where AVND=$avn " );
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
?>