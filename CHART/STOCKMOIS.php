<?php
include "./CHART/fonction.php";
include('./class/class.php');	
include "./CHART/libchart/classes/libchart.php";
$DATEMOIS=date("Y");
$DATE=date("d-m-Y");
$per ->h(2,240,180,'Evolution du reste en  stock  par produit');
$per -> sautligne (2);
$per ->f0('index.php?uc=STOCKMOIS','post');
$per ->submit(920,200,'chercher Fiche de stock');
$per ->comboprodtuit(680,200,'produit','gpts2012');
$per ->f1();
if (isset($_POST["produit"]) and $_POST["produit"]!="" )
{ 
$pro=$_POST["produit"];
$sql = " select * from stock where idproduit=$pro ";
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
$chart = new LineChart();
$dataSet = new XYDataSet();
while($row=mysql_fetch_object($requete))
{
$dataSet->addPoint(new Point($row->idstock,$row->restock));
}
$chart->setDataSet($dataSet);
$chart->setTitle("Etat Des stock du produit code n° :".$pro." ARRET AU  :".$DATE);
$chart->render("./CHART/demo/generated/demo1.png");
mysql_free_result($requete);
echo "<div style=\" position:absolute;left:340px;top:260px;\"  >";
echo "	<img alt=\"Vertical bars chart\" src=\"./CHART/demo/generated/demo1.png\" style=\"border: 1px solid gray;\"/>";
echo "</div>";
}

?>
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



