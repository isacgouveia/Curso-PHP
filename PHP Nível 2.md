- [Superglobais](#page1)
- [MVC](#page2)
    - [View](#page3)
    - [Connector](#page4)
    - [Model](#page5)
- [Classes](#page6)

---
<a id="page1"></a>

## Superglobais
As **super globais** são variáveis especiais que es~tao disponíveis em todo o escopo de um projeto.
Isso significa que você pode acessar uma super global de qualquer lugar, independentemente de onde o código está sendo executado (dentro de uma função, classe ou fora de qualquer função).
Essas variáveis são automaticamente preenchidas pelo PHP durante a execução do seu código e contém informações muito úteis sobre o estado da aplicação, como dados enviados via formulários, sessões, variáveis de servidor, entre outros.

**Principais Super Globais no PHP**
Existem várias super globais no PHP, cada uma com uma finalidade especifíca.

**$_GET**
- Descrição: contém dados enviados via método HTTP GET (normalmente através da URL)
- Como funciona: Quando você envia dados via URL (como **index.php?nome=Isac&idade=26**), esss dados ficam disponíveis no super global **$_GET**

**Exemplo:**
```php
<?php
    // URL: index.php?nome=Isac&idade=26
    echo $_GET['nome']; // Exibe Isac
    echo $_GET['idade']; // Exibe 26
?>
```

**$_POST**
- Descrição: contém dados enviados via método HTTP POST (usado principalmente em formulários);
- Como funciona: Os dados enviados por um formulário com o método POST ficam disponíveis na super global **$_POST**.

**Exemplo:**
```php
<?php
    // Exemplo de um formulario com o método POST:
    // <form method="post" action="processar.php">
    // <input type="text" id="nome" name="nome">
    // ...
    // </form>
    echo $_POST['nome']; // Exibe o valor enviado pelo formulário.
?>
```

**$_REQUEST**
- Descrição: Contém dados de $_GET, $_POST e dados dos cookies. Ou seja, é uma combinação das duas super globais anteriores, além de dados de cookies.
- Como funciona: Quando você precisa acessar dados de qualquer tipo de requisição voc~e pode usar o **$_REQUEST**

**Exemplo:**
```php
<?php
    echo $_REQUEST['nome']; // Pode acessar dados enviados via GET ou POT.
?>
```

**$_SERVER**
- Descrição: Contém informações sobre o servidor e o ambiente de execução do PHP;
- Como funciona: Você pode obter informações como o nome do servidor, a URL, informações sobre os cabeçalhos HTTP, entre outras.

**Exemplo:**
```php
<?php
    echo $_SERVER['SERVER_NAME']; // Exibe o nome do servidor.
    echo $_SERVER['SERVER_URI']; // Exibe a URL solicitada.
?>
```

**$_SESSION**
- Descrição: Contém dados da sessão atual do usuário. É usado para armazenar informações sobre a navegação de um usuário, como dados de login;
- Como funciona: Você pode usar para manter informações entre várias páginas, como a autenticação do usuário.

**Exemplo:**
```php
<?php
    session_start(); // Inicia a sessão

    // Armazena um valor na sessão.
    $_SESSION['nome'] = 'Isac';

    // Acessando um valor da sessão;
    echo $_SESSION['usuario']; // Exibe "Isac".
?>
```

**$_cookies**
- Descrição: Contém dados armazenados no navegador do cliente, chamados de cookies. Esses dados persistem entre as requisições feitas pelo mesmo usuário;
- Como funciona: Você pode usar para armazenar preferências ou lembrar informações do usuário entre visitas ao site.

**Exemplo:**
```php
<?php
    // Criando um cookie.
    setcookie('usuario', 'Isac', time() + 3600);

    // Acessando um cookie
    if(isset($_cookie['usuario'])){
        echo $_cookie['usuario']; // Exibe Isac
    }
?>
```

**$_files**
- Descrição: Contém informações sobre arquivos carregados por meio de formulários HTML com o método POST;
- Como funciona: Você pode usar para manipular uploads de arquivos, como imagens, documentos etc.

**Exemplo:**
```php
<?php
    // Formulário de upload de arquivo
    // <form method="post" enctype="multipart/form-data">
    // <input type="file" name="arquivo">
    // <input type="submit">
    // </form>

    if(isset($_files['arquivo'])){
        echo $_files['arquivo']['name']; // Exibe o nome do arquivo
        echo $_files['usuario']['size']; // Exibe o tamanho do arquivo
    }
?>
```

---
<a id="page2"></a>

## MVC
Para organizar as rotas e controladores, é importante dividir o projeto em views seguindo o padrão MVC.
- **M**odel (Armazena os Dados)
- **V**iew (Relacionados à interface - HTML)
- **C**ontroler (fornecer dados a view e manipular os models)

<a id="page3"></a>

**View** - organização do template HTML, separando sempre as categórias em arquivos
**Exemplo:**
Ao invés de deixar tudo no index.php iremos criar um template HTML e chamar no index.php

***INDEX.PHP***
```php
<?php 
    require 'view/template/app.php';
?>
```
- **require** é uma declaração que inclui e executa o código de um arquivo externo dentro do script atual.
 
***APP.PHP**
```html
<?php 
    <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Wise</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-stone-950 text-stone-200">
    <header class="bg-stone-900">
        <nav class="mx-auto max-w-screen-lg flex justify-between py-4">
            <!-- Logo -->
            <div class="font-bold text-xl tracking-wide">
                Book Wise
            </div>

            <ul class="flex space-x-4 font-bold">
                <li><a href="/" class="text-lime-500">Explorar</a></li>
                <li><a href="/meus-livros.php" class="hover:underline">Meus Livros</a></li>
            </ul>
            <ul>
                <li><a href="/login.php" class="hover:underline">Login</a></li>
            </ul>
        </nav>
    </header>

    <main class="mx-auto max-w-screen-lg space-y-6">
        <?php require "views/livro.view.php"; ?> 
    </main>
    
</body>
</html>
?>
```

estamos chamando o arquivo "views/livro.view.php" onde estão a construção do HTML referente ao livro.

```html
<div class="p-2 rounded border-stone-800 border-2 bg-stone-900 mt-6">

    <div class="flex">

        <div class="w-1/3">Imagem</div>

        <div class="space-y-1">

            <a href="/livro?id=<?= $livro->id ?>" class="font-semibold hover:underline"><?= $livro->titulo ?></a>
            <div class="text-xs italic"><?= $livro->autor ?></div>
            <div class="text-xs italic">⭐⭐⭐⭐⭐(3 Avaliações)</div>

        </div>
    </div>

    <div class="text-sm mt-2"><?= $livro->descricao ?></div>

</div>
```

#### Explicação
- Index.php chama o app.php que está localizado na pasta view/template/app.php
- app.php tem toda a construção do front-end (header e etc..) e na MAIN chama o livro.view.php que está localizado na pasta view/livro.view.php
- livro.view.php é a construção front-end das informações do livro

***Apenas um exemplo, pois não passamos nenhuma base de dados contento as informações de cada livro.***

<a id="page4"></a>

**Controllers** - Controlar para lidar com a lógica de manipulação dos dados

**TIP** - ***isset - verifica se a chave existe dentro do array***

---

<a id="page6"></a>

## Classes
Objeto é uma instância de uma classe, um "molde" que define um tipo de dado com seus atributos (propriedades) e métodos (comportamentos).

**Exemplo de criação de classe:**
```php
<?php
    class Celular {

    }
?>
```

Agora iremos criar uma classe com caracteristicas(propriedades), e comportamentos (métodos), e iremos acessar a classe.

- **Propriedade** - são variáveis que armazenam dados espefícios de um objeto.
- **Métodos** - são funções que definem as ações que um objeto pode executar.

**Exemplo:**
```php
<?php
    class Celular {

        // Propriedades
        public $tamanho;
        public $cor;
    
        // Métodos
        public function ligar(){
            echo 'Estou ligando...';
        }
        
    }

    $celular1 = new Celular;
    $celular1->$tamanho = 'Pro Max';
    $celular1->$cor = 'Dourado';
    $celular1->ligar();

    $celular2 = new Celular;
    $celular2->$tamanho = 'Pro';
    $celular2->$cor = 'Branco';

    var_dump($celular1, $celular2);
?>

```

Conceitos:
- **Public** e **Private** são modificadores de acesso que controla onde uma propriedade ou método pode ser acessado. 
    - **public** - permite que o membro seja acessado de qualquer lugar, tanto dentro quanto fora da classe.
    - **private** - restringe o acesso exclusivamente à classe onde foi definido, impedindo o acesso de subclasses e de outras classes.
- **new** - usada para instanciar uma classe, ou seja, criar um novo objeto a partir de uma classe definida.  
- **->** - é o operador de objeto, usado para acessar uma propriedade ou método de uma instância de classe (um objeto)

**Exercício DB**
```php
<?php
    // Acessando o banco de dados
    $db = new DB();
    $livros = $db->livros();

    // Criando uma classe DB
    class DB{
        // Criando uma função para conectarmos a database
        public function livros(){
            // Criando conexão com o banco de dados
            $db = new PDO('sqlite:database.sqlite');

            // Selecionando a tabela livros
            $query = $db->query("select * from livros");

            // Extraindo todos os dados da tabela livros
            return $query->fetchall();

        }
    }
?>
```

Conceitos
- **query()** - utilizado para executar códigos sql
- **fetchall** - Método que recupera todas as linhas restante de um conjunto de resultados de consulta de banco de dados, devolvendo-as como um array único. (utilizado para extrair todos os dados.)

**Exercício Real**
Foram utilizados nesta exercício.
- **HTML**
- **PHP**
- **SQLITE**

Foi desenvolvido o corpo HTML contendo o CSS
```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe e Função</title>

    <style>
        .details{
            width: 18.75rem;
            height: 12.5rem;

            padding: .75rem;
            border-radius: 10px;

            line-height: 1rem;
            

            background-color: rgb(209, 209, 209);
        }
        .flex{
            display: flex;
        }

        .space-between{
            justify-content: space-between;
        }

        .w-auto{
            width: 50%;
            margin: auto;
        }

        .bg-stone-900{
            background-color: oklch(14.7% 0.004 49.25);
        }
        .wrap{
            flex-wrap: wrap;
        }
        .gap-1{
            gap: 1rem;
        }
    </style>
</head>
<body class="bg-stone-900">
    <div class="flex space-between w-auto wrap gap-1">
            <div class="details">
                <div>
                    <h1><strong>Nome do filme</strong></h1>
                </div>
                <div>
                    <p>
                        <strong>Descrição do filme:</strong> <span></span>
                    </p>
                </div>
                <div>
                    <p>
                        <strong>Ano de lançamento:</strong> <span></span>
                    </p>
                </div>
            </div>
    </div>
    
</body>
</html>
```

Foi criado um arquivo database.php para criarmos as funções e as classes para conectar e extrair os dados do banco de dados.

```php
DATABASE.PHP

    // Classe para representar 1 registro no banco de dados
    class movie {
        public $id;
        public $nome;
        public $ano;
        public $descricao;
    }

    // Classe para conectarmos no banco de dados
    class DB {
        // Variável para conectarmos com o database.sqlite.
        $db = new PDO('sqlite:database.sqlite');
        $query = $db->query("select * from movies");
        $items = $query->fetchall();

        $retorno = [];

        foreach($items as $item){
            $movie = new movie();
            $movie->id = $item['id'];
            $movie->nome = $item['nome'];
            $movie->ano = $item['ano'];
            $movie->descricao = $item['descricao'];

            $retorno [] = $item;
        }
        return $retorno;
    }

```

***Explicação:***
- A função da **Classe Movie** é para extrairmos as colunas do banco de dados, então cada variável representa o nome que foi criado no banco de dados;
- **Classe DB**
    - **new PDO** - utilizado para conectarmos ao bando de dados SQLITE;
    - **$query = $db->query("select * from movies")** - criamos uma variável ***$query*** seguido da variável ***$db*** que foi utilizada para conectar com o banco de dados, para execurtarmos um comando sql ***query()*** no banco de dados;
    - **$items = $query->fetchall();** - utilizado para extrairmos todos os dados do banco de dados;
    - **$retorno = [];** - utilizado para inserir todos os dados dentro de um array que será extraido do **foreach**;
    - **$movie = new movie();** - criar um novo objeto a partir da **classe movie**;
    - **$movie->id = $item['Nome_Coluna_DB'];** - utilizada para conectar a coluna do banco de dados e inserir dentro do array;
    - **$retorno [] = $item;** - Inserir os novos elementos dentro do array;
    - **return $retorno;** - retornar as informações.

Após a criação das classes e funções que serão utilizadas, adicionaremos no index.php para inserir os dados do banco de dados no index.php

```php
INDEX.PHP

<?php 
    // Chamando o arquivo database.php
    require 'database.php';

    // Criando uma nova conexão a partir da classe DB.
    $db = new DB();

    // Seleciona os dados da classe movie.
    $movies = $db->movie();

?>
---
Informações acima da tag <!DOCTYPE html>

<?php foreach($movies as $movie); ?>
    <div class="flex space-between w-auto wrap gap-1">
        <div class="details">
            <div>
                <h1>
                    <strong><?= $movie->nome ?></strong>
                </h1>
            </div>
            <div>
                <p>
                    <strong>Descrição do filme:</strong>
                    <span><?= $movie->descricao ?></span>
                </p>
            </div>
            <div>
                <p>
                    <strong>Ano de lançamento:</strong> 
                    <span><?= $movie->ano ?></span>
                </p>
            </div>
        </div>
    </div>
<?php endforeach; ?>
```

#### Vide Pasta <a href="https://github.com/isacgouveia/Curso-PHP/tree/main/exercicios/exercicio_3">Exercicio_3</a>
