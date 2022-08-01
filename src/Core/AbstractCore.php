<?php

namespace DataBase\Core;

use DataBase\Connection;
use Exception;
use PDO;
use PDOException;
/* 
	objeto abstrato com funcao de insercao leitura delete e atualizacao de dados no banco de dados.
	o coracao do CRUD
*/
abstract class AbstractCore
{
	private $connection;

	public function __construct()
	{
		$this->connection = Connection::getConnection();
	}

	public function abstracSelect($sql)
	{
		if(!empty($sql))
		{
			try
			{
				return $this->connection->query($sql);
			}
			catch(PDOException $ex)
			{
				throw new Exception("nao foi possivel fazer a consulta no banco de dados \n ERRO: mensagem "  . $ex->getMessage() .  " CODE: " . $ex->getCode(), 500);
			}
		}
	}

	public function abstractInsert($table, $columns, $values)
	{
		if(!empty($table) && !empty($columns) && !empty($values))
		{
			$params = $columns;

		
			$columns = str_replace(":", "", $columns);

			try
			{
				$this->connection->beginTransaction();
				$stmt = $this->connection->prepare("INSERT INTO $table ($columns) VALUES ($params)");				
				$stmt->execute($values);
				$this->connection->commit();
				return $stmt->rowCount();				
			}
			catch(PDOException $ex)
			{
				$this->connection->rollBack();
				throw new Exception("Erro ao inserir - " . $ex->getMessage());
				return null;
			}
		}
		else
		{
			throw new Exception("Dados faltantes para executar a funcao", 500);
			return null;
		}
	}
	
	public function abstractUpdate($table, $columns, $values, $where = null)
	{
		if(!empty($table) && !empty($columns) && !empty($values))
		{
			if($where)
			{
				$w = "WHERE " . $where;
			}
			var_dump("UPDATE $table SET $columns $w");
			try
			{
				$this->connection->beginTransaction();
				$stmt = $this->connection->prepare("UPDATE $table SET $columns $w");
				$stmt->execute($values);
				$this->connection->commit();
				return $stmt->rowCount();
			}
			catch(PDOException $ex)
			{
				$this->connection->rollBack();
				throw new Exception("Erro ao atualizar " . $ex->getMessage() . " code: " . $ex->getCode(), 500);
				return false;
			}
		}
		else
		{
			throw new Exception("Nao foi possivel atualizar dados faltante", 500);
			return false;
			
		}
	}

	public function abstractDelete($table, $where)
	{
		if(!empty($table) && !empty($where))
		{
			$w = "WHERE " . $where;

			try
			{
				$this->connection->beginTransaction();
				$stmt = $this->connection->prepare("DELETE FROM $table $w");
				
				$stmt->execute();
				$this->connection->commit();
				return $stmt->rowCount();
			}
			catch(PDOException $ex)
			{
				$this->connection->rollback();
				throw new Exception("Erro ao deletar " . $ex->getMessage() ." " . $ex->getCode(), 500);
				return false;
			}
		}
		else
		{
			throw new Exception("Nao foi possivel deletar a dados faltante", 500);
			return false;
			
		}
	}

}

?>