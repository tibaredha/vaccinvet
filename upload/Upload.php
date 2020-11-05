<?php
$uploadLocation = "./UPLOAD/ARCHIVES/";
?>



      <h1 ALIGN=CENTER  >fichier a envoyer </h1>
      <form action ="index.php?uc=UPLOAD" method="post" name="fileForm" id="fileForm" enctype="multipart/form-data" >		
        <table align="center" border="1">
          <tr>
		  <td align="center">
		  <input name="upfile" type="file" size="36">
		  </td>
		  </tr>
          <tr>
		  <td align="center">
		  <input class="text" type="submit" name="submitBtn" value="Upload">
		  </td>
		  </tr>
        </table>
		
      </form>
<?php    
    if (isset($_POST['submitBtn']))
	{
?>
      <div id="caption">RESULTAT</div>
      <div id="icon2">&nbsp;</div>
      <div id="result">
        <table width="100%">
<?php

$target_path = $uploadLocation.basename( $_FILES['upfile']['name']);

if(move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) 
{
    echo "le fichier: ".  basename( $_FILES['upfile']['name']).
    " a ete corectement envoyer";
} 
else
{
    echo "il ya une erreur d'envoie veillez recomencer svp";
}

?>
        </table>
     </div>
<?php            
    }
?>  
<br>
<br>
<br>
<br>
<br>
<br>
<br>


