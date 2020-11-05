<?php
include('./SESSION/SESSION.php');
include "./CHART/fonction.php";	
include "./CHART/libchart/classes/libchart.php";
$DATEMOIS=date("Y");
$chart = new VerticalBarChart();
$dataSet = new XYDataSet();
$AVN=$_SESSION["AVN"];
$dataSet->addPoint(new Point("JAN", donparmois($AVN,$DATEMOIS."-01-01",$DATEMOIS."-01-31")));
$dataSet->addPoint(new Point("FEV", donparmois($AVN,$DATEMOIS."-02-01",$DATEMOIS."-02-28")));
$dataSet->addPoint(new Point("MAR", donparmois($AVN,$DATEMOIS."-03-01",$DATEMOIS."-03-31")));
$dataSet->addPoint(new Point("AVR", donparmois($AVN,$DATEMOIS."-04-01",$DATEMOIS."-04-30")));
$dataSet->addPoint(new Point("MAI", donparmois($AVN,$DATEMOIS."-05-01",$DATEMOIS."-05-31")));
$dataSet->addPoint(new Point("JUIN",donparmois($AVN,$DATEMOIS."-06-01",$DATEMOIS."-06-31")));
$dataSet->addPoint(new Point("JUIL",donparmois($AVN,$DATEMOIS."-07-01",$DATEMOIS."-07-30")));
$dataSet->addPoint(new Point("AOUT",donparmois($AVN,$DATEMOIS."-08-01",$DATEMOIS."-08-31")));
$dataSet->addPoint(new Point("SEP", donparmois($AVN,$DATEMOIS."-09-01",$DATEMOIS."-09-30")));
$dataSet->addPoint(new Point("OCT", donparmois($AVN,$DATEMOIS."-10-01",$DATEMOIS."-10-31")));
$dataSet->addPoint(new Point("NOV", donparmois($AVN,$DATEMOIS."-11-01",$DATEMOIS."-11-30")));
$dataSet->addPoint(new Point("DEC", donparmois($AVN,$DATEMOIS."-12-01",$DATEMOIS."-12-31")));
$chart->setDataSet($dataSet);
$DATE=date("d-m-Y");
$chart->setTitle(" Nbr Eleveur Par Mois  Vaccination anti-claveleuse  ARRET AU  :".$DATE."  AVN:".$AVN);
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
