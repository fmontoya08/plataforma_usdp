<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body onload="alerta()">
	<script>
		
function alerta()
    {
    var mensaje;
    var opcion = confirm("Clicka en Aceptar o Cancelar");
    if (opcion == true) {
        location.href = "./eliminar_usuario.php";
	} else {
	   location.href = "./usuario.php";
	}
	document.getElementById("ejemplo").innerHTML = mensaje;
}
	</script>
</body>
</html>