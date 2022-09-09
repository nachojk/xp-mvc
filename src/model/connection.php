<?php 

function conexSQL($servidor = DB_HOST, $user = DB_USER, $pass = DB_PASSWORD, $db = DB_NAME)
{
    $conexion = mysqli_connect($servidor, $user, $pass, $db);
    if (!$conexion) {
        die("No se pudo realizar la conexión a la Base de Datos de Merca. " . mysqli_connect_error());
    }
    mysqli_set_charset($conexion,"utf8");
    return $conexion;
}

?>