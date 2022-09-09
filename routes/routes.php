<?php
use JKRoutes\Route;
use JKModel\Model;
Route::add("/",function(){
    view("inicio.php");
});

Route::add("/database",function(){
    $res = Model::getArray("*","table_name");
    jsonApi($res);
});

Route::pathNotFound(function($path) {
    header('HTTP/1.0 404 Not Found');
	jsonApi(null,404);
});
Route::run(BASEPATH);


?>