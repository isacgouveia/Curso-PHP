<?php
    $produtos = [
        [
            "titulo" => "Livro 1",
            "ano" => 2023,
            "Descricao" => "lorem lpsum"
        ],
        [
            "titulo" => "Livro 2",
            "ano" => 2023,
            "Descricao" => "lorem lpsum"
        ],
        [
            "titulo" => "Livro 2",
            "ano" => 2024,
            "Descricao" => "lorem lpsum"
        ],
    ];

    // function filtro($items, $funcao){
    //     // Cria uma lista de array vázia
    //     $filtrados = [];

    //     foreach($items as $item){
    //         if($funcao($item)){

    //            // Adicionaremos novos elementos dentro do array o método $var [] = $var
    //             $filtrados [] = $item;
    //         }
    //     }
    //     // Retorne a lista completa
    //     return $filtrados;
    // }

    $itemsFiltrados =  array_filter($produtos, function($p){
        return $p['ano'] < 2024;
    });


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
</head>
<body>
    <?php foreach($itemsFiltrados as $produto): ?>
        <div>
            <p>Titulo: <?=$produto['titulo']?></p>
            <p>Ano: <?=$produto['ano']?></p>
            <p>Descrição: <?=$produto['Descricao']?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>