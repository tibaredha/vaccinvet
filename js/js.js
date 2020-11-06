

$(document).ready(function()
{
		$(document).on('click', '#submit_btn', function(){
			var MD = $('#MD').val();
            var PS = $('#PS').val();
            var VA = $('#VA').val();
            var RA = $('#RA').val();
            var DA = $('#DA').val();
			var IDELEV = $('#IDELEV').val();
			// alert(MD+PS+VA+RA+DA);
			$.ajax({
				url: './js/server.php',
				type: 'POST',
				data: {
				'save': 1,
				'IDELEV':IDELEV,
				'MD': MD,
				'PS': PS,
				'VA': VA,
				'RA': RA,
				'DA': DA,
				},
				success: function(response){
				// alert("ok2");
				$('#MD').val('');
				$('#PS').val('');
				$('#VA').val('');
				$('#RA').val('');
				$('#DA').val('');
				// $('#listmed').append(response);
			}
			});
			
			$.ajax({
				url: './js/server1.php',
				type: 'POST',
				data: {
				'save': 1,
				'IDELEV':IDELEV
				},
				success: function(html)
				{
				// alert("ok3"+IDELEV);
				$("#listmed").html(html);
			    }
			});	
		});
		
		// $(document).on('click', '#submit_btnx', function(){
		// alert("ok3");
		
		// });
		
});




$(document).ready(function()
{
		$(".country").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "./1VAC/AJAXN.PHP",             // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".COMMUNEN").html(html);   // On peut faire ce qu'on veut avec ici
						} 
					
			});

		});
});
$(document).ready(function()
{
		$(".countryR").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",
				url: "./1VAC/AJAXR.PHP",
				data: dataString,
				cache: false,
				success: function(html)
						{
						$(".COMMUNER").html(html);
						} 
			});

		});
});
//WILAYA DAIRA COMMUNE ADRESSE NOUVELLE CONCEPTION 
$(document).ready(function()
{
		$(".WILAYA1").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",
				url: "./WDCA/AJAXR.PHP",
				data: dataString,
				cache: false,
				success: function(html)
						{
						$(".DAIRA2").html(html);
						} 
			});

		});
});
$(document).ready(function()
{
		$(".DAIRA2").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",
				url: "./WDCA/AJAXN.PHP",
				data: dataString,
				cache: false,
				success: function(html)
						{
						$(".COMMUNE3").html(html);
						} 
			});

		});
});
//









function CLAVELEUSE()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.formGCS.b1.value);                 
var b = parseFloat(this.document.formGCS.b2.value);                 
var c = parseFloat(this.document.formGCS.b3.value);                 
var d = parseFloat(this.document.formGCS.b4.value);                 
var E = parseFloat(this.document.formGCS.b5.value);                 
var F = parseFloat(this.document.formGCS.b6.value);                 
var G = parseFloat(this.document.formGCS.b7.value);                 
// calcul et affectation du résultat à la variable ... result
var result =  parseFloat(a +  b + c + d + E + F + G );               
// affichage du résultat
this.document.formGCS.b8.value = result;                   
}
function BRUCELLIQUE()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.formGCS.c1.value);                 
var b = parseFloat(this.document.formGCS.c2.value);                 
var c = parseFloat(this.document.formGCS.c3.value);                 
var d = parseFloat(this.document.formGCS.c4.value);                 
var E = parseFloat(this.document.formGCS.c5.value);                 
var F = parseFloat(this.document.formGCS.c6.value);                 
var G = parseFloat(this.document.formGCS.c7.value);                 
// calcul et affectation du résultat à la variable ... result
var result =  parseFloat(a +  b + c + d + E + F + G );               
// affichage du résultat
this.document.formGCS.c8.value = result;                   
}
function APHTEUSE()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.formGCS.d1.value);                 
var b = parseFloat(this.document.formGCS.d2.value);                 
var c = parseFloat(this.document.formGCS.d3.value);                 
var d = parseFloat(this.document.formGCS.d4.value);                 
var E = parseFloat(this.document.formGCS.d5.value);                 
var F = parseFloat(this.document.formGCS.d6.value);                 
// calcul et affectation du résultat à la variable ... result
var result =  parseFloat(a +  b + c + d + E + F  );               
// affichage du résultat
this.document.formGCS.d7.value = result;                   
}
function RABIQUE()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.formGCS.e1.value);                 
var b = parseFloat(this.document.formGCS.e2.value);                 
var c = parseFloat(this.document.formGCS.e3.value);                 
var d = parseFloat(this.document.formGCS.e4.value);                 
var E = parseFloat(this.document.formGCS.e5.value);                 
var F = parseFloat(this.document.formGCS.e6.value);                                  
// calcul et affectation du résultat à la variable ... result
var result =  parseFloat(a +  b + c + d + E + F  );               
// affichage du résultat
this.document.formGCS.e7.value = result;                   
}

function ANTIRABIQUECC()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.formGCS.b1.value);                 
var b = parseFloat(this.document.formGCS.b2.value);                 
var c = parseFloat(this.document.formGCS.b3.value);                 
var d = parseFloat(this.document.formGCS.b4.value);                              
// calcul et affectation du résultat à la variable ... result
var result =  parseFloat(a +  b + c + d  );               
// affichage du résultat
this.document.formGCS.b8.value = result;                   
}
function PESTE()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.formGCS.x1.value);                 
var b = parseFloat(this.document.formGCS.x2.value);                 
var c = parseFloat(this.document.formGCS.x3.value);                 
var d = parseFloat(this.document.formGCS.x4.value);                 
var E = parseFloat(this.document.formGCS.x5.value);                 
var F = parseFloat(this.document.formGCS.x6.value);                 
var G = parseFloat(this.document.formGCS.x7.value);                 
// calcul et affectation du résultat à la variable ... result
var result =  parseFloat(a +  b + c + d + E + F + G );               
// affichage du résultat
this.document.formGCS.x8.value = result;                   
}