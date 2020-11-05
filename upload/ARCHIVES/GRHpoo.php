<?php
//classe tcpdf 
class GRH extends TCPDF

{
    function connection ($CATEGORIE) 
    {
    $db_host="localhost";
    $db_name="grh"; 
    $db_user="root";
    $db_pass="";
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
	//jai ajouter le guillemet $CATEGORIE pour quil accept string 
    $query = "SELECT service.servicear as service,grh.ECHELON,grh.CATEGORIE,grh.RELIQUAT,grh.DATEDEFFET,grh.INDICE,grh.DATEDECISION,grh.NDECISION,grh.Nomlatin as Nomlatin ,grh.Prenom_Latin as Prenom_Latin,grh.Commune_Naissancear as Commune_Naissancear,grh.Sexe as Sexe ,grh.Date_Naissance as Date_Naissance ,grh.Prenom_Arabe as Prenom_Arabe,grh.Nomarab as Nomarab ,grh.idp as idp,grade.gradear as gradear FROM grh,grade,service where  grade.idg=grh.rnvgradear and  service.ids=grh.servicear  and CATEGORIE='$CATEGORIE' order by ECHELON";
    $resultat=mysql_query($query);
    $totalmbr1=mysql_num_rows($resultat);
    return $resultat;
    }
	function totalmbr1 ($CATEGORIE) 
    {
    $db_host="localhost";
    $db_name="grh"; 
    $db_user="root";
    $db_pass="";
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
	//jai ajouter le guillemet $CATEGORIE pour quil accept string 
    $query = "SELECT service.servicear as service,grh.ECHELON,grh.CATEGORIE,grh.RELIQUAT,grh.DATEDEFFET,grh.INDICE,grh.DATEDECISION,grh.NDECISION,grh.Nomlatin as Nomlatin ,grh.Prenom_Latin as Prenom_Latin,grh.Commune_Naissancear as Commune_Naissancear,grh.Sexe as Sexe ,grh.Date_Naissance as Date_Naissance ,grh.Prenom_Arabe as Prenom_Arabe,grh.Nomarab as Nomarab ,grh.idp as idp,grade.gradear as gradear FROM grh,grade,service where  grade.idg=grh.rnvgradear and  service.ids=grh.servicear  and CATEGORIE='$CATEGORIE' order by ECHELON";
    $resultat=mysql_query($query);
    $totalmbr1=mysql_num_rows($resultat);
    return $totalmbr1;
    }
	function row($resultat)//resulta/
    {
	
	 while($row=mysql_fetch_object($resultat))
     {
      $this->cell(10,7,"",1,0,'R',0);//5  =hauteur de la cellule origine =7
      $this->cell(20,7,$row->Nomarab,1,0,'R',0);//5  =hauteur de la cellule origine =7
      $this->cell(20,7,$row->Prenom_Arabe,1,0,'R',0);
      $this->cell(30,7,$row->DATEDECISION."*".$row->NDECISION,1,0,'C',0);
      $this->cell(12,7,$row->ECHELON,1,0,'C',0);
      $this->cell(25,7,$row->INDICE,1,0,'C',0);
      $this->cell(22,7,$row->DATEDEFFET,1,0,'C',0);
      $this->cell(36,7,$row->RELIQUAT,1,0,'C',0);
      $this->cell(36,7,"",1,0,'C',0);
      $this->cell(30,7,"",1,0,'C',0);
      $this->SetXY(05,$this->GetY()+7); 
     }		
	}
	//entete
    function entete()
    {
    $this->SetFont('aefurat', '', 12);
    $this->Text(120,10,"الجمهورية الجزائرية الديمقراطية الشعبيـة");
    $this->Text(115,20,"وزارة الصحة و السكان و إصلاح المستشفيات");
    $this->Text(05,30,"مديرية الصحة و السكان لولاية الجلفة");
    $this->Text(05,40,"المؤسسة العمومية الاستشفائية عين وسارة");
    $this->Text(05,50,"المديرية الفرعية للموارد البشرية ");
    $this->Text(05,60," الرقم:......./");
    

    }
	
function titre($c)
    {
    
    $this->SetXY(120,70);
    $this->Cell(65,15,'الترقية فى الدرجات للصنف: '.$c,1,1,'C');
    
    }	

function entetetableau($CAT)
{
$h2=90;
$h1=105;
$h=110;
$this->SetXY(05,$h2);
$this->cell(20,11,"الصنف:".$CAT,1,0,'C',1,0);
$this->SetXY(05,$h1); 	  
$this->cell(10,11,"الرقم",1,0,'C',1,0);
$this->SetXY(15,$h1); 	  
$this->cell(20,11,"اللقب",1,0,'C',1,0);
$this->SetXY(35,$h1); 	  
$this->cell(20,11,"الاسم",1,0,'C',1,0);
$this->SetXY(55,$h1); 	  
$this->cell(89,05,"اخر ترقية فى الرتبة التالية",1,0,'C',1,0);
$this->SetXY(55,$h); 	  
$this->cell(30,05,"رقم و تاريخ المقرر",1,0,'C',1,0);
$this->SetXY(85,$h); 	  
$this->cell(12,05,"الدرجة",1,0,'C',1,0);
$this->SetXY(97,$h); 	  
$this->cell(25,05,"الرقم الاستدلالى",1,0,'C',1,0);
$this->SetXY(122,$h); 	  
$this->cell(22,05,"تاريخ النفاد",1,0,'C',1,0);
$this->SetXY(144,$h1); 	  
$this->cell(36,05,"الاقدمية المحتفض بها",1,0,'C',1,0);

$this->SetXY(144,$h); 	  
$this->cell(12,05,"يوم",1,0,'C',1,0);
$this->SetXY(156,$h); 	  
$this->cell(12,05,"شهر",1,0,'C',1,0);
$this->SetXY(168,$h); 	  
$this->cell(12,05,"سنة",1,0,'C',1,0);
$this->SetXY(180,$h1); 	  
$this->cell(36,05,"الاقدمية  الجديدة",1,0,'C',1,0);

$this->SetXY(180,$h); 	  
$this->cell(12,05,"يوم",1,0,'C',1,0);
$this->SetXY(192,$h); 	  
$this->cell(12,05,"شهر",1,0,'C',1,0);
$this->SetXY(204,$h); 	  
$this->cell(12,05,"سنة",1,0,'C',1,0);
$this->SetXY(216,$h1); 	  
$this->cell(30,11,"النقطة السنوية",1,0,'C',1,0); 
$this->SetXY(05,116); // marge sup 13   

    }
}	