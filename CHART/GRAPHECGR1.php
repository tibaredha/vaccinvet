<?php
include "./CHART/fonction.php";	
include "./CHART/libchart/classes/libchart.php";
$chart = new VerticalBarChart();
$dataSet = new XYDataSet();
$dataSet->addPoint(new Point("DON TOTAL", ctomysql1()));
$dataSet->addPoint(new Point("AP", ctomysqlcgr('A','Positif')));
$dataSet->addPoint(new Point("AN", ctomysqlcgr('A','negatif')));
$dataSet->addPoint(new Point("BP", ctomysqlcgr('B','Positif')));
$dataSet->addPoint(new Point("BN", ctomysqlcgr('B','negatif')));
$dataSet->addPoint(new Point("ABP",ctomysqlcgr('AB','Positif')));
$dataSet->addPoint(new Point("ABN",ctomysqlcgr('AB','negatif')));
$dataSet->addPoint(new Point("OP", ctomysqlcgr('o','Positif')));
$dataSet->addPoint(new Point("ON", ctomysqlcgr('o','negatif')));
$chart->setDataSet($dataSet);
$DATE=date("d-m-Y");
$chart->setTitle("Etat De Stock CGR  ARRET AU  :".$DATE);
$chart->render("./CHART/demo/generated/demo1.png");
?>

<div style=" position:absolute;left:340px;top:260px;"  >
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
