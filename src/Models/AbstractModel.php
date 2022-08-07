<?php

	namespace DataBase\Models;

	use DataBase\Models\InsertModel;
	use DataBase\Models\DeleteModel;
	use DataBase\Models\SelectModel;
	use DataBase\Models\UpdateModel;

	abstract class AbstractModel
	{
		
		//funcao que retorna objeto padrao do php
		function select(string $where = null)
		{
			$model = new SelectModel($this->table, $this->columns);

			$model->select($where);

			return $model->getResult();
		}

		//funcao que retorna um json como resultado da consulta
		function selectJson(string $where = null)
		{
			$table = $this->select($where);

			$json = [];

			foreach($table as $value)
			{
				$json[$value->{$this->columns[0]}] = $this->arr($value, $this->columns);
			}

			return json_encode($json, JSON_FORCE_OBJECT);
		}

		//funcao que retorna um array somente com o resultado da pesquisa
		//onde cada indce do array é o nume da coluna
		private function arr($value, $colums)
		{
			$arr = [];

			for($i = 0; $i < count($colums); $i++)
			{
				//{}serve para chamar o atributo da classe atraves da string passada
				$arr[$colums[$i]] = $value->{$colums[$i]};
			}

			return $arr;
		}



		function update(array $values, string $where, bool $arr_shift = false)
		{
			$model = new UpdateModel($this->table, $this->columns);

			$model->update($values, $where, $arr_shift);
		}

		function insert(array $values, bool $arr_shift = false)
		{
			$model = new InsertModel($this->table, $this->columns);

			$model->insert($values, $arr_shift);
		}
		/**
	 	* @param $var - int fara a operacao de exclusao pela coluna da chave primaria. string fara a opreação de exclusao pela clausura where
	 	*/
		function delete($var)
		{
			$model = new DeleteModel($this->table, $this->columns);

			if(is_int($var))
			{
				$model->deleteId($var);
			}

			if(is_string($var))
			{
				$model->deleteWhere($var);
			}
		}
	}

?>