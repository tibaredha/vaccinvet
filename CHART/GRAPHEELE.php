<script language="Javascript">
<!--
document.write('<br>Votre résolution est de '.screen.width+'x'+screen.height)
//-->
</script>

<?php
include('./SESSION/SESSION.php');
include "./CHART/fonction.php";	
include "./CHART/libchart/classes/libchart.php";
$DATEMOIS=date("Y");
$chart = new VerticalBarChart();
$dataSet = new XYDataSet();
$AVN=$_SESSION["AVND"];
$USER=$_SESSION["USER"];
$dataSet->addPoint(new Point("JAN", donparmoisd($AVN,$DATEMOIS."-01-01",$DATEMOIS."-01-31")));
$dataSet->addPoint(new Point("FEV", donparmoisd($AVN,$DATEMOIS."-02-01",$DATEMOIS."-02-28")));
$dataSet->addPoint(new Point("MAR", donparmoisd($AVN,$DATEMOIS."-03-01",$DATEMOIS."-03-31")));
$dataSet->addPoint(new Point("AVR", donparmoisd($AVN,$DATEMOIS."-04-01",$DATEMOIS."-04-30")));
$dataSet->addPoint(new Point("MAI", donparmoisd($AVN,$DATEMOIS."-05-01",$DATEMOIS."-05-31")));
$dataSet->addPoint(new Point("JUIN", donparmoisd($AVN,$DATEMOIS."-06-01",$DATEMOIS."-06-31")));
$dataSet->addPoint(new Point("JUIL", donparmoisd($AVN,$DATEMOIS."-07-01",$DATEMOIS."-07-30")));
$dataSet->addPoint(new Point("AOUT", donparmoisd($AVN,$DATEMOIS."-08-01",$DATEMOIS."-08-31")));
$dataSet->addPoint(new Point("SEP", donparmoisd($AVN,$DATEMOIS."-09-01",$DATEMOIS."-09-30")));
$dataSet->addPoint(new Point("OCT", donparmoisd($AVN,$DATEMOIS."-10-01",$DATEMOIS."-10-31")));
$dataSet->addPoint(new Point("NOV", donparmoisd($AVN,$DATEMOIS."-11-01",$DATEMOIS."-11-30")));
$dataSet->addPoint(new Point("DEC", donparmoisd($AVN,$DATEMOIS."-12-01",$DATEMOIS."-12-31")));
$chart->setDataSet($dataSet);
$DATE=date("d-m-Y");
$chart->setTitle(" Nbr Eleveur Par Mois Dr:".$USER." ARRETER AU  :".$DATE);
$chart->render("./CHART/demo/generated/demo1.png");

?>
<script language="Javascript">

document.write('<br>Votre résolution est de '.screen.width+'x'+screen.height);

</script>
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
