<style type="text/css">

.question_grand{
    float: left;
	width:900px;
	background-image:url(fond_question.jpg);
	height:auto;
	
	background-repeat:no-repeat;
	background-position:top;
}
.question{
    float: left;
	width:655px;
	padding-top: 7px;
	padding-left: 95px;
	
	padding-bottom: 3px;
}
.check{
	float:left;
	width:120px;
	padding-top: 5px;
	font-size: 12px;
	height: 25px;
}
</style>

<?php 
include('./SESSION/SESSION.php'); 
include('./STAT/site.php');
include('./class/class.php');
$per ->h(2,500,180,'l´entretien médical préalable au don du sang');
$per -> sautligne (2);
$per -> photos(1000,250);
$per ->f0('index.php?uc=ques1','post');
$per ->submit(100,490,'Enregistrer Donneur');
$per ->reset(700,490 ,'Nouveau     Donneur');
$per ->ques(10,250,'q1','Vous sentez-vous en forme pour donner votre sang ?');
$per ->ques(10,270,'q2','Etes-vous en arrêt de travail ?');
$per ->ques(10,290,'q3','Pensez-vous avoir besoin vous-même d’un test de dépistage viral ?');
$per ->ques(10,310,'q4','Vous ou votre partenaire, êtes-vous porteur du VIH, de l’hépatite B, de l’hépatite C, ou du HTLV ?');
$per ->ques(10,330,'q5','Y a-t-il une personne souffrant d’hépatite B dans votre entourage ?');
$per ->ques(10,350,'q6','Vous ou un membre de votre famille, êtes-vous porteur ou atteint d’une anomalie<br>du globule rouge (drépanocytose…) ?');
//echo"<a href=\"\" onclick=\"javascript:window.print()\" >rrrrrrrrrrr</a> "; 
$per ->f1();
$per -> sautligne (15);
?>




 
