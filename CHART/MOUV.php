<?php
	include "./CHART/libchart/classes/libchart.php";
	$chart = new LineChart();

	$serie1 = new XYDataSet();
	$serie1->addPoint(new Point("JANVIER", 10));
	$serie1->addPoint(new Point("FEVRIER", 20));
	$serie1->addPoint(new Point("MARS", 30));
	$serie1->addPoint(new Point("AVRIL", 40));
	$serie1->addPoint(new Point("MAI",50));
	$serie1->addPoint(new Point("JUIN", 60));
	
	$serie2 = new XYDataSet();
	$serie2->addPoint(new Point("JANVIER", 30));
	$serie2->addPoint(new Point("06-02", 40));
	$serie2->addPoint(new Point("06-03", 50));
	$serie2->addPoint(new Point("06-04", 60));
	$serie2->addPoint(new Point("06-05", 70));
	$serie2->addPoint(new Point("06-06", 80));
	
	$serie3 = new XYDataSet();
	$serie3->addPoint(new Point("JANVIER", 40));
	$serie3->addPoint(new Point("06-02", 50));
	$serie3->addPoint(new Point("06-03", 60));
	$serie3->addPoint(new Point("06-04", 70));
	$serie3->addPoint(new Point("06-05", 80));
	$serie3->addPoint(new Point("06-06", 90));
	
	$serie4 = new XYDataSet();
	$serie4->addPoint(new Point("JANVIER", 50));
	$serie4->addPoint(new Point("06-02", 60));
	$serie4->addPoint(new Point("06-03", 70));
	$serie4->addPoint(new Point("06-04", 80));
	$serie4->addPoint(new Point("06-05", 90));
	$serie4->addPoint(new Point("06-06", 100));
	
	$serie5 = new XYDataSet();
	$serie5->addPoint(new Point("JANVIER", 60));
	$serie5->addPoint(new Point("06-02", 70));
	$serie5->addPoint(new Point("06-03", 80));
	$serie5->addPoint(new Point("06-04", 90));
	$serie5->addPoint(new Point("06-05", 100));
	$serie5->addPoint(new Point("06-06", 110));
	
	$serie6 = new XYDataSet();
	$serie6->addPoint(new Point("JANVIER", 70));
	$serie6->addPoint(new Point("06-02", 80));
	$serie6->addPoint(new Point("06-03", 90));
	$serie6->addPoint(new Point("06-04", 110));
	$serie6->addPoint(new Point("06-05", 120));
	$serie6->addPoint(new Point("06-06", 130));
	
	$serie7 = new XYDataSet();
	$serie7->addPoint(new Point("JANVIER", 180));
	$serie7->addPoint(new Point("06-02", 190));
	$serie7->addPoint(new Point("06-03", 200));
	$serie7->addPoint(new Point("06-04", 210));
	$serie7->addPoint(new Point("06-05", 220));
	$serie7->addPoint(new Point("06-06", 230));
	
	$dataSet = new XYSeriesDataSet();
	$dataSet->addSerie("lait pasterise", $serie1);
	$dataSet->addSerie("lait fermente", $serie2);
	$dataSet->addSerie("lait caillé", $serie3);
	$dataSet->addSerie("lait de vache", $serie4);
	$dataSet->addSerie("yaourt aromatise",$serie5);
	$dataSet->addSerie("yaourt fruite",$serie6);
	$dataSet->addSerie("boisson", $serie7);
	$chart->setDataSet($dataSet);

	$chart->setTitle("mouvement du stock 2013");
	$chart->getPlot()->setGraphCaptionRatio(0.62);
	$chart->render("./CHART/demo/generated/demo1.png");
?>
<div style=" position:absolute;left:180px;top:260px;"  >
	<img alt="Vertical bars chart" src="./CHART/demo/generated/demo1.png" style="border: 1px solid gray;"/>
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
</br>
