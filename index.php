<?php

require __DIR__ .'/vendor/autoload.php';


use DataBase\UserModel;
echo "<pre>";
try {

$u = new UserModel;
var_dump($u->select());

//$u->delete(2);
//$u->update(["vinicius"], "nameUser LIKE '%vin%'"));


	

} catch (\Exception $ex) {
	echo "erro: " . $ex->getMessage() . " codigo: " . $ex->getCode(); 
}






?>