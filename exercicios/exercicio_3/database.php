<?php
    class movie {
        public $id;
        public $nome;
        public $ano;
        public $descricao;
    }

    // Criando classe DB
    class DB{

        // Criando função para conectar com o banco de dados
        public function movies(){
            // Conexão com o banco de dados
            $db = new PDO('sqlite:database.sqlite');
            
            // Selecionar a tabela
            $query = $db->query("select * from movies");

            // Extrair os dados da tabela
            $items = $query->fetchall();

            $retorno = [];

            foreach($items as $item){
                $movie = new movie;
                $movie->id = $item['id'];
                $movie->nome = $item['nome'];
                $movie->ano = $item['ano'];
                $movie->descricao = $item['descricao'];

                // Adicionar o novo filme dentro do retorno
                $retorno [] = $movie;
            }

            return $retorno;
        }
    }

?>