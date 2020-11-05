//1ER PRODUIT CGRAP
$query_liste = "SELECT * FROM STOCK where IDPSL = 1  ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$result = mysql_fetch_array( $requete ) ;
mysql_free_result($requete);
$CGRAP=$result["QPSL"]; //QUANTITE EN STOCK AVANT COMMANDE

//2EME PRODUIT CGRAN
$query_liste = "SELECT * FROM STOCK where IDPSL = 2  ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$result = mysql_fetch_array( $requete ) ;
mysql_free_result($requete);
$CGRAN=$result["QPSL"]; //QUANTITE EN STOCK AVANT COMMANDE

//3EME PRODUIT CGRBP
$query_liste = "SELECT * FROM STOCK where IDPSL = 3  ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$result = mysql_fetch_array( $requete ) ;
mysql_free_result($requete);
$CGRBP=$result["QPSL"]; //QUANTITE EN STOCK AVANT COMMANDE	

//4EME PRODUIT CGRBN
$query_liste = "SELECT * FROM STOCK where IDPSL = 4  ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$result = mysql_fetch_array( $requete ) ;
mysql_free_result($requete);
$CGRBN=$result["QPSL"]; //QUANTITE EN STOCK AVANT COMMANDE	


//5EME PRODUIT CGRABP
$query_liste = "SELECT * FROM STOCK where IDPSL = 5  ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$result = mysql_fetch_array( $requete ) ;
mysql_free_result($requete);
$CGRABP=$result["QPSL"]; //QUANTITE EN STOCK AVANT COMMANDE	

//6EME PRODUIT CGRABN 
$query_liste = "SELECT * FROM STOCK where IDPSL = 6  ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$result = mysql_fetch_array( $requete ) ;
mysql_free_result($requete);
$CGRABN=$result["QPSL"];   //QUANTITE EN STOCK AVANT COMMANDE	


//7EME PRODUIT CGROP
$query_liste = "SELECT * FROM STOCK where IDPSL = 7  ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$result = mysql_fetch_array( $requete ) ;
mysql_free_result($requete);
$CGROP=$result["QPSL"];   //QUANTITE EN STOCK AVANT COMMANDE

//8EME PRODUIT CGRON
$query_liste = "SELECT * FROM STOCK where IDPSL = 8  ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$result = mysql_fetch_array( $requete ) ;
mysql_free_result($requete);
$CGRON=$result["QPSL"];   //QUANTITE EN STOCK AVANT COMMANDE