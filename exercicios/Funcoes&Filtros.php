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

     $finalizado = null - estamos indicando que a variável $filtrados será sem conteúdo no momento.
     
     IS_NULL = indica se o valor é Nulo.

     && (and) - Quando utilizar o and as condições (uma, duas ou mais) precisam ser todas verdadeiras.

     === - Indica que um valor/condição tem que ser EXATAMENTE o outro.
     */
    function Filter($p, $finalizado = null){
        if(is_null($finalizado)){
            return $p;
        }

        $filtrados = []; // Criamos uma nova variável do tipo array para guardar os projetos.

        // Utilizamos o loop para cada um dos projetos.
        foreach ($p as $projeto){
            if($projeto['finalizado'] === $finalizado){
                // Adicionaremos novos elementos dentro do array o método $var [] = $var
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