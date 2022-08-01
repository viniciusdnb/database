<?php

	namespace DataBase\Core;

	use DataBase\Core\AbstractCore;

	class CallCore extends AbstractCore
	{
		public function select(string $sql)
		{
			$result = $this->abstracSelect($sql);

			return $result->fetchAll(\PDO::FETCH_CLASS);
		}

		public function insert(string $table, string $columns, array $values)
		{
			$result = $this->abstractInsert($table, $columns, $values);

			return $result;
		}

		public function update(string $table, string $columns, array $values, string $where)
		{
			$result = $this->abstractUpdate($table, $columns, $values, $where);

			return $result;
		}

		public function delete(string $table, string $where)
		{
			$result = $this->abstractDelete($table, $where);

			return $result;
		}
	}


?>