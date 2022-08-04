<?php

namespace DataBase;

use Exception;

class Config
{
	private $configFile;
	private $configDB;
	

	function __construct()
	{
		//verifica se o arquivo existe e se nao esta vazio
		
		if(file_exists(__DIR__."/config.json") && file_get_contents(__DIR__."/config.json") != null)
		{
			$this->setConfigFile();
		}
		else
		{
			throw new Exception("ERRO NA CONFIGURACAO DO BANCO DE DADOS", 500);
			return;
		}		

	}

	private function setConfigFile()
	{
		$file = file_get_contents(__DIR__."/config.json");
		$this->configFile = $file;
		$this->setVars();
		$this->defineDB();
	
	}

	private function getConfigFile()
	{
		return $this->configFile;
	}

	private function setVars()
	{
		$jsonConfig = json_decode($this->getConfigFile());
		$this->configDB = $jsonConfig->DB;
		
	}

	private function defineDB()
	{
		define("DB_DRIVER", $this->configDB->DB_DRIVER);
		define("DB_HOST", $this->configDB->DB_HOST);
		define("DB_USER", $this->configDB->DB_USER);
		define("DB_PASS", $this->configDB->DB_PASS);
		define("DB_NAME", $this->configDB->DB_NAME);
	}


}


?>