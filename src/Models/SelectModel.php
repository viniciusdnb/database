<?php

namespace DataBase\Models;

use DataBase\Core\Prepare;

class SelectModel extends Prepare
{
	function select($where = null)
	{
		$array = $this->getColumns();

		$table = $this->getTable();

		$query = "SELECT ";

		for($i = 0; $i < count($array); $i++)
		{
			$query .= $array[$i] . ", ";
		}

		$query = rtrim($query, ", ");

		$query .= " FROM " . $table;

		if(!empty($where))
		{
			$query .= " WHERE " . $where;
		}

		$this->result = $this->callCore->select($query);
	}
}

?>