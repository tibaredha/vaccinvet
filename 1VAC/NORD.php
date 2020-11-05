<?php
include('./SESSION/SESSION.php'); 
$IDP = $_GET["IDP"] ; 
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$sql = "SELECT * FROM elev WHERE idelev = ".$IDP ;
$requete = mysql_query( $sql ) ; 
if( $result = mysql_fetch_object( $requete ) )
{
$per ->h(2,80,180,'ORDONNANCE  Dr: '.$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"]);
$per -> sautligne (10);
//$per ->f0('./1VAC/FVACELEV.php','post','formGCS');
$per ->f0('./1VAC/FORD.php','post','formGCS');
$per ->submit(1150,250,'IMPRIMER ORDONNANCE');
$per ->label(80,250,'* BILAN N°:');                                                     $per ->txt(200,250,'bilan',10,'0');
$per ->label(300,250,'* N°:');                                                          $per ->txt(338,250,'N',6,'0');
$per ->label(450,250,'* Date/Heure');                                                   $per ->txt(580,250,'a1',20,date('Y-m-d')); $per ->txt(740,250,'a2',2,date("H:i"));
$per ->label(80,280,'Nom Eleveur :<strong> '.$result->nomelev.'</strong>');             $per ->hide(200,280,'a3',29,$result->nomelev);
$per ->label(450,280,'Prenom Eleveur : <strong> '.$result->prenomelev.'</strong>');     $per ->hide(580,280,'a4',29,$result->prenomelev);
$per ->label(1000,280,'Fils De : <strong> '.$result->filsde.'</strong>' );              $per ->hide(1065,280,'a5',29,$result->filsde);
$per ->label(80,310,'N°CIN/PC : <strong> '.$result->nicnpc .'</strong>');               $per ->hide(200,310,'a6',29,$result->nicnpc);
$per ->label(450,310,'Delivre Le : <strong> '.$per->dateUS2FR($result->delivre).'</strong>');                   $per ->hide(580,310,'a7',20,$result->delivre);
$per ->label(800,310,'Daira De : <strong> '.$result->dairade.'</strong>');                                      $per ->hide(880,310,'a8',15,$result->dairade);
$per ->label(1000,310,'CFN: <strong> '.$result->CFN.'</strong>');                                               $per ->hide(1065,310,'a9',29,$result->CFN);
$per ->label(80,340,'Wilaya : <strong> '.$per->nbrtowil1('vaccinvet','wil',$result->WILAYAR).'</strong>');      $per ->hide(200,340,'WILAYAR',10,$result->WILAYAR);
$per ->label(450,340,'Daira : <strong> '.$per->nbrtodai('vaccinvet','dai',$result->DAIRA).'</strong>');         $per ->hide(580,340,'DAIRA',10,$result->DAIRA);
$per ->label(800,340,'Commune : <strong> '.$per->nbrtocom3('vaccinvet','comm',$result->COMMUNER).'</strong>');  $per ->hide(880,340,'COMMUNER',10,$result->COMMUNER);                
$per ->label(1000,340,'Adresse : <strong> '.$result->ADRESSE);                                                  $per ->hide(1065,340,'ADRESSE',29,$result->ADRESSE);           
$per ->hide(10,10,'WIL',20,$_SESSION["WILAYA"]);
$per ->hide(10,10,'DAI',20,$_SESSION["DAIRA"]);
$per ->hide(10,10,'COM',20,$_SESSION["COMMUNE"]);
$per ->hide(10,10,'AVND',20,$_SESSION["AVND"]);
$per ->hide(10,10,'AVNW',20,$_SESSION["AVNW"]);
echo"<BR>";
// echo "<table width=\"90%\" border=\"1\" cellpadding=\"1\" cellspacing=\"0\" align=\"center\">";
// $per ->ENTETEVACCIN ("TYPE VACCIN","Brebis","Béliers","Antenais","Antenaisses","Agneaux","Agnelles","Caprins","Total","Doses Perdues") ; 
// $per ->LIGNEVACCIN ("ANTI-CLAVELEUSE","b1","b2","b3","b4","b5","b6","b7","b8","DPb","CLAVELEUSE") ;
// $per ->LIGNEVACCIN ("ANTI-BRUCELLIQUE","c1","c2","c3","c4","c5","c6","c7","c8","DPc","BRUCELLIQUE") ;
// $per ->LIGNEVACCIN ("PPR","x1","x2","x3","x4","x5","x6","x7","x8","DPx","PESTE") ;
// echo "</table>";
// echo"<BR>";
// echo "<table width=\"90%\" border=\"1\" cellpadding=\"1\" cellspacing=\"0\" align=\"center\">";
// $per ->ENTETEVACCIN1 ("TYPE VACCIN","Vaches Laitières","Génisses","Taureaux","Taurillons","Veaux","Velles","Total","Doses Perdues") ; 
// $per ->LIGNEVACCIN1 ("ANTI-APHTEUSE","d1","d2","d3","d4","d5","d6","d7","DPd","APHTEUSE") ;
// $per ->LIGNEVACCIN1 ("ANTI-RABIQUE","e1","e2","e3","e4","e5","e6","e7","DPe","RABIQUE") ;
// echo "</table>";
$per ->f1();
// $ctrl="";
// $URL="";
// echo '<div class="listl">';
// echo'<form  action="'.$URL.$ctrl.'/ajouterArticle/" method="post">';
// echo '<div id="inner-grid">';
// echo '<div id="a">DCI Produit  </div>';           
// echo '<div id="a1">';
//html::medicamentx("libelleProduit","","Choisir un produit");
// echo '</div>';                     
// echo '<div id="b">Dose et présentation</div>';    echo '<div id="b1">';echo '<input  class ="med" type="text" name="doseparprise"       value="1"/></div>';
// echo '<div id="c">Nbr par jours</div>';           echo '<div id="c1">';echo '<input  class ="med" type="text" name="nbrdrfoisparjours"  value="1"/></div>';
// echo '<div id="d">Durée en Jours</div>';          echo '<div id="d1">';echo '<input  class ="med" type="text" name="nbrdejours"         value="10"/></div>';
// echo '<div id="e">Nbr de boites</div>';           echo '<div id="e1">';echo '<input  class ="med" type="text" name="qteProduit"         value="1"/></div>';
// echo '<div id="f">Prix par boite (Da)</div>';     echo '<div id="f1">';echo '<input  class ="med" type="text" name="prixProduit"        value="1"/></div>';
// echo '<div id="g">Date préscription</div>';       echo '<div id="g1">';echo '<input  class ="med"  id="date"  type="text" name="DATE"   value="'.date('d-m-Y').'"/></div>';
//echo '<input  type="hidden" name="id"  value="'.$this->user[0]['id'].'"/>';
//echo '<input  type="hidden" name="STR" value="'.Session::get('structure').'"/>';
// echo '<div id="h"><input id="dd" onclick="playSound()"  type="submit" value="Envoyer"/> </div>'; 
// echo '<div id="a2">';echo 'Ordonnance </div>';
//echo '<div id="b2">';echo 'Nom et prénom : <a href="'.URL.'emg/search/0/10?o=IDELEVE&q='.$this->user[0]['id'].'">'.$this->user[0]['NOM'].'_'.$this->user[0]['PRENOM'].' </a></div>';
// echo '<div id="c2">';echo 'Libellé</div>';echo '<div id="c3">';echo 'Dose</div>';echo '<div id="c4">';echo 'Nbr</div>';echo '<div id="c5">';echo 'Jours</div>';echo '<div id="c6">';echo 'Quantite</div>';echo '<div id="c7">';echo 'Prix</div>';echo '<div id="c8">';echo 'Action</div>';
// echo '<div id="d20">';echo '</div>'; echo '<div id="d30">';echo '</div>'; echo '<div id="d40">';echo '</div>';echo '<div id="d50">';echo '</div>';echo '<div id="d60">';echo '</div>';echo '<div id="d70">';echo '</div>';echo '<div id="d80">';echo '</div>';
// echo '<div id="d21">';echo '</div>'; echo '<div id="d31">';echo '</div>'; echo '<div id="d41">';echo '</div>';echo '<div id="d51">';echo '</div>';echo '<div id="d61">';echo '</div>';echo '<div id="d71">';echo '</div>';echo '<div id="d81">';echo '</div>';
// echo '<div id="d22">';echo '</div>'; echo '<div id="d32">';echo '</div>'; echo '<div id="d42">';echo '</div>';echo '<div id="d52">';echo '</div>';echo '<div id="d62">';echo '</div>';echo '<div id="d72">';echo '</div>';echo '<div id="d82">';echo '</div>';
// echo '<div id="d23">';echo '</div>'; echo '<div id="d33">';echo '</div>'; echo '<div id="d43">';echo '</div>';echo '<div id="d53">';echo '</div>';echo '<div id="d63">';echo '</div>';echo '<div id="d73">';echo '</div>';echo '<div id="d83">';echo '</div>';
// echo '<div id="d24">';echo '</div>'; echo '<div id="d34">';echo '</div>'; echo '<div id="d44">';echo '</div>';echo '<div id="d54">';echo '</div>';echo '<div id="d64">';echo '</div>';echo '<div id="d74">';echo '</div>';echo '<div id="d84">';echo '</div>';
// echo '<div id="d25">';echo '</div>'; echo '<div id="d35">';echo '</div>'; echo '<div id="d45">';echo '</div>';echo '<div id="d55">';echo '</div>';echo '<div id="d65">';echo '</div>';echo '<div id="d75">';echo '</div>';echo '<div id="d85">';echo '</div>';
// echo '<div id="d26">';echo '</div>'; echo '<div id="d36">';echo '</div>'; echo '<div id="d46">';echo '</div>';echo '<div id="d56">';echo '</div>';echo '<div id="d66">';echo '</div>';echo '<div id="d76">';echo '</div>';echo '<div id="d86">';echo '</div>';
// if ( rds::creationPanier() )
// {
      // $nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
	  // if ( $nbArticles <= 7  )
	  // {
		   // for ($i=0 ;$i < $nbArticles ; $i++)
		   // {
		   // echo '<div id="d2'.$i.'">';echo ($i+1) .'-'. View::nbrtostring('pharmacie','id',$_SESSION['ordonnace']['libelleProduit'][$i],'dci').'  '.View::nbrtostring('pharmacie','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre');echo '</div>';
		   // echo '<div id="d3'.$i.'">';echo htmlspecialchars($_SESSION['ordonnace']['doseparprise'][$i]);echo '</div>';
		   // echo '<div id="d4'.$i.'">';echo htmlspecialchars($_SESSION['ordonnace']['nbrdrfoisparjours'][$i]);echo '</div>';
		   // echo '<div id="d5'.$i.'">';echo htmlspecialchars($_SESSION['ordonnace']['nbrdejours'][$i]);echo '</div>';
		   // echo '<div id="d6'.$i.'">';echo htmlspecialchars($_SESSION['ordonnace']['qteProduit'][$i]);echo '</div>';
		   // echo '<div id="d7'.$i.'">';echo htmlspecialchars($_SESSION['ordonnace']['prixProduit'][$i]);echo '</div>';
		   // echo '<div id="d8'.$i.'">';echo "<a href=\"".URL."rds/supprimerArticle/".$_SESSION['ordonnace']['libelleProduit'][$i]."/".$this->user[0]['id']."\">X</a>" ;echo '</div>';  
		   // }
      // }

// }
//echo '<div id="e2">';echo 'Nombre total de médicament : '.rds::compterArticles().'</div>';
//echo '<div id="e3">';echo '<a href="'.URL.'rds/supprimePanier/'.$this->user[0]['id'].'">Annuler</a>';echo '</div>';
// echo '<div id="e4">';echo 'Nbr</div>';
// echo '<div id="e5">';echo 'Jours</div>';
// echo '<div id="e6">';echo 'Quantite</div>';
//echo '<div id="e7">';echo rds::MontantGlobal().'</div>';
//echo '<div id="e8">';echo '<a href="'.URL.'tcpdf/rds/ord.php?uc='.$this->user[0]['id'].'">Imprimer</a>';echo '</div>';
// echo '</div>';
// echo'</form>';
// $x=450;
// $y=370;
// echo "<div  style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
// echo"<table width='97%' border='1' cellpadding='5' cellspacing='1' align='left'>";
// echo"<tr><th colspan=\"7\">Votre Ordonnance (max 07 medicaments) </th></th>";echo"<tr>";
// echo"<tr>";
// echo'<th colspan="7"><a href="'.URL.'emg/search/0/10?o=IDELEVE&q='.$this->user[0]['id'].'">'.$this->user[0]['NOM'].'_'.$this->user[0]['PRENOM'].' </a></th>';
//echo 'Imprimer';echo '&nbsp;'; 
// echo"<tr>";
// echo"<th style=\"width:700px;\"    id=\"tiba\" >Libellé</th>";
// echo"<th>Dose</th>";
// echo"<th>Nbr/jours</th>";
// echo"<th>jours</th>";
// echo"<th>Quantite </th>";
// echo"<th>Prix</th>";
// echo"<th>Action</th>";
// echo"</tr>";
// echo"</tr>";
	
	// if ( rds::creationPanier()  )
	// {
	   // $nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
	   // if ($nbArticles <= 0)
	   // {
	   //echo '<tr bgcolor="#F0FFF0" ><td align="center" colspan="7" >Votre Ordonnance est vide </ td></tr>';
	   // }
	   // else
	   // {
	      // for ($i=0 ;$i < $nbArticles ; $i++)
	      // {
	         // echo '<tr  bgcolor="#F0FFF0" >';
	         // echo "<td>".View::nbrtostring('pharmacie','id',$_SESSION['ordonnace']['libelleProduit'][$i],'dci').'  '.View::nbrtostring('pharmacie','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre')."</ td>";
	         // echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['doseparprise'][$i])."</ td>";
	         // echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['nbrdrfoisparjours'][$i])."</ td>";
	         // echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['nbrdejours'][$i])."</ td>";
	         // echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['qteProduit'][$i])."</ td>";	          
			 // echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['prixProduit'][$i])."</ td>";	          
			 // echo "<td align=\"center\" ><div id=\"smenux\"><a href=\"".URL."rds/supprimerArticle/".$_SESSION['ordonnace']['libelleProduit'][$i]."/".$this->user[0]['id']."\">X</a></div></td>";  
			 // echo "</tr>";
	      // }
	     
		// echo '<tr bgcolor="#98F5FF" ><td colspan="7">'; 
		// echo "Nombre total de medicament : ".rds::compterArticles();
		// echo "</td>";	     
		// echo "</tr>";
		// echo '<tr bgcolor="#98F5FF"     ><td colspan="3">Montant total'; 
		// $ttc=rds::MontantGlobal()*1;
		// echo "</td>";
	    // echo "<td colspan=\"4\">";
	    // echo "Total TTC: ".$ttc." DA ";
	    // echo "</td>";
		// echo "</tr>";						
		// echo '<tr  bgcolor="#F0F8FF" >';//
		     
			  // echo "<td align=\"center\"   colspan=\"3\">";
			  // echo '<div id="smenux">';
			  // echo '&nbsp;'; echo '<a href="'.URL.'rds/supprimePanier/'.$this->user[0]['id'].'">Annuler</a>';echo '&nbsp;'; 
			  // echo "</div>";
			  // echo "</td>";
			  // echo "<td  align=\"center\" colspan=\"4\">";
			  // echo '<div id="smenux">';
			  // echo '<a href="'.URL.'tcpdf/rds/ord.php?uc='.$this->user[0]['id'].'">Imprimer</a>';echo '&nbsp;'; 
			  // echo "</div>";
			  // echo "</td>";
			  
		// echo "</tr>";	  
	   // }
	   //echo"<tr><th colspan=\"7\">Votre Ordonnance (max 07 medicaments) </th></th>";
	// }
// echo"</table>"	;
// echo "</div>";
// echo "</div>";
$per ->label(80,590,'(*)champ obligatoire'); 
}
?>