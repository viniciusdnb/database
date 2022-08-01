<?php

	namespace DataBase\Models;

	use DataBase\Models\InsertModel;
	use DataBase\Models\DeleteModel;
	use DataBase\Models\SelectModel;
	use DataBase\Models\UpdateModel;

	abstract class AbstractModel
	{
		
		function select(string $where = null)
		{
			$model = new SelectModel($this->table, $this->columns);

			$model->select($where);

			return $model->getResult();
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