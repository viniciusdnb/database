<?php

namespace DataBase;

use DataBase\Models\AbstractModel;

class UserModel extends AbstractModel
{
	protected $table = "user";
	protected $columns = ["idUser", "nameUser"];
}

?>