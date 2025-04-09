<?php


$conexion = mysqli_connect('localhost','id13746186_admin','v8*xi*OdY(x~{)hH','id13746186_datafast')or die ("No se ha podido conectar al servidor de Base de datos");

if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    exit;
}
return $conexion;
//'localhost', 'recordar_cartera', '}DWcuS7FKJBp','recordar_cartera'
?>