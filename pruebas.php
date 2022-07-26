<?php 
// $variable = '1';
// echo 'foo', (($variable==='1')? 'es correcto mi estimado': 'No es correcto mi estimado'), 'bar'; 
// echo "<br>";
// echo '', ((($variable === '1') ? 'es un 1' : $variable==='2') ? 'es un 2' : 'es un numero arriba de 1 y 2') ,'';
// echo '', ((($variable === '1') ? 'es un 1' : $variable==='2') ? 'es un 2' : 'es un numero arriba de 1 y 2') ,'';
// echo'',(($variable==='1')?:($variable==='2')?:;




/*
* author: Código Root </>
* Mi blog: https://codigoroot.net/blog
*/ 
date_default_timezone_set('America/Mexico_City');

echo "Obtener fecha y hora actual con funcion date() en PHP <br>";

$fechaActual = date('d/m/y h:i:s');
echo "<br>Fecha con formato (Dia – Mes – Año) y hora actual <br>";
echo "$fechaActual <br>";

$fechaActual_1 = date('y-m-d h:i:s');
echo "<br>Fecha con formato (Año – Mes – Dia) y hora actual <br>";
echo "$fechaActual_1 <br>";

$fechaActual_2 = date('D - F - Y h:i:s');
echo "<br>Fecha con formato (Dia - Mes - Año) y hora actual en Inglés <br>";
echo "$fechaActual_2 <br>";

 ?>