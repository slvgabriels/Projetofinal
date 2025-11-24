<?php

    require_once "config.inc.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $jogador = $_POST["jogador"];
        $personagem = $_POST["personagem"];
        $numero = $_POST["numero"];

        $sql = "INSERT INTO jogadores (jogador, personagem, numero) 
            VALUES ('$jogador', '$personagem', '$numero')";

        $executa = mysqli_query($conexao, $sql);
        if($executa) {
            echo "<h2>Cadastro realizado com sucesso.</h2>";
            echo "<a href='?pg=jogador-admin'>Voltar</a>";
        }else{
            echo "<h2>Erro ao cadastrar.</h2>";
            echo "<a href='?pg=jogador-admin'>Voltar</a>";
        }
    }else{
        echo "<h2>Acesso negado.</h2>";
        echo "<a href='?pg=jogador-admin'>Voltar</a>";
    }