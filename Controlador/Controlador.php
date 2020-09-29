<?php
include 'funciones/config.php';

include 'Modelo/Modelo.php';
class Controlador  
{
    function handler($evento){
        $inicio = set_obj();
        switch ($evento) {
            case 'inicio':
                    include 'Vista/inicio.php';
                break;
            
            default:
                echo "Error 404 - Página no encontrada";
                break;
        }
    }
}
function set_obj()
		{
		    $obj = new Modelo();
		    return $obj;
		}


?>