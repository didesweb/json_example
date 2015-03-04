<!DOCTYPE HTML>
<!-- Didesweb -->  
<!-- Diseño y desarrollo web -->  
<!-- http://didesweb.com/-->  
<!-- Este obra está protegida bajo licencia Creative Commons Attribution --> 
<html lang="es">
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<title>Didesweb, interpretar JSON con Javascript y jQuery</title>
<meta charset="utf-8">
	<style type="text/css"> 
	body{text-align:center;}
	#exist, #exist2, #exist3, #exist4, #exist5 {
		color: #0099CC !important;
	}
	</style>
</head>
<body>
<h1>&copy; Didesweb, interpretar JSON con Javascript y jQuery</h1>
<h2>Ejemplo 1 (Javascript)</h2>
<p id="exist"></p>
<script>
     var almacen = [
          {
               "articulo":"cocina",
               "seccion":"24"
          	}, 
          {
               "articulo":"puerta",
               "seccion":"19"
          },
          {
               "articulo":"campana",
               "seccion":"18"
          },
     ];
     document.getElementById("exist").innerHTML = "Articulo: " +
     almacen[0].articulo + " - " + "Seccion: " + almacen[0].seccion;
</script>
<h2>Ejemplo 2 (Javascript JSON externo)</h2>
<div id="exist2"></div>
<script>
var xmlhttp = new XMLHttpRequest();
var url = "pruebadatos.json";
xmlhttp.onreadystatechange=function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          myFunction(xmlhttp.responseText);
     }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();
function myFunction(response) {
     var arr = JSON.parse(response);
     var i;
     var out = "";
     for(i = 0; i < arr.length; i++) {
          out += "Artculo: " +
          arr[i].articulo +
          "<br>Seccion: " +
          arr[i].seccion +
          "<br><hr>";
     }
     document.getElementById("exist2").innerHTML = out;
}
</script>
<h2>Ejemplo 3 (jQuery JSON externo)</h2>
<div id="exist3"></div>
<script>
     $.getJSON('pruebadatos.json', function(data) {
          var output="";
          for (var i in data) {
               output+="Articulo: " + data[i].articulo + " - Seccion: " + data[i].seccion + "<br>";
          }
          document.getElementById("exist3").innerHTML=output;
     });
</script>
<h2>Ejemplo 4 (jQuery JSON externo con nombre en array)</h2>
<div id="exist4"></div>
<script>
$.getJSON('pruebadatos2.json', function(data) {
     var output="";
     for (var i in data.almacen) {
          output+="Articulo: " + data.almacen[i].articulo + " - Seccion: " + data.almacen[i].seccion + "<br>";
     }
     document.getElementById("exist4").innerHTML=output;
});
</script>
</body>
</html>
