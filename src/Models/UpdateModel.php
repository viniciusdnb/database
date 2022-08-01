<?php

namespace DataBase\Models;

use DataBase\Core\Prepare;

class UpdateModel extends Prepare
{
	function update(array $values, string $where, bool $arr_shift)
	{
		if(!$arr_shift)
		{
			array_shift($this->columns);
		}

		$this->preparedColum = $this->prepareColumnsUpdate($this->columns);

		$this->save($values, $where);
	}

	private function save($values, $where)
	{
		$preparedVaules = $this->prepareValues($this->getColumns(), $values);

		return $this->callCore->update($this->table, $this->preparedColum, $preparedVaules, $where);

	}
}

?>