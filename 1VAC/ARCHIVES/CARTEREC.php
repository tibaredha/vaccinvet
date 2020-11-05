<?php include('./SESSION/SESSION.php'); ?>
<?php include('./STAT/site.php');?> 
<h2 ALIGN=center >CARTE RECEVEUR</h2>
<form action="./1dnr/FABOR11.php" method="post" name="form1" id="form1">
 <table bgcolor="white"  bordercolor="green" align="center" border="1">
  <hr />
  <tr valign="baseline">
      <td bgcolor="#cccccc" nowrap="nowrap" align="left" value="FIXE">Structure </td>
      <td bgcolor="green"><select name="STR" >
          <option>FIXE</option>
          <option>MOBILE</option>
        </select>
	  </td>
	  <td bgcolor="#cccccc" nowrap="nowrap" align="left">Date </td>
      <td bgcolor="green" ><input  type="text" name="DATE" value="<?php $datejour=date("Y-m-d");echo"$datejour";?>  " size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td  bgcolor="#cccccc" nowrap="nowrap" align="left">Nom</td>
      <td bgcolor="red" ><input  type="text" name="NOMDNR" value="" size="32" /></td>
	  <td bgcolor="#cccccc" nowrap="nowrap" align="left">Prénom</td>
      <td bgcolor="red"><input type="text" name="PRENOMDNR" value="" size="32" /></td>
    </tr>
	<tr valign="baseline">
	<td bgcolor="#cccccc" nowrap="nowrap" align="left">Sexe </td>
	<td bgcolor="red"><select name="SEXE" id="SEXE">
          <option>M</option>
          <option>F</option>
        </select>
	</td>
	<td bgcolor="#cccccc" nowrap="nowrap" align="left">Né(e) Le</td>
    <td bgcolor="red"><input type="text" name="DATENAISSANCE" value="" size="32" /></td>
	</tr>
	
	<tr align="center">
    <td bgcolor="#cccccc" nowrap="nowrap" align="left">GROUPAGE</td>
	<td>
	  <select name="GROUPAGE" id="GROUPAGE">
         <option>-</option>
		 <option>A</option>
          <option>B</option>
          <option>AB</option>
          <option>O</option>
      </select></td> 
	

	<td bgcolor="#cccccc"nowrap="nowrap" align="left">RHESUS</td>
	<td>
	<select name="rhesus" id="GROUPAGE">
          <option>-</option>
		  <option>Positif</option>
          <option>negatif</option>
    </select></td> 
	</tr>
	
	
		
    <tr valign="baseline">
	<td bgcolor="#cccccc" nowrap="nowrap" align="left">Envoyer</td>
      <td><input type="submit" name="VALIDER" id="VALIDER" value="Envoyer" onClick="this.form.submit();this.disabled=true;this.value='Patientez...'"   /></td>
    <td bgcolor="#cccccc" nowrap="nowrap" align="left">nouvelle demande</td>
	  <td><input type="reset" name="VALIDER" id="VALIDER" value="ok" /></td>
	
	</tr>
	
	
	</table>	
</BR>
</BR>
</BR>
</BR>
</BR>
</BR>
</BR>
</form>  