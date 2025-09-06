```php
<?php
    require 'database.php';

    $db = new DB();
    $movies = $db->movies();

?>

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
        <?php foreach($movies as $movie): ?>
            <div class="details">
                <div>
                    <h1><strong><?= $movie->nome ?></strong></h1>
                </div>
                <div>
                    <p>
                        <strong>Descrição do filme:</strong> <?= $movie->descricao ?><span></span>
                    </p>
                </div>
                <div>
                    <p>
                        <strong>Ano de lançamento:</strong> <span><?= $movie->ano ?></span>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
</body>
</html>
```
