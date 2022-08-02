<?php

require __DIR__ .'/vendor/autoload.php';



use DataBase\UsuarioModel;

echo "<pre>";
try {

$usuario = new UsuarioModel;

$usuario->insert([6, "filipe", "27", "filipe@hotmail.com"],true);




	

} catch (\Exception $ex) {
	echo "erro: " . $ex->getMessage() . " codigo: " . $ex->getCode(); 
}






?>