<?php

namespace DataBase\Models;

use DataBase\Core\Prepare;

class DeleteModel extends Prepare
{
	function deleteId(int $id)
	{
		$this->callCore->delete($this->table, $this->columns[0] . " = " . $id);
	}

	function deleteWhere(string $where)
	{
		$this->callCore->delete($this->table, $where);
	}
}
?>