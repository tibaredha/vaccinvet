<?php
 include "./CHART/fonction.php";	
include "./CHART/libchart/classes/libchart.php";
$chart = new VerticalBarChart();
$dataSet = new XYDataSet();
$dataSet->addPoint(new Point("DON TOTAL", ctomysql1()));
$dataSet->addPoint(new Point("AP", ctomysqlcps('A','Positif')));
$dataSet->addPoint(new Point("AN", ctomysqlcps('A','negatif')));
$dataSet->addPoint(new Point("BP", ctomysqlcps('B','Positif')));
$dataSet->addPoint(new Point("BN", ctomysqlcps('B','negatif')));
$dataSet->addPoint(new Point("ABP",ctomysqlcps('AB','Positif')));
$dataSet->addPoint(new Point("ABN",ctomysqlcps('AB','negatif')));
$dataSet->addPoint(new Point("OP", ctomysqlcps('o','Positif')));
$dataSet->addPoint(new Point("ON", ctomysqlcps('o','negatif')));
$chart->setDataSet($dataSet);
$DATE=date("d-m-Y");
$chart->setTitle("Etat De Stock cps ARRET AU  :".$DATE);
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
