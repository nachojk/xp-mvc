<?php 
namespace core;

class Core {
    public static function handler(){
        include 'Route.php';
        include 'config.php';
        $dataJson = json_decode(file_get_contents("php://input",true));
        include dirname(__DIR__, 1)."/model/Model.php";
        include dirname(__DIR__, 2)."/routes/routes.php";
        
    }

}

?>