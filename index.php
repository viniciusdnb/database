<?php

require __DIR__ .'/vendor/autoload.php';


use DataBase\Config;

try {
	$c = new Config;

	echo LOCAL;

} catch (\Exception $ex) {
	echo "erro: " . $ex->getMessage() . " codigo: " . $ex->getCode(); 
}






?>