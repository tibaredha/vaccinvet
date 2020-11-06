<?php 
$db_host="localhost"; 
$db_user="root";$IDELEV = $_POST['IDELEV'];
$db_pass="";
$db_name="vaccinvet";
$IDELEV = $_POST['IDELEV'];
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$result = mysql_query("SELECT * FROM medvet where IDELEV = $IDELEV " );
echo'<tr>
<th>id</th>
<th>MD</th>
<th>PS</th>
<th>VA</th>
<th>RA</th>
<th>DA</th>
<th>-</th>
</tr>';
while($data =  mysql_fetch_array($result))
{	
echo'<tr>
<td>'.$data['id'].'</td>
<td>'.$data['MD'].'</td>
<td>'.$data['PS'].'</td>
<td>'.$data['VA'].'</td>
<td>'.$data['RA'].'</td>
<td>'.$data['DA'].'</td>
<td><a href="" id="del" >dd</a><button type="button" id="submit_btnx" value="'.$data['id'].'"    >x</button></td>
</tr>';	
}

?>