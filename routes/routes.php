<?php
use JKRoutes\Route;

Route::add("/",function(){
    view("inicio.php");
});

Route::pathNotFound(function($path) {
    header('HTTP/1.0 404 Not Found');
	jsonApi(null,404);
});
Route::run(BASEPATH);


?>