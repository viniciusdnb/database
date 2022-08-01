<?php

namespace DataBase\Core;

use DataBase\Core\CallCore;

abstract class Prepare
{
	protected $result;
	protected $callCore;
	protected $columns;	
	protected $table;
	protected $preparedColum;

	public function __construct($table, $columns)
	{
		$this->callCore = new CallCore;
		
		$this->table = $table;
		$this->columns = $columns;		
				
	}

	protected function prepareColumnsInsert($columns)
	{
		//insere os dois pontos para a funcao prepare do PDO
		$columns[0] = ":". $columns[0];

		//implode o array de colunas
		return implode(",:", $columns);

	}

	protected function prepareColumnsUpdate($columns)
	{
	

		for($i = 0; $i < count($columns); $i++)
		{
			$columns[$i] .= "=:".$columns[$i];
		}

		return implode(",", $columns);
	}

	protected function prepareValues($columns, $val)
	{
		//cria o array de values preparado inserir 
		$values = [];
	
		for($i = 0; $i < count($columns); $i++)
		{
			$values[":" . $columns[$i]] = $val[$i];
		}

		return $values;
	}
	public function getResult()
	{
		return $this->result;
	}

	protected function getColumns()
	{
		return $this->columns;
	}

	protected function getBaseModel()
	{
		return $this->baseModel;
	}

	protected function getTable()
	{
		return $this->table;
	}


	function __destruct()
	{
		
	}
}

?>