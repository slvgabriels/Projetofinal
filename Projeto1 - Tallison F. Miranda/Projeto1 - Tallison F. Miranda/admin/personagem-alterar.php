<?php

require_once "config.inc.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $personagem = $_POST["personagem"];
    $jogador = $_POST["jogador"];
    $especie = $_POST["especie"];
    $classe = $_POST["classe"];
    $subclasse = $_POST["subclasse"];
    $forca = $_POST["forca"];
    $destreza = $_POST["destreza"];
    $constituicao = $_POST["constituicao"];
    $inteligencia = $_POST["inteligencia"];
    $sabedoria = $_POST["sabedoria"];
    $carisma = $_POST["carisma"];
    $id = $_POST["id"];

    $sql = "UPDATE personagens SET 
            personagem = '$personagem',
            jogador = '$jogador',
            especie = '$especie',
            classe = '$classe',
            subclasse = '$subclasse',
            forca = '$forca',
            destreza = '$destreza',
            constituicao = '$constituicao',
            inteligencia = '$inteligencia',
            sabedoria = '$sabedoria',
            carisma = '$carisma'
            WHERE id = '$id'";

    $executa = mysqli_query($conexao, $sql);
    if($executa) {
        echo "<h2>Alteração realizada com sucesso.</h2>";
        echo "<a href='?pg=personagem-admin'>Voltar</a>";
    }else{
        echo "<h2>Erro ao alterar cadastro.</h2>";
        echo "<a href='?pg=personagem-admin'>Voltar</a>";
    }
}else{
    echo "<h2>Acesso negado.</h2>";
    echo "<a href='?pg=personagem-admin'>Voltar</a>";
}