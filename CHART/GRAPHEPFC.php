<?php
//**********************************************connection************************************************************//
include "./CHART/fonction.php";	
include "./CHART/libchart/classes/libchart.php";
$chart = new VerticalBarChart();
$dataSet = new XYDataSet();
$dataSet->addPoint(new Point("DON TOTAL", ctomysql1()));
$dataSet->addPoint(new Point("AP", ctomysqlpfc('A','Positif')));
$dataSet->addPoint(new Point("AN", ctomysqlpfc('A','negatif')));
$dataSet->addPoint(new Point("BP", ctomysqlpfc('B','Positif')));
$dataSet->addPoint(new Point("BN", ctomysqlpfc('B','negatif')));
$dataSet->addPoint(new Point("ABP",ctomysqlpfc('AB','Positif')));
$dataSet->addPoint(new Point("ABN",ctomysqlpfc('AB','negatif')));
$dataSet->addPoint(new Point("OP", ctomysqlpfc('o','Positif')));
$dataSet->addPoint(new Point("ON", ctomysqlpfc('o','negatif')));
$chart->setDataSet($dataSet);
$DATE=date("d-m-Y");
$chart->setTitle("Etat De Stock pfc  ARRET AU  :".$DATE);
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
