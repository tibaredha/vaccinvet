<?php
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$serie1 = new XYDataSet();
	$serie1->addPoint(new Point("01", 1000));
	$serie1->addPoint(new Point("02", 63));
	$serie1->addPoint(new Point("03", 58));
	$serie1->addPoint(new Point("04", 58));
	$serie1->addPoint(new Point("05", 46));
	$serie1->addPoint(new Point("06", 46));
	$serie1->addPoint(new Point("07", 46));
	$serie1->addPoint(new Point("08", 46));
	$serie1->addPoint(new Point("09", 46));
	$serie1->addPoint(new Point("10", 46));
	$serie1->addPoint(new Point("11", 46));
	$serie1->addPoint(new Point("12", 46));
	
	//donparmois(date("Y-m-d"))
	$serie2 = new XYDataSet();
	$serie2->addPoint(new Point("01",5));
	$serie2->addPoint(new Point("02", 6));
	$serie2->addPoint(new Point("03", 5));
	$serie2->addPoint(new Point("04", 8));
	$serie2->addPoint(new Point("05", 6));
	$serie2->addPoint(new Point("06", 6));
	$serie2->addPoint(new Point("07", 6));
	$serie2->addPoint(new Point("08", 6));
	$serie2->addPoint(new Point("09", 6));
	$serie2->addPoint(new Point("10", 6));
	$serie2->addPoint(new Point("11", 6));
	$serie2->addPoint(new Point("12", 6));
	
	$dataSet = new XYSeriesDataSet();
	$dataSet->addSerie("X1", $serie1);
	$dataSet->addSerie("X2", $serie2);
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphCaptionRatio(0.65);

	$chart->setTitle("EVOLUTION DES dons PAR MOIS");
	$chart->render("./CHART/demo/generated/demo7.png");
?>
<div style=" position:absolute;left:340px;top:260px;"  >
	<img alt="Line chart" src="./CHART/demo/generated/demo7.png" style="border: 1px solid gray;"/>
</div>	
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
</br>
</br>
</br>
</br>
</br>

