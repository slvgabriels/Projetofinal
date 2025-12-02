<?php
    // Este arquivo é responsável por estabelecer a conexão com o banco de dados MySQL
    // Ele é incluído em todos os arquivos que precisam acessar o banco de dados
    // É como uma "ponte" que conecta o sistema ao banco de dados
    
    // mysqli_connect() é a função que cria a conexão com o banco de dados
    // Parâmetros: servidor, usuário, senha, nome do banco, porta
    // "127.0.0.1" = localhost (servidor local na sua máquina)
    // "root" = usuário padrão do MySQL (pode ser alterado)
    // "" = senha vazia (se você configurou senha, coloque aqui)
    // "projeto_1_tallison_f_miranda_" = nome do banco de dados criado pelo setup.php
    // 3306 = porta padrão do MySQL
    $conexao = mysqli_connect("127.0.0.1","root","","projeto_1_tallison_f_miranda_",3306);

    // Verifica se a conexão foi estabelecida com sucesso
    // Se $conexao for false, significa que houve um erro na conexão
    if(!$conexao){
        // Exibe uma mensagem de erro caso não consiga conectar
        // mysqli_connect_error() retorna a descrição do erro que ocorreu
        echo "<h2>Erro ao conectar o banco de dados: " . mysqli_connect_error() . "</h2>";
    }
    // Se a conexão for bem-sucedida, a variável $conexao pode ser usada em outros arquivos
    // para executar consultas SQL (SELECT, INSERT, UPDATE, DELETE)