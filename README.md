# GERENCIADOR DATABASE
 	um simples gerenciador CRUD

#### 1° passo
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
	
#### 2° passo
	criar o seu model que extenderar a classe abstrataModel
	onde herdara as funções de select, insert, update e delete

```php
	use DataBase\Models\AbstractModel;
```
	exemplo de model

```php
	class UsuarioModel extends AbstractModel
```

#### 3° passo
	inicie o atributo que recebe a tabela.
	inicie o atributo que recebe os nomes das colunas dentro de um array.

```php
	protected $table = "usuario";
	protected $columns = ["idUsuario", "nome", "idade", "email"];
```

## PRONTO PARA O USO
	ao criar o model referente a tabela é so instaciar o model onde quiser. o objeto recebera os metodos de CRUD
	onde é possivel utiliar poucos ou nenhum codigo sql para fazer as operaçoes.


### exemplos:

```php
	$usuario = new UsuarioModel;

	/*methodo select retorna um array de objetos
	onde cada objeto e uma linha da tabela*/	
	$usuario->select();

	/*o metodo ainda pode receber argumentos para melhorar
	a pesquisa da tabela. esse argumento sera executado sem a necessidade da WHERE*/
	$usuario->select("nome LIKE '%nome%'");

	/*o metodo insert recebe um array contendo elementos contados com o mesmo numero das colunas da tabela.
	se configurou corretamente a tabela nao a necessidade de inserir a chave primaria*/
	$usuario->insert(["nome", "27", "nome@nome.com"]);
	
	/*caso queira inserir o a chave primaria tambem é possivel. é só passar como primeiro elemento do array a chave, e o segundo argumento do metodo um true ou 1*/
	$usuario->insert([5, "name", "27", "nome@nome.com"],true);

```