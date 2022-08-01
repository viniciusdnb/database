<?php

namespace DataBase\Models;

use DataBase\Core\Prepare;

class InsertModel extends Prepare
{
	function insert(array $values, bool $arr_shift)
	{
		if(!$arr_shift)
		{
			array_shift($this->columns);

		}

		$this->preparedColum = $this->prepareColumnsInsert($this->getColumns());

		if(is_array($values[1]))
		{
			for($i = 0; $i<count($values); $i++)
			{
				$this->save($values[$i]);				
			}
		}
		else
		{
			$this->save($values);
		}
	}

	private function save($values)
	{
		$preparedValues = $this->prepareValues($this->getColumns(), $values);
		$this->result = $this->callCore->insert($this->table, $this->preparedColum, $preparedValues);
	}
}

?>