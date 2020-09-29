<?php 
include 'Controlador/Controlador.php';
$handler  = new Controlador();

$code = 'inicio';

if(isset($_GET['evento'])){
    $code = $_GET['evento'];
}

$handler->handler($code);


?>