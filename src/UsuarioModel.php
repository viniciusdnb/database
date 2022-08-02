<?php

namespace DataBase;

use DataBase\Models\AbstractModel;

class UsuarioModel extends AbstractModel
{
	protected $table = "usuario";
	protected $columns = ["idUsuario", "nome", "idade", "email"];
}

?>