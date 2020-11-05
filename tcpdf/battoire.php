<?php
require_once('../tcpdf/config/lang/eng.php');
require_once('../tcpdf/tcpdf.php');
class bat extends TCPDF
{

    function dateUS2FR($date)
	{
	  $date = explode('-', $date);
	  $date = array_reverse($date);
	  $date = implode('/', $date);
	  return $date;
	}
    function SALUBRITE($NBOUCHER,$PBOUCHER,$ADRESSE)
    {
	
	$session=$_SESSION["USER"];
	$AVN=$_SESSION["AVN"];
	$this->Text(60,$this->GetY()+5,"الجمهـــــورية الجزائرية الديموقراطية الشعبــية");
	$this->Text(75,$this->GetY()+5,"وزارة الفلاحة و التنمية الريفية");
	$this->Text(5,$this->GetY()+5,"DIRECTIONS DES SERVICES AGRICOLES");              $this->Text(165,$this->GetY(),"مديرية المصالح الفلاحية");
	$this->Text(5,$this->GetY()+5,"INSPECTION VETERINAIRE DE LA WILAYA :DJELFA ");   $this->Text(165,$this->GetY(),"المفتشية البيطرية لولاية:");
	$this->Text(5,$this->GetY()+5,"N°REF ");$this->Text(185,$this->GetY(),"رقم المرجع");
	$this->Text(70,$this->GetY()+5," CERTIFICAT DE SALUBRITE");
	$this->Text(50,$this->GetY()+5," DES PRODUITS ANIMAUX ET D’ORIGINE ANIMALE");
	$this->Text(55,$this->GetY()+5," شهادة صحية للمنتوجات الحيوانية و/أو ذات مصدر حيواني");
	$this->Text(40,$this->GetY()+5," Loi n°88-08 du 26janvier1988 ,Décret n°95-363 du 11 novembre 1995 ");
	$this->Text(70,$this->GetY()+5," et Arrête IM du 21 novembre 1999");
	$this->SetFont('aefurat', '', 9);
	
	$this->Rect(5, $this->GetY()+10, 200, 20 ,"d");$this->Line(105 ,$this->GetY()+10 ,105,220 );
	$this->Text(6,$this->GetY()+10,"Nom et Prénom du Dr vétérinaire"); $this->Text(50,$this->GetY(),"(لقب و اسم الطبيب البيطري) "); $this->Text(106,$this->GetY(),"Chargé du contrôle sanitaire au niveau  "); $this->Text(156,$this->GetY(),"( المسؤول عن الرقابة الصحية )");  
	$this->Text(6,$this->GetY()+5,"(en lettres capitales) :".$session);$this->Text(110,$this->GetY(),"-l inspection vétérinaire"); $this->Text(142,$this->GetY(),"(المفتشية البيطرية)"); 
	$this->Text(6,$this->GetY()+5,"...............");                  $this->Text(110,$this->GetY(),"-Abattoir/tuerie/Halle à marée");$this->Text(150,$this->GetY(),"(مدبح/مسلخ /)");  
	$this->Text(6,$this->GetY()+5,"N°d AVN : ".$AVN);                     $this->Text(110,$this->GetY(),"-BHC");$this->Text(118,$this->GetY(),"(مكتب النظافة البلدي )");
	
	
	$this->Rect(5, $this->GetY()+5, 200, 35 ,"d");
	$this->Text(6,$this->GetY()+5,"Nom et/ou raison sociale du proprietaire  ");$this->Text(58,$this->GetY(),"(لقب المالك و/او اسم المؤسسة )");$this->Text(106,$this->GetY(),"Origine du produit ");$this->Text(130,$this->GetY(),"(مصدر المنتوج )");
	$this->Text(6,$this->GetY()+5,$NBOUCHER.$PBOUCHER);$this->Text(106,$this->GetY(),"Abattoir /tuerie/halle à marée-Unité de production/manipulation/");
	$this->Text(6,$this->GetY()+5,"Adresse "."(العنوان ) ");                             $this->Text(106,$this->GetY(),"autres à préciser ");$this->Text(127,$this->GetY(),"(مدبح / ) ");
	$this->Text(6,$this->GetY()+5,$ADRESSE);                                             $this->Text(106,$this->GetY(),".........................");
	$this->Text(6,$this->GetY()+5,"................................................. "); $this->Text(106,$this->GetY(),"N°d agrément "); $this->Text(126,$this->GetY(),"(رقم الأعتماد )");
	$this->Text(6,$this->GetY()+5,"................................................. "); $this->Text(106,$this->GetY(),"Adresse ");$this->Text(117,$this->GetY(),"(العنوان )");
	$this->Text(6,$this->GetY()+5,"................................................. "); $this->Text(106,$this->GetY(),"........................");
	
	
	$this->Rect(5, $this->GetY()+5, 200, 15 ,"d");
	$this->Text(6,$this->GetY()+5,"Viandes rouges :espece ");$this->Text(36,$this->GetY(),"(نوع اللحوم الحمراء )");$this->Text(106,$this->GetY(),"Produits laitiers :nature  ");$this->Text(136,$this->GetY(),"(طبيعة منتوجات الحليب )");
	$this->Text(6,$this->GetY()+5,"Sexe"); $this->Text(13,$this->GetY(),"(الجنس )");$this->Text(106,$this->GetY(),"Lait/beure/fromage/yaourt/creme faiche/autres ");
	$this->Text(6,$this->GetY()+5,"Carcasses/Quartiers/Morceaux");                      $this->Text(106,$this->GetY(),"(حليب/زبدة/جبن/ياوورت/كريمة القشدة/اخرى )");
	
	
	$this->Rect(5, $this->GetY()+5, 200, 10 ,"d");
	$this->Text(6,$this->GetY()+5,"Viandes blanches :espece  ");$this->Text(37,$this->GetY(),"(نوع الحوم البيضاء)  ");$this->Text(106,$this->GetY(),"Produits carnés :nature   ");$this->Text(136,$this->GetY(),"(طبيعة منتوجات اللحم )");
	$this->Text(6,$this->GetY()+5,"Carcasses/Quartiers/Morceaux ");$this->Text(46,$this->GetY(),"(هيكل الذبيحة/شق/قطع )");$this->Text(106,$this->GetY(),"Cachir/pâté/fumés/autres ");$this->Text(138,$this->GetY(),"(كشير/باتي/مدخن/اخرى )");
    
	
	$this->Rect(5, $this->GetY()+5, 200, 20 ,"d");
	$this->Text(6,$this->GetY()+5,"Poissons :Bleu/Blanc ");$this->Text(34,$this->GetY(),"(السمك / ابيض / ازرق )");$this->Text(106,$this->GetY(),"Autres à préciser  ");$this->Text(128,$this->GetY(),"(اخرى للتحديد )");
	$this->Text(6,$this->GetY()+5,"...........................................");       $this->Text(106,$this->GetY(),"...........................................");
	$this->Text(6,$this->GetY()+5,"Entiers/morceaux/éviscéré/étêtes/équeutes");         $this->Text(106,$this->GetY(),"............................................");
	$this->Text(6,$this->GetY()+5,"(كاملة / قطع / منزوعة الاعضاء / منزوعة الرئس / منزوعة الديل )");       $this->Text(106,$this->GetY(),"...........................................");
	
	
	$this->Rect(5, $this->GetY()+5, 200, 30 ,"d");
	$this->Text(6,$this->GetY()+5,"Quantité/Poids (الكمية/الوزن ) ");                                   $this->Text(106,$this->GetY(),"Température de conservation prescrite  ");$this->Text(156,$this->GetY(),"(درجات حرارة التخزين المطلوبة )");
	$this->Text(6,$this->GetY()+5,".............. ");                                   $this->Text(116,$this->GetY(),"-Ambiante (عادية)");
	$this->Text(6,$this->GetY()+5,"Nombre de conditionnement (عدد التعبيئات )");                        $this->Text(116,$this->GetY(),"-Réfrigérée (مبردة ) ");
	$this->Text(6,$this->GetY()+5,"......................... ");                        $this->Text(116,$this->GetY(),"-Congelé (مجمد ) ");
	$this->Text(6,$this->GetY()+5,"N° de lot (الحصة رقم )");                                        
	$this->Text(6,$this->GetY()+5,"...........................");  
	
	
	$this->Rect(5,$this->GetY()+5, 200, 20 ,"d");
	$this->Text(6,$this->GetY()+5,"Transport :N° d agrément(الاعتماد رقم)");             $this->Text(106,$this->GetY(),"N° d immatriculation (التسجيل رقم)");
	$this->Text(6,$this->GetY()+5,"........................ ");                         $this->Text(106,$this->GetY(),"........................ ");
	$this->Text(6,$this->GetY()+5,"Autres à préciser (للتوضيح اخرى)");                                $this->Text(106,$this->GetY(),"........................ ");
	$this->Text(6,$this->GetY()+5,"Destination :Wilaya de (الولاية اليه المرسل المكان )");                           $this->Text(106,$this->GetY(),"......................... ");
	
	$this->Rect(5, $this->GetY()+5, 200, 25 ,"d");
	$this->Text(6,$this->GetY()+5,"Certifie que le ou (les) produit(s) décrit (s) ci-dessus est (sont) propre (s) à la consommation humaine sous réserve que les ");
	$this->Text(6,$this->GetY()+5,"températures et le temps d conservation requis pour chaque produit soient respectés hors du transport et du stockage.");
	$this->Text(6,$this->GetY()+5,"En Foi de quoi,ce certificat est délivré pour servir et valoir ce de droit ");
	$this->Text(6,$this->GetY()+5,"................ ");
	$this->Text(6,$this->GetY()+5,"................ ");
	$this->Rect(5,$this->GetY()+5, 200, 25 ,"d");
	$this->Text(6,$this->GetY()+5,"Délivré en date du (التأشير تاريخ) : ".DATE('j-m-Y'));$this->Text(106,$this->GetY(),"Cachet : الختم ");$this->Text(154,$this->GetY(),"Signature : الامضاء");
	$this->Text(6,$this->GetY()+5,"Heure (en lettres) (بالاحرف الساعة) : ".DATE('H-i-s'));
	$this->Text(6,$this->GetY()+20,"* Nom scientifique ");
	
	}

    
	
	
	function SAISIE()
    {
	$session=$_SESSION["USER"];
	$AVN=$_SESSION["AVN"];
	$this->Text(55,$this->GetY()+5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
	$this->Text(50,$this->GetY()+5,"MINISTERE DE L AGRICULTURE ET DU DEVELOPPEMENT RURAL");

	$this->Text(5,$this->GetY()+10,"DIRECTIONS DES SERVICES AGRICOLES");
	$this->Text(5,$this->GetY()+5,"INSPECTION VETERINAIRE DE LA WILAYA :DJELFA");
	$this->Text(5,$this->GetY()+5,"DAIRA DE:");
	$this->Text(5,$this->GetY()+5,"COMMUNE DE;");
	$this->Text(5,$this->GetY()+5,"N° : ..........DSA / S.IVP / ");
	
	$this->SetFont('aefurat', '', 14);
	$this->Text(70,$this->GetY()+8," CERTIFICAT DE SAISIE ");
    $this->SetFont('aefurat', '', 9); 

	$this->Text(15,$this->GetY()+12,"Je soussigné (e) Docteur : ".$session);$this->Text(120,$this->GetY(),"N° AVN :".$AVN);
	
	$this->Text(5,$this->GetY()+5,"Grade :");$this->Text(100,$this->GetY(),"Certifie avoir procédé ce jour le :  ");
	$this->Text(5,$this->GetY()+5," à L inspection  du produit (1)");
	

	$this->Text(5,$this->GetY()+5,"Viande rouge et blanche ");
	$this->Text(5,$this->GetY()+5,"Quantité :");$this->Text(80,$this->GetY(),"Poids : ");
	
	$this->Text(5,$this->GetY()+5,"Appartenant à Monsieur ");
	
	$this->Text(5,$this->GetY()+5,"Profession et adresse : ");

	$this->Text(5,$this->GetY()+5,"Dans la cadre de l’activité  de (2) :       ");
	$this->Text(70,$this->GetY()+5,"- Abattoir");           $this->Text(100,$this->GetY(),"- Inspection routinière");
	$this->Text(70,$this->GetY()+5,"-  Brigade mixtes");    $this->Text(100,$this->GetY()," - BHC");


	$this->Text(5,$this->GetY()+5," Et  le déclare impropre à la consumation humaine  pour les motifs suivants :");
	$this->Text(5,$this->GetY()+5," ------------------------------------------------------------------------------------------------------------------------------------------------------------------");
	$this->Text(5,$this->GetY()+5," ------------------------------------------------------------------------------------------------------------------------------------------------------------------");
	$this->Text(5,$this->GetY()+5," ------------------------------------------------------------------------------------------------------------------------------------------------------------------");
	$this->Text(5,$this->GetY()+5," ------------------------------------------------------------------------------------------------------------------------------------------------------------------");
    $this->Text(5,$this->GetY()+5," ------------------------------------------------------------------------------------------------------------------------------------------------------------------");
	$this->Text(5,$this->GetY()+5,"Conformément à la réglementation en  vigueur, ce produit fait l objet  d’une saisie :");
	$this->Text(5,$this->GetY()+5,"-	Partielle ");$this->Text(70,$this->GetY(),"- totale (2)");

	$this->Text(5,$this->GetY()+5,"Ce produit  sera destiné à :");$this->Text(70,$this->GetY(),"-L’alimentation animale (2)(3)");


	$this->Text(70,$this->GetY()+5,"-La destruction par : ");$this->Text(100,$this->GetY()," *Dénaturation  (2) (4)");
												             $this->Text(100,$this->GetY()+5," *Incinération  (2) (4)");
												             $this->Text(100,$this->GetY()+5," *Enfouissement (2) (4)");



	$this->Text(100,$this->GetY()+15,"Faire  à : Ain oussera ");$this->Text(130,$this->GetY(),"le :");
	
	$this->Text(110,$this->GetY()+5,"Le Vétérinaire                        ");
	$this->Text(110,$this->GetY()+5,"Signature et   cacher                      ");
	$this->Line(5 ,240 ,200,240 ); 
	$this->Text(5,245,"(1) Description détaillée  du produit");
	$this->Text(5,250,"(2) Rayer la mention  inutile");
	$this->Text(5,255,"(3) S’il  le désire, et contre un  engagement  écrit, le propriétaire  se charge de ");
	$this->Text(5,260,"l’acheminement de sa marchandise à un parc animalier, une fourrière canine etc. . Et doit  ");
	$this->Text(5,265,"ramener un bon  de réception  délivré  par l’organisme bénéficiaire.");
	$this->Text(5,270,"(4)Opération sanctionnée par un procès verbal officiel   ");
	}
	function entete($H) //ENTETE TABLEAU 1-VIANDES ROUGES
{
$H1=$H+10;
$this->SetFont('aefurat', '', 10);
$this->SetXY(5,$H);
$this->Cell(30,20,'Poids moyen(kg)',1,1,'C');
$this->SetXY(35,$H);
$this->Cell(28,10,'BOVINS',1,1,'C');
$this->SetXY(63,$H);
$this->Cell(28,10,'OVINS',1,1,'C');
$this->SetXY(91,$H);
$this->Cell(28,10,'CAPRINS',1,1,'C');
$this->SetXY(119,$H);
$this->Cell(28,10,'EQUINS',1,1,'C');
$this->SetXY(147,$H);
$this->Cell(28,10,'CAMELINS',1,1,'C');
$this->SetXY(175,$H);
$this->Cell(28,10,'TOTAL',1,1,'C');
$this->SetXY(35,$H1);
$this->Cell(14,10,'Nbr',1,1,'C');
$this->SetXY(49,$H1);
$this->Cell(14,10,'Poids(kg)',1,1,'C');
$this->SetXY(63,$H1);
$this->Cell(14,10,'Nbr',1,1,'C');
$this->SetXY(77,$H1);
$this->Cell(14,10,'Poids(kg)',1,1,'C');
$this->SetXY(91,$H1);
$this->Cell(14,10,'Nbr',1,1,'C');
$this->SetXY(105,$H1);
$this->Cell(14,10,'Poids(kg)',1,1,'C');
$this->SetXY(119,$H1);
$this->Cell(14,10,'Nbr',1,1,'C');
$this->SetXY(133,$H1);
$this->Cell(14,10,'Poids(kg)',1,1,'C');
$this->SetXY(147,$H1);
$this->Cell(14,10,'Nbr',1,1,'C');
$this->SetXY(161,$H1);
$this->Cell(14,10,'Poids(kg)',1,1,'C');
$this->SetXY(175,$H1);
$this->Cell(14,10,'Nbr',1,1,'C');
$this->SetXY(189,$H1);
$this->Cell(14,10,'Poids(kg)',1,1,'C');
}
function ligne($H1,$TL,$VAL0,$VAL1,$VAL2,$VAL3,$VAL4,$VAL5,$VAL6,$VAL7,$VAL8,$VAL9) //LIGNE TABLEAU 1-VIANDES ROUGES
{
$this->SetFont('aefurat', '', 10);
$this->SetXY(5,$H1);
$this->Cell(30,10,$TL,1,1,'r');
$this->SetXY(35,$H1);
$this->Cell(14,10,$VAL0,1,1,'C');
$this->SetXY(49,$H1);
$this->Cell(14,10,$VAL1,1,1,'C');
$this->SetXY(63,$H1);
$this->Cell(14,10,$VAL2,1,1,'C');
$this->SetXY(77,$H1);
$this->Cell(14,10,$VAL3,1,1,'C');
$this->SetXY(91,$H1);
$this->Cell(14,10,$VAL4,1,1,'C');
$this->SetXY(105,$H1);
$this->Cell(14,10,$VAL5,1,1,'C');
$this->SetXY(119,$H1);
$this->Cell(14,10,$VAL6,1,1,'C');
$this->SetXY(133,$H1);
$this->Cell(14,10,$VAL7,1,1,'C');
$this->SetXY(147,$H1);
$this->Cell(14,10,$VAL8,1,1,'C');
$this->SetXY(161,$H1);
$this->Cell(14,10,$VAL9,1,1,'C');
$this->SetXY(175,$H1);
$this->Cell(14,10,$VAL0+$VAL2+$VAL4+$VAL6+$VAL8,1,1,'C');
$this->SetXY(189,$H1);
$this->Cell(14,10,$VAL1+$VAL3+$VAL5+$VAL7+$VAL9,1,1,'C');
}

function ligne0($H1,$TL,$VAL0,$VAL1,$VAL2,$VAL3,$VAL4,$VAL5,$VAL6,$VAL7,$VAL8,$VAL9) //LIGNE TABLEAU 1-VIANDES ROUGES
{
$this->SetFont('aefurat', '', 10);

$this->SetXY(5,$H1);
$this->Cell(30,10,$TL,1,1,'r');

$this->SetXY(35,$H1);
$this->Cell(28,10,'450',1,1,'C');

$this->SetXY(63,$H1);
$this->Cell(28,10,$VAL2,1,1,'C');

$this->SetXY(91,$H1);
$this->Cell(28,10,$VAL4,1,1,'C');

$this->SetXY(119,$H1);
$this->Cell(28,10,$VAL6,1,1,'C');

$this->SetXY(147,$H1);
$this->Cell(28,10,$VAL8,1,1,'C');

$this->SetXY(175,$H1);
$this->Cell(28,10,$VAL0+$VAL2+$VAL4+$VAL6+$VAL8,1,1,'C');

}



function ligne1($H1,$TL) //LIGNE TABLEAU 4-ETAT  DES SAISIES D'ORGANES ET NOMBRE D'ANIMAUX ATTEINTS/MALADIE:
{
$this->SetFont('aefurat', '', 10);
$this->SetXY(5,$H1);
$this->Cell(20,20,$TL,1,1,'r');
$this->SetXY(25,$H1);
$this->Cell(10,10,'Foie',1,1,'C');
$this->SetXY(35,$H1);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(49,$H1);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(63,$H1);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(77,$H1);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(91,$H1);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(105,$H1);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(119,$H1);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(133,$H1);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(147,$H1);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(161,$H1);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(175,$H1);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(189,$H1);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(25,$H1+10);
$this->Cell(10,10,'Pms',1,1,'C');
$this->SetXY(35,$H1+10);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(49,$H1+10);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(63,$H1+10);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(77,$H1+10);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(91,$H1+10);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(105,$H1+10);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(119,$H1+10);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(133,$H1+10);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(147,$H1+10);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(161,$H1+10);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(175,$H1+10);
$this->Cell(14,10,'',1,1,'C');
$this->SetXY(189,$H1+10);
$this->Cell(14,10,'',1,1,'C');
}

function entete2($H) //LIGNE TABLEAU 5-VIANDES BLANCHES
{
$H1=$H+10;
$this->SetFont('aefurat', '', 10);
$this->SetXY(5,$H);
$this->Cell(30,20,'Poids moyen(kg)',1,1,'C');
$this->SetXY(35,$H);
$this->Cell(84,10,'Quantité contrôlée',1,1,'C');
$this->SetXY(119,$H);
$this->Cell(84,10,'Quantité saisie',1,1,'C');
$this->SetXY(35,$H1);
$this->Cell(42,10,'Nbr',1,1,'C');
$this->SetXY(77,$H1);
$this->Cell(42,10,'Poids(kg)',1,1,'C');
$this->SetXY(119,$H1);
$this->Cell(42,10,'Nbr',1,1,'C');
$this->SetXY(161,$H1);
$this->Cell(42,10,'Poids(kg)',1,1,'C');
}
function ligne2($H1,$TL) //LIGNE TABLEAU 5-VIANDES BLANCHES
{
$this->SetFont('aefurat', '', 10);
$this->SetXY(5,$H1);
$this->Cell(30,10,$TL,1,1,'r');
$this->SetXY(35,$H1);
$this->Cell(42,10,'',1,1,'C');
$this->SetXY(77,$H1);
$this->Cell(42,10,'',1,1,'C');
$this->SetXY(119,$H1);
$this->Cell(42,10,'',1,1,'C');
$this->SetXY(161,$H1);
$this->Cell(42,10,'',1,1,'C');
}
function entete3($H) //6-POISSONS
{
$H1=$H+10;
$this->SetFont('aefurat', '', 10);
$this->SetXY(5,$H);
$this->Cell(30,10,'',1,1,'C');
$this->SetXY(35,$H);
$this->Cell(84,10,'Quantité contrôlée',1,1,'C');
$this->SetXY(119,$H);
$this->Cell(84,10,'Quantité saisie',1,1,'C');

}
function ligne3($H1,$TL) //LIGNE TABLEAU 5-VIANDES BLANCHES
{
$this->SetFont('aefurat', '', 10);
$this->SetXY(5,$H1);
$this->Cell(30,10,$TL,1,1,'r');
$this->SetXY(35,$H1);
$this->Cell(84,10,'',1,1,'C');
$this->SetXY(119,$H1);
$this->Cell(84,10,'',1,1,'C');

}
function entete4($H) //6-POISSONS
{
$H1=$H+10;
$this->SetFont('aefurat', '', 10);
$this->SetXY(5,$H);
$this->Cell(25,20,'',1,1,'C');
$this->SetXY(30,$H);
$this->Cell(25,10,'Viande ',1,1,'C');
$this->SetXY(55,$H);
$this->Cell(25,10,'Viande ',1,1,'C');
$this->SetXY(80,$H);
$this->Cell(25,10,'Viande ',1,1,'C');
$this->SetXY(105,$H);
$this->Cell(25,10,'Viande ',1,1,'C');
$this->SetXY(130,$H);
$this->Cell(25,10,'Viande ',1,1,'C');
$this->SetXY(155,$H);
$this->Cell(25,10,'Viande ',1,1,'C');
$this->SetXY(180,$H);
$this->Cell(25,10,'poissons',1,1,'C');
$this->SetXY(30,$H+10);
$this->Cell(25,10,'bovine',1,1,'C');
$this->SetXY(55,$H+10);
$this->Cell(25,10,'ovine',1,1,'C');
$this->SetXY(80,$H+10);
$this->Cell(25,10,'caprine',1,1,'C');
$this->SetXY(105,$H+10);
$this->Cell(25,10,'équine',1,1,'C');
$this->SetXY(130,$H+10);
$this->Cell(25,10,'cameline',1,1,'C');
$this->SetXY(155,$H+10);
$this->Cell(25,10,'blanche',1,1,'C');
$this->SetXY(180,$H+10);
$this->Cell(12.5,10,'blancs',1,1,'C');
$this->SetXY(192.5,$H+10);
$this->Cell(12.5,10,'bleus',1,1,'C');
$this->SetXY(5,$H+20);
//donnees
$this->Cell(25,10,'Cout moyen (Da)',1,1,'C');
$this->SetXY(30,$H+20);
$this->Cell(25,10,'',1,1,'C');
$this->SetXY(55,$H+20);
$this->Cell(25,10,'',1,1,'C');
$this->SetXY(80,$H+20);
$this->Cell(25,10,'',1,1,'C');
$this->SetXY(105,$H+20);
$this->Cell(25,10,'',1,1,'C');
$this->SetXY(130,$H+20);
$this->Cell(25,10,'',1,1,'C');
$this->SetXY(155,$H+20);
$this->Cell(25,10,'',1,1,'C');
$this->SetXY(180,$H+20);
$this->Cell(12.5,10,'',1,1,'C');
$this->SetXY(192.5,$H+20);
$this->Cell(12.5,10,'',1,1,'C');
}
function ABATTAGE($H) //9-ABATTAGE SANITAIRE :
{
$H1=$H+10;
$this->SetFont('aefurat', '', 10);

$this->SetXY(5,$H);
$this->Cell(30,10,'Type abattage',1,1,'C');

$this->SetXY(35,$H);
$this->Cell(30,10,'Date de l abattage',1,1,'C');

$this->SetXY(65,$H);
$this->Cell(30,10,'Espece abattue',1,1,'C');

$this->SetXY(95,$H);
$this->Cell(30,10,'Nom du veterinaire',1,1,'C');

$this->SetXY(125,$H);
$this->Cell(40,10,'Numéro d identification',1,1,'C');

$this->SetXY(165,$H);
$this->Cell(40,10,'Causes et justificatifs',1,1,'C');

$this->SetXY(5,$H+10);
$this->Cell(30,10,'',1,1,'C');

$this->SetXY(35,$H+10);
$this->Cell(30,10,'',1,1,'C');

$this->SetXY(65,$H+10);
$this->Cell(30,10,'',1,1,'C');

$this->SetXY(95,$H+10);
$this->Cell(30,10,'',1,1,'C');

$this->SetXY(125,$H+10);
$this->Cell(40,10,'',1,1,'C');

$this->SetXY(165,$H+10);
$this->Cell(40,10,'',1,1,'C');

}
	
	
	
	

}	