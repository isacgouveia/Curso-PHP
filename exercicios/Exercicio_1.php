<?php
    $projetos = [
        [
            "titulo" => "Meu portfólio",
            "finalizado" => true,
            "data" => 2024,
            "descricao" => "Meu primeiro portfolio",
        ],
        [
            "titulo" => "Salada de frutas",
            "finalizado" => false,
            "data" => 2023,
            "descricao" => "Minha salada de frutas",
        ],
    ];

    function Status($p){
        if($p['finalizado'] == true){
            return '<span style="green">✔️ - Finalizado</span>';
        }
        return '<span style="red">❌ - Não finalizado</span>';
    }

    function Filter($p, $funcao){

        $filtrados = []; // Criamos uma nova variável do tipo array para guardar os projetos.

        // Utilizamos o loop para cada um dos projetos.
        foreach ($p as $projeto){
            if($funcao($projeto)){
                // Adicionaremos novos elementos dentro do array o método $var [] = $var
                $filtrados [] = $projeto; 
            }
        }

        return $filtrados; // Retorna todos os elementos filtrados
    }

    $filtros = filter($projetos, function($projeto){
        return $projeto['data'] < 2024;
    });
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtros e Funções</title>
</head>
<body>

    <?php foreach($filtros as $projeto):?>

        <div>Titulo: <?= $projeto['titulo'] ?></div>
        <div>Data: <?= $projeto['data'] ?></div>
        <div>Projeto: <?= Status($projeto) ?></div>

        <?php endforeach; ?>
</body>
</html>
