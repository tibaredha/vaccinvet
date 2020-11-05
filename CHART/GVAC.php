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
	$dataSet->addPoint(new Point("Brebis",NBRTETEAVND('vacb1',$AVN)));
	$dataSet->addPoint(new Point("Béliers",NBRTETEAVND('vacb2',$AVN)));
	$dataSet->addPoint(new Point("Antenais",NBRTETEAVND('vacb3',$AVN)));
	$dataSet->addPoint(new Point("Antenaises",NBRTETEAVND('vacb4',$AVN)));
	$dataSet->addPoint(new Point("Agneaux",NBRTETEAVND('vacb5',$AVN)));
	$dataSet->addPoint(new Point("Agnelles",NBRTETEAVND('vacb6',$AVN)));
	
	
	$chart->setDataSet($dataSet);
	$chart->setTitle("VACCINATION ANTI-CLAVELEUSE Dr:".$USER."  ARRETER AU  :".$DATE);
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



