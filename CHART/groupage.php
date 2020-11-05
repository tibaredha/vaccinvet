<?php
include "./CHART/fonction.php";
include('./class/class.php');	
include "./CHART/libchart/classes/libchart.php";
$DATEMOIS=date("Y");
$DATE=date("d-m-Y");
$chart = new PieChart();
//desactive si dessous si avoir deux couleures	
	// $chart->getPlot()->getPalette()->setPieColor(array(
		// new Color(255, 0, 0),
		// new Color(0, 0, 0)
	// ));
	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("A+",don('A','Positif')));
	$dataSet->addPoint(new Point("A-",don('A','negatif ')));
	$dataSet->addPoint(new Point("B+",don('B','Positif')));
	$dataSet->addPoint(new Point("B-",don('B','negatif ')));
	$dataSet->addPoint(new Point("AB+",don('AB','Positif')));
	$dataSet->addPoint(new Point("AB-",don('AB','negatif ')));
	$dataSet->addPoint(new Point("O+",don('O','Positif')));
	$dataSet->addPoint(new Point("O-",don('O','negatif ')));
	$chart->setDataSet($dataSet);
	$chart->setTitle("Repartition des don par groupage ABO RH ARRET AU  :".$DATE);
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



