<?php
include('./SESSION/SESSION.php');
include "./CHART/fonction.php";
include "./CHART/libchart/classes/libchart.php";
$DATEMOIS=date("Y");
$DATE=date("d-m-Y");
$AVN=$_SESSION["AVND"];
$USER=$_SESSION["USER"];
$chart = new PieChart();
//desactive si dessous si avoir deux couleures	
	// $chart->getPlot()->getPalette()->setPieColor(array(
		// new Color(255, 0, 0),
		// new Color(0, 0, 0)
	// ));
	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("Brebis",NBRTETEAVND('vabc1',$AVN)));
	$dataSet->addPoint(new Point("Béliers",NBRTETEAVND('vabc2',$AVN)));
	$dataSet->addPoint(new Point("Antenais",NBRTETEAVND('vabc3',$AVN)));
	$dataSet->addPoint(new Point("Antenaises",NBRTETEAVND('vabc4',$AVN)));
	$dataSet->addPoint(new Point("Agneaux",NBRTETEAVND('vabc5',$AVN)));
	$dataSet->addPoint(new Point("Agnelles",NBRTETEAVND('vabc6',$AVN)));
	$dataSet->addPoint(new Point("Caprins",NBRTETEAVND('vabc7',$AVN)));
	
	$chart->setDataSet($dataSet);
	$chart->setTitle("VACCINATION ANTI-BRUCELLIQUE Dr:".$USER."  ARRETER AU  :".$DATE);
	$chart->render("./CHART/demo/generated/pie_chart_color.png");
echo "<div style=\" position:absolute;left:340px;top:260px;\"  >";
echo "<img alt=\"Pie chart color test\" src=\"./CHART/demo/generated/pie_chart_color.png\" style=\"border: 1px solid gray;\"/>";
echo "</div>";
?>
</br>
</br></br>	
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>



