<?php
define('BASEPATH','/');

function jsonApi($res = array(),$code=200,$msj=""){
	header('Content-Type: application/json');
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	if($res == null){
		$res = null;
	}
	$res = array(
		"code" => $code,
		"data" => $res,
		"msj" => $msj
	);
	echo json_encode($res);
}
function view($filepath){
	include 'views/'.$filepath;
}
?>