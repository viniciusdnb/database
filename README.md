# GERENCIADOR DATABASE
 	um simples gerenciador CRUD

## 1° passo
	configurar o arquivo config.json, para gerar o DNS e acessos ao banco de dados atraves do PDO do php
	
	
```json	
	{
		"DB":{
			"DB_DRIVER":"driver do seu banco de dados",
			"DB_HOST":"host do seu banco de dados",
			"DB_USER":"usuario do seu banco de dados",
			"DB_PASS":"senha do seu banco de dados",
			"DB_NAME":"nome do seu banco de dados"
		}		
	}
```
	
## 2° passo
	criar o seu model que extenderar a classe abstrataModel
	onde herdara as funções de select, insert, update e delete

```php
	use DataBase\Models\AbstractModel;
```
	exemplo de model

```php
	class UsuarioModel extends AbstractModel
```

