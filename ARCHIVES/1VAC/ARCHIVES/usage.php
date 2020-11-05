<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LA LISTE NOMINATIVE DES DONNEURS CONFIRMES</title>
<link href="../CSS/style.css"	title="Défaut" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<?php include('../includes/entete.php'); ?> 
<?php include('../includes/SMDNR.php'); ?> 
<br/>
<br/>
<?php

	//Include the PS_Pagination class
	include('ps_pagination.php');
	//Connect to mysql db
	$conn = mysql_connect('localhost','root','');
	if(!$conn) die("Failed to connect to database!");
	$status = mysql_select_db('gpts2012', $conn);
	if(!$status) die("Failed to select database!");
	$sql = 'SELECT idon,nomdnr,prenomdnr,iddnr,sexe,IDP,datedon,IND FROM tdon';
	
	/*
	 * Create a PS_Pagination object
	 * 
	 * $conn = MySQL connection object
	 * $sql = SQl Query to paginate
	 * 10 = Number of rows per page
	 * 5 = Number of links
	 * "param1=valu1&param2=value2" = You can append your own parameters to paginations links
	 */
	$pager = new PS_Pagination($conn, $sql, 10, 10, "param1=valu1&param2=value2");
	
	/*
	 * Enable debugging if you want o view query errors
	*/
	$pager->setDebug(true);
	
	/*
	 * The paginate() function returns a mysql result set
	 * or false if no rows are returned by the query
	*/
	$rs = $pager->paginate();
	if(!$rs) die(mysql_error());
	echo( "<table bgcolor=\"white\"  bordercolor=\"green\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
	echo( "<tr>
	<td bgcolor=\"#cccccc\"><div align=\"center\">indi</div></td>
	<td bgcolor=\"#cccccc\"><div align=\"center\">indi</div></td>
	<td bgcolor=\"#cccccc\"><div align=\"center\">indi</div></td>
	<td bgcolor=\"#cccccc\"><div align=\"center\">indi</div></td>
	</tr>" );
	while($row = mysql_fetch_assoc($rs)) 
	{
	    echo( "<tr>\n");
		echo( "<td><div align=\"left\">".$row['idon']."</div></td>\n" );
		echo( "<td><div align=\"left\">".$row['nomdnr']."</div></td>\n");
		echo( "<td><div align=\"left\">".$row['prenomdnr']."</div></td>\n");
		echo( "<td><input type='checkbox' name='' value='' /></td>\n");
        echo( "</tr>\n"); 
	}
	echo( "</table><br>\n" );
	
	//Display the full navigation in one go
	
	echo '<p align=center>'. $pager->renderFullNav().' </p>';
	
	echo "<br />\n";
	
	
?>
<?php include('../includes/pied.php  '); ?> 
 </body>
</html>