<a name="pages"></a>
# PHP Nível 1
###### Index
- [Variáveis](#page1)
- [Boleanos e Condicionais](#page2)
- [Arrays & Foreach](#page3)

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
