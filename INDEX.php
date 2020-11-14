<?php
include("./class/class.php");
include("./CONNEC/Connec.php" );
$per = new vet();
//**************************************//
if(isset($_SESSION['USER']))
{
	if($_SESSION["ADMIN"] =='0')
	{
	include("vue/MENU.php") ;     
	}
    if($_SESSION["ADMIN"] =='1')
	{
	include("vue/MENUD.php") ;     
	}
    if($_SESSION["ADMIN"] =='2')
	{
	include("vue/MENUW.php") ;     
	}	
}
else
{
include("vue/MENU0.php") ;
}

//****************************************//
if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

switch($uc) 
{
    //BILAN ACTIVITE MENSUEL
	case 'BAMAN' :{include("./BAM/BAMAN.php");break;};		
	case 'BAMAN1' :{include("./BAM/BAMAN1.php");break;};		
	case 'BAMAV' :{include("./BAM/BAMAV.php");break;};		
	case 'BAMAV1' :{include("./BAM/BAMAV1.php");break;};		
	case 'BAMAP' :{include("./BAM/BAMAP.php");break;};		
	case 'BAMAP1' :{include("./BAM/BAMAP1.php");break;};		
	case 'BAMAC' :{include("./BAM/BAMAC.php");break;};		
	case 'BAMAC1' :{include("./BAM/BAMAC1.php");break;};		
	case 'BAMD' :{include("./BAM/BAMD.php");break;};		
    case 'DPCV' :{include("./DPCV/NVAC.php");break;};	
	case 'accueil':{include("VUE/accueil.php");break;};	
	case 'help':{include("VUE/help.php");break;};	
	case 'vaccinvet':{include("VUE/vaccinvet.php");break;};	
	case 'M':{include("./CHART/GRAPHEDON.php");break;};		
	//CONNECTION INSCRIPTION
	case 'CONNECTION':{include("./CONNEC/CON1.php");break;}	
	case 'CONN2':{include("./CONNEC/CON2.php");break;}			
	case 'INSCRIPTION':{include("./CONNEC/INS1.php");break;}		
	case 'INS2':{include("./CONNEC/INS2.php");break;}				
	case 'AJOUTVETE':{include("./CONNEC/AJOUT.php");break;}			
	case 'AJOUTVETE1':{include("./CONNEC/AJOUT1.php");break;}			
	case 'CONF':{include("./CONNEC/CONF.php");break;}		
	case 'CONF1':{include("./CONNEC/CONF1.php");break;}			
	case 'MOD':{include("./CONNEC/MOD.php");break;}		
	case 'MOD1':{include("./CONNEC/MOD1.php");break;}			
	case 'SUP':{include("./CONNEC/SUP.php");break;}		
	case 'SUP1':{include("./CONNEC/SUP1.php");break;}			
	case 'DECONNECTION':{include("SESSION/DECON.php");break;}		
	//partie coordination
	 case 'MBRINS':{include("./CONNEC/LISTINS.php");break;}	
	case 'ACTCOO':{include("./CONNEC/ACTCOO.php");break;} // ACTIVE coordinateur		 
    case 'ACTCOO1':{include("./CONNEC/ACTCOO1.php");break;} 		
    case 'DCONFC':{include("./CONNEC/DCONFC.php");break;}//DESACTIVE coordinateur		
	case 'DCONF1C':{include("./CONNEC/DCONF1C.php");break;}		
	
	case 'CONFD':{include("./CONNEC/CONFD.php");break;}		
	case 'CONFD1':{include("./CONNEC/CONFD1.php");break;}		
    case 'DCONF':{include("./CONNEC/DCONF.php");break;}		
	case 'DCONF1':{include("./CONNEC/DCONF1.php");break;}	
	//partie wilaya
	case 'MBRDEM':{include("./CONNEC/LISTDEM.php");break;}	
	case 'OKDEM':{include("./DPCV/CC0.php");break;}	
	case 'VETECON':{include("./CONNEC/UOL.php");break;}	
	
	//ELEVEUR
	case 'NELEV' :{include("./1ELEV/NELEV.php");break;};	
    case 'NELEV1' :{include("./1ELEV/NELEV1.php");break;};	
	case 'LELEV' :{include("./1ELEV/LISTELVE.php");break;};	
	case 'SUPELEV' :{include("./1ELEV/SUP.php");break;};	
	case 'SUPELEV1' :{include("./1ELEV/SUP1.php");break;};	
	
	//NOUVELLE VACCINATION 
	case 'NVAC' :{include("./1VAC/NVAC.php");break;};		
	case 'NVACELEV' :{include("./1VAC/NVACELEV.php");break;};		
	
	//ordonnace
	case 'NORD' :{include("./1VAC/NORD.php");break;};
	case 'NORD1' :{include("./1VAC/NORD1.php");break;};
	case 'NMED' :{include("./1VAC/NMED.php");break;};
	case 'NMED1' :{include("./1VAC/NMED1.php");break;};
	
	case 'SUPMED' :{include("./1VAC/SUPMED.php");break;};
	case 'SUPORD' :{include("./1VAC/SUPORD.php");break;};
	
	
	//vaccination canides
	case 'NVACC' :{include("./1VAC/NVACC.php");break;};	
	
	
	
	//REGISTRE VACCINATION
	case 'VAC' :{include("./1VAC/VAC.php");break;};		
	case 'VACC' :{include("./1VAC/VACC.php");break;};		
	case 'VACD' :{include("./1VAC/VACD.php");break;};		
	case 'VACW' :{include("./1VAC/VACW.php");break;};			
	case 'VAB' :{include("./1VAC/VAB.php");break;};			
	case 'VAA' :{include("./1VAC/VAA.php");break;};		
	case 'VAR' :{include("./1VAC/VAR.php");break;};			
	case 'REGVAC0' :{include("./1VAC/REGVAC0.php");break;};		
    case 'REGVACC' :{include("./1VAC/REGVACC.php");break;};			
    case 'REGVACD' :{include("./1VAC/REGVACD.php");break;};			
    case 'REGVACW' :{include("./1VAC/REGVACW.php");break;};				
	case 'SUPVAC' :{include("./1VAC/SUPVAC.php");break;};		
	case 'SUPVAC1' :{include("./1VAC/SUPVAC1.php");break;};		
	case 'MODVAC' :{include("./1VAC/MODVAC.php");break;};		
	case 'MODVAC1' :{include("./1VAC/MODVAC1.php");break;};		
	case 'BILANVACD' :{include("./1VAC/BILANVACD.php");break;};	
	      //partie coordination
	case 'REGVAC1' :{include("./1VAC/REGVAC1.php");break;};	
	case 'VAC1' :{include("./1VAC/VAC1.php");break;};	
	case 'REGVAC2' :{include("./1VAC/REGVAC2.php");break;};	
	case 'VAC2' :{include("./1VAC/VAC2.php");break;};
	case 'REGVAC0PDF' :{include("./1VAC/REGVAC0PDF.php");break;};	
	
	//EVALUATION BILAN VACCINATION
	case 'EVAVAC' :{include("./5EVA/EVAVAC.php");break;};		
	case 'EVAVAB' :{include("./5EVA/EVAVAB.php");break;};			
	case 'EVAVAA' :{include("./5EVA/EVAVAA.php");break;};		
	case 'EVAVAF' :{include("./5EVA/EVAVAF.php");break;};		
	case 'EVAVAM' :{include("./5EVA/EVAVAM.php");break;};			
	case 'EVAVAR' :{include("./5EVA/EVAVAR.php");break;};
          //partie coordination
    case 'EVAVAAC' :{include("./5EVA/EVAVAAC.php");break;};	
    case 'ELEM':{include("./CHART/GRAPHEELE.php");break;};		
    case 'GVAC':{include("./CHART/GVAC.php");break;};		
	case 'GVAB':{include("./CHART/GVAB.php");break;};		
	case 'GVAA':{include("./CHART/GVAA.php");break;};		
	case 'GVAR':{include("./CHART/GVAR.php");break;};	

    //ABBATOIRE
    case 'AJBAT':{include("./1ABT/AJBAT.php");break;} 

	
	//ETAT DU STOCK VACCINATION
	case 'AJPRO' :{include("./5EVA/AJPRO.php");break;}		 
	case 'AJPRO1' :{include("./5EVA/AJPRO1.php");break;}		 
	case 'LISTPRO' :{include("./5EVA/LISTPRO.php");break;} 		
	case 'ENTCOM' :{include("./5EVA/ENTCOM.php");break;} 		
	case 'ETASTOC' :{include("./5EVA/ETASTOC.php");break;} 		
	case 'SORCOM' :{include("./5EVA/SORCOM.php");break;} 		
	case 'BONCOM' :{include("./5EVA/STOCK.php");break;} 		
	case 'FSTOCK' :{include("./5EVA/FICHESTOCK.php");break;}		
	
	//ETAT DU STOCK MEDICAMENTS
	case 'ENTMED' :{include("./5EVA/ENTMED.php");break;} 
	case 'ENTMED1' :{include("./5EVA/ENTMED1.php");break;} 
	case 'SUPMEDX' :{include("./5EVA/SUPMEDX.php");break;};
	case 'MODMEDX' :{include("./5EVA/MODMEDX.php");break;};
	case 'MODMEDX1' :{include("./5EVA/MODMEDX1.php");break;};
	
	
	
	
	//WILAYA DAIRA COMMUNE ADRESSE  	
    case 'AJOUTDAIRA' :{include("./WDCA/AJOUTDAIRA.php");break;}		
	case 'AJOUTDAIRA1' :{include("./WDCA/AJOUTDAIRA1.php");break;}		
	case 'AJOUTCOMMUNE' :{include("./WDCA/AJOUTCOMMUNE.php");break;}		
	case 'AJOUTCOMMUNE1' :{include("./WDCA/AJOUTCOMMUNE1.php");break;}				
	case 'WDCA' :{include("./WDCA/WDCA.php");break;}			
	case 'WDCA1' :{include("./WDCA/WDCA1.php");break;}	
	default : include("./vue/er.php"); 
}
echo "<BR>";	
echo "<div class=\"footer\">";
echo "<p>";
echo "<strong>Copyright © 2013 Dr TIBA Tous droits réservés.</strong>";
echo "<a href=\"mailto:tibaredha@yahoo.fr\">          Email    <img src=\"./IMAGES/mail_open_document.png\"></a>";
echo "<a href=\"https://www.facebook.com/redha.tiba\">facebook<img src=\"./IMAGES/pfb.png\">                </a>";
if(!isset($_SESSION["USER"]) || $_SESSION["USER"] == "")
{	 
  echo( " <strong>Vous étes Deconnecté</strong> " ); 
}
else
{
  echo( "  <strong>Vous étes Connecté "." ".$_SESSION["USER"]." "."</strong>" ); 
}
echo "</p>";
echo "</div>	";
echo "</body>";
echo "</html>";
?>