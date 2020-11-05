<h3 align="center">M'enregistrer Pour Se Connecter... </h3>
<p align="center"    ><img  id="mydiv2"   align="center"  src="IMAGES/vet.png" width="100" height="100" alt="1" /></p>
<form action ="index.php?uc=CONN2" method="post" name="form1" id="form1">
<table align="center" border="1">
 
	<tr valign="baseline">
      <td nowrap="nowrap" align="left">Nom Vétérinaire :</td>
      <td align="center"  >
 <?php 
    echo '<select size=1 name="USER">'."\n";//WHERE ADMIN = 0
    echo '<option   value="-1">____________________________</option>'."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM USERS  where ok='1'    order by USER " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data['USER'].'">'.$data['USER'];
    echo '</option>'."\n";
    }
    echo '</select>'."\n";  
   ?>
	  </td>
    </tr>
	<tr valign="baseline">
      <td nowrap="nowrap" align="left">AVN :</td>
      <td align="center"   > <input type="TEXT" name="AVN" value="89034" size="20" /></td>     
    </tr> 
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Mot de passe:</td>
      <td  align="center"  ><input type="password" name="MDP" value="0" size="20" /></td>
    </tr>
    <tr valign="baseline">
      
      <td align="center"  COLSPAN=2 ><input type="submit" value="connection" /></td>
    </tr>
  </table>
 <br>
<br>
<br>
<br><br>   
</form>