<a name="pages"></a>
# PHP Nível 1
###### Index
- [Variáveis](#page1)
    - [Boleanos e Condicionais](#page2)
- [Arrays & Foreach](#page3)
- [Funções](#page4)
- [Filtros](#page5)
- [Array Filter](#page6)
- [Exercícios](#page7)

---
##### por Isac Gouveia
---

<a id="page1"></a>
## Variáveis
As variáveis em PHP são usadas para armazenar dados que podem ser manipulados ao longo do código. Em PHP, uma variável é declarada começando com o simbolo $ seguido de um nome intuitivo sobre o que ela armazena, como $nome ou $idade. Ao declarar uma variável, você pode atribuir valores a ela, como números, strings ou até mesmo objetos e arrays.

Algumas regras para nomear variáveis:
- Use nomes significativos e intuitivos ao declarar uma variável;
- Evite nomear variáveis com palavras reservadas da linguagem;
- O PHP é case-sentive, ou seja, $variavel e $Variavel são variáveis diferentes;

***Exemplo de uma declaração de váriavel em PHP***
```php
<?php 
    
    $nome = "Isac"; // Armazena uma string
    $idade = 25;    // Armazena um número inteiro
    $ativo = true;  // Armazena um valor booleano

?>
```

---

<a id="page2"></a>
## booleanos e Condicionais
### Booleanos
Em PHP, um valor booleano é um tipo de dado básico que pode ter apenas dois valores: true (verdadeiro) ou false (falso). Os booleanos são usado para controlar a execução do código em condições e laços.

***Exemplo de uma declaração de valores booleanos em PHP***
```php
<?php 
    
    $ativo = true;  // Armazena um valor booleano
    $admin = 0;  // 1 (true) / 0 (false)
    $finalizado = true; // Armazena um valor booleano

?>
```

### Condicionais
Em PHP, uma condicional é uma estrutura de controle que permite executar diferentes blocos de código com base no resultado de uma condição, que pode ser verdadeira ou falsa.

***Exemplo de uma declaração condicional em PHP***
```php
<?php 
    
    $userHasPermissions = true;  // Armazena um valor booleano

    if ($userHasPermissions){
        echo "Acesso permitido. Você pode entrar no sistema!";
    }else{
        echo "Acesso negado. Você não tem permissão para entrar!";
    }
?>
```

***Podemos utilizar o operador de negação (!) para inverter uma condição***
```php
    $admin = true; // Armazena um valor booleano

    if(!$admin){
        echo "Acesso negado.";
    }else{
        echo "Acesso permitido.";
    }

```

***Podemos utilizar um bloco de código HTML junto com o condicional.***

**PHP**
```php
    Formato simplificado
    
    <?php if($finalizado): ?>
        ✔️ - Finalizado 
    <?php else: ?>
        ❌ - Não finalizado
    <?php endif; ?>
```

**HTML**
```html
    <div>
        Projeto: <?php if($finalizado): ?>
            <span style="color: green;">✔️ - Finalizado </span>
        <?php else: ?>
            <span style="color: red;">❌ - Não finalizado</span>
        <?php endif; ?>
    </div>
```

***Retorando os valores do PHP no HTML***
```php
    <div><?=$nome ?></div>
```

***Podemos utilizar expressões matemáticas no condocional***
```php
    $ano = 2025;

    if($ano > 2024){
        echo "É maior";
    }

    if($ano == 2025){ // Utilizamos duplo igual para verificarmos se A é IGUAL B
        echo "É igual";
    }

    if($ano < 2024){
        echo "É menor";
    }

```

---

<a id="page3"></a>
## Arrays & Foreach
### Arrays
Em PHP, um array é uma estrutura de dados fundamental que permite armazenar múltiplos valores de tipos diferentes (como números, strings, objeto ou outros arrays) sob um único nome de variável. É um "mapa ordenado".

Utilizamos o [] para indicar que a variável é do tipo array.
<br>

***Exemplo de um array***
```php
<?php
    $projetos = [
        "Meu portfolio",
        "Lista de tarefas",
        "Controle de Leitura de Livros",
    ];

    // Utilizamos a virgula (,) para separar cada elemento da lista.
?>
```

***Podemos criar uma lista dentro da lista, utilizado para compor mais de uma lista.***
```php
<?php
    $projetos = [
        [
            "Meu portfólio",
            false,
            "2025-08-30",
            "Meu primeiro portfolio",
        ],
        [
            "Lista de tarefas",
            true,
            "2025-08-30",
            "Lista de tarefas para você"
        ],

    ];

    /* 
        CHAMANDO A NOSSA LISTA ARRAY 
        Por padrão o índice sempre começa no 0, exemplo:
        Item Meu portfólio = 0;
        false = 1;
        2025-08-30 = 2;
        Meu primeiro portfolio = 3

    */

    foreach($projetos as $projeto){
        echo "<li>$projeto[0]</li>"; // Imprime a string: Meu portfólio
        echo "<li>$projeto[1]</li>"; // Imprime o booleano: FALSE
        echo "<li>$projeto[2]</li>"; // Imprime a String: 2025-08-30
        echo "<li>$projeto[3]</li>"; // Imprime a String: Meu primeiro portfolio
    }

?>
```

Podemos melhorar a compreensão dando títulos para cada item do nosso array.
<br>

***Exemplo:***
```php
<?php
    $projetos = [
        [
            "titulo" => "Meu portfólio",
            "finalizado" => false,
            "data" => "2025-08-30",
            "descricao" => "Meu primeiro portfolio",
        ],
        [
            "titulo" => "Lista de tarefas",
            "finalizado" => true,
            "data" => "2025-08-30",
            "descricao" => "Lista de tarefas para você"
        ],

    ];

    foreach($projetos as $projeto){
        echo "<li>$projeto['titulo']</li>"; // Imprime a string: Meu portfólio
        echo "<li>$projeto['finalizado']</li>"; // Imprime o booleano: FALSE
        echo "<li>$projeto['data']</li>"; // Imprime a String: 2025-08-30
        echo "<li>$projeto['descricao']</li>"; // Imprime a String: Meu primeiro portfolio
    }
?>
```
***Utilizamos => para indicar que dentro da chave TITULO há um conteúdo.***

## Foreach
Foreach é um laço de repetição que permite iterar sobre cada elemento de um array ou objeto.

***Exemplo de um foreach***
```php
<?php
    $projetos = [
        "Meu portfolio",
        "Lista de tarefas",
        "Controle de Leitura de Livros",
    ];

    foreach($projetos as $projeto){
        echo "<li>$projeto</li>"; // Imprime cada projeto da lista projetos em uma lista ordenada (modelo 1)
    }

        // Existem alguns métodos para podermos declarar a variável:
        echo "<li>$projeto</li>"; // modelo 1
        echo "<li>".$projeto."</li>"; // modelo 2 - utilizando ponto (.) para concatenar 
        echo "<li>{$projeto} ISSO</li>"; // modelo 3 - utilizamos chaves {} caso queira digitar alguma string após a variável

    /* Explicação:
        Para cada $PROJETO da lista $PROJETOS faça a seguinte operação

        DETALHE:
        utilizamos aspas (") para utilizarmos as variáveis, caso utilizarmos apóstrofo (') o PHP entenderam que se trata de uma string
    */
?>
```

---

<a id="page4"></a>
## Funções
Em PHP, Função é um bloco de código nomeado e reutilizável que executa uma tarefa específica, podendo receber dados (parâmetros) e devolver um resultado (retorno)

***Exemplo de uma função***
```php
<?php
    // Declaração da função
    function saudacao(){
        echo "Sejam bem vindos!";
    }

    // Chamada da função
    saudacao(); // Saída: Sejam bem vindos!
?>
```

o parâmetro dentro da função pode ser qualquer variável, pois quando chamarmos a função iremos declarar a variável que queremos.

***Exemplo prático***

```php
<?php
    $projetos = [
        [
            "titulo" => "Meu portfólio",
            "finalizado" => true,
            "data" => "2025-08-30",
            "descricao" => "Meu primeiro portfolio",
        ],
    ];

    function Status($p){
        if($p['finalizado'] == true){
            echo '<span style="green">✔️ - Finalizado</span>';
        }else{
            echo '<span style="red">❌ - Não finalizado</span>';
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Função</title>
</head>
<body>
    <?php foreach($projetos as $projeto):?>

        <div>Projeto: <?php Status($projeto) ?></div> // Saída: ✔️ - Finalizado

        <?php endforeach; ?>
</body>
</html>
```

Podemos melhorar mais o modo que declaramos a função.<br>
**Exemplo prático:**
```php
<?php
    $projetos = [
        [
            "titulo" => "Meu portfólio",
            "finalizado" => true,
            "data" => "2025-08-30",
            "descricao" => "Meu primeiro portfolio",
        ],
    ];

    function Status($p){
        if($p['finalizado'] == true){
            return '<span style="green">✔️ - Finalizado</span>'; // Alteração
        }
        return '<span style="red">❌ - Não finalizado</span>'; // Alteração
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Função</title>
</head>
<body>
    <?php foreach($projetos as $projeto):?>

        <div>Projeto: <?= Status($projeto) ?></div> // Alteração

        <?php endforeach; ?>
</body>
</html>
```

---

<a id="page5"></a>
## Filtros
Utilizado para filtrar dados de um array.

***Exemplo de um filtro com função***
```php
<?php
    $projetos = [
        [
            "titulo" => "Meu portfólio",
            "finalizado" => true,
            "data" => "2025-08-30",
            "descricao" => "Meu primeiro portfolio",
        ],
        [
            "titulo" => "Salada de frutas",
            "finalizado" => false,
            "data" => "2025-08-30",
            "descricao" => "Minha salada de frutas",
        ],
    ];

    function Status($p){
        if($p['finalizado'] == true){
            return '<span style="green">✔️ - Finalizado</span>';
        }
        return '<span style="red">❌ - Não finalizado</span>';
    }

    /*
     O nome do parâmetro da função não necessariamente precisa ser o nome da váriavel que está nossa lista de array (projetos)
     */

    function Filter($p, $finalizado = null){
        if(is_null($finalizado)){
            return $p;
        }

        $filtrados = [];

        // Utilizamos o loop para cada um dos projetos.
        foreach ($p as $projeto){
            if($projeto['finalizado'] === $finalizado){

                $filtrados [] = $projeto; 
            }
        }

        return $filtrados; // Retorna todos os elementos filtrados
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtros e Funções</title>
</head>
<body>
    <!-- 
        Precisamos indicar a função de filter dentro do nosso foreach,
        passando a nossa lista de projetos

        filter($projetos, false) - onde está false indica que o projeto não está finalizado, se caso for true indica que está finalizado.
    -->
    <?php foreach(filter($projetos, false) as $projeto):?>

        <div>Projeto: <?= Status($projeto) ?></div>

        <?php endforeach; ?>
</body>
</html>
```

Explicação:
- **$filtrados = []** - Criamos uma nova variável do tipo array para guardar os projetos.
- **$finalizado = null** - estamos indicando que a variável $filtrados será sem conteúdo no momento.
- **IS_NULL()** - indica se o valor é Nulo.
- **&& (and)** - Quando utilizar o and as condições (uma, duas ou mais) precisam ser todas verdadeiras.
- **===** - Indica que um valor/condição tem que ser EXATAMENTE o outro.
- **$filtrados [] = $projeto;** - Para Adicionarmos novos elementos dentro do array, utilizando o método $var [] = $var

---

<a id="page6"></a>

## Array Filter
Utilizado para identificar pontos para refatoração, separando regras de negócio e melhorando a legibilidade do código.

**Exemplo Prático - Função Filtrar**<br>
**DE:**
```php
<?php
    function filtrar($projetos, $funcao){
        $finalizados = [];

        foreach($projetos as $projeto){
            if($funcao($projeto)){
                $finalizados [] = $projeto;
            }
        }

        return $finalizados;
    }

    $Filtrados = filtrar($projetos, function($projeto){
        return $projeto['ano'] < 2024;
    });

?>
```

**PARA:**
```php
<?php

    $filtrados = array_filter($projetos, function($projeto){
        return $projeto['ano'] < 2023;
    });

?>
```
Observa-se que retiramos toda a função que estavamos utilizando para realizar o filtro, pois o array_filter já faz todo esse processo.

---

<a id="page7"></a>

## Exercícios
- **Exercício 1** - Criar uma função de filtro.
- **Exercício 2** - Refatorar a função de filtro.
