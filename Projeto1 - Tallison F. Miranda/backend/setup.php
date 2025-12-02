<?php
// Este arquivo é responsável por criar e configurar o banco de dados do sistema
// Ele deve ser executado APENAS UMA VEZ quando você instala o sistema pela primeira vez
// Funciona como um "instalador" que prepara tudo para o sistema funcionar

// Exibe o título da página de setup
echo "<h1>Setup do Banco de Dados</h1>";

// Inicializa a variável de conexão como false (falso)
// Isso garante que temos um valor inicial conhecido
$conexao = false;

// Tenta conectar ao servidor MySQL sem especificar um banco de dados
// O @ antes de mysqli_connect suprime avisos de erro (usado para tratamento manual)
// Parâmetros: servidor, usuário, senha, banco (vazio aqui), porta
try {
    // Tenta estabelecer conexão com o MySQL
    // O banco está vazio porque ainda não existe - vamos criá-lo depois
    $conexao = @mysqli_connect("127.0.0.1", "root", "", "", 3306);
} catch (Exception $e) {
    // Se der algum erro na conexão, mantém $conexao como false
    $conexao = false;
}

// Verifica se a conexão foi bem-sucedida
// Se não conseguiu conectar OU se há algum erro na conexão
if (!$conexao || mysqli_connect_error()) {
    // Exibe mensagem de erro e instruções para o usuário
    echo "<p style='color: red;'>Erro ao conectar ao MySQL. Verifique se o MySQL está instalado e rodando.</p>";
    echo "<p><strong>Para instalar MySQL no macOS:</strong></p>";
    // Mostra comandos para instalar MySQL via Homebrew
    echo "<pre>brew install mysql\nbrew services start mysql</pre>";
    echo "<p>Ou use: <code>mysql.server start</code></p>";
    // Para a execução do script - não continua se não conseguir conectar
    exit;
}

// Se chegou aqui, a conexão foi bem-sucedida
echo "<p style='color: green;'>Conectado ao MySQL com sucesso!</p>";

// Define o nome do banco de dados que será criado
$db_name = "projeto_1_tallison_f_miranda_";

// Cria o comando SQL para criar o banco de dados
// IF NOT EXISTS = só cria se não existir (evita erro se já existir)
// CHARACTER SET utf8mb4 = permite usar caracteres especiais (acentos, emojis, etc)
// COLLATE utf8mb4_general_ci = define como os textos serão comparados e ordenados
$sql_create_db = "CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

// Executa o comando SQL para criar o banco de dados
if (mysqli_query($conexao, $sql_create_db)) {
    // Se a criação foi bem-sucedida, exibe mensagem de sucesso
    echo "<p style='color: green;'>Banco de dados '$db_name' criado ou já existe!</p>";
} else {
    // Se deu erro, exibe a mensagem de erro e para a execução
    echo "<p style='color: red;'>Erro ao criar banco: " . mysqli_error($conexao) . "</p>";
    exit;
}

// Seleciona o banco de dados criado para usar nas próximas operações
// É como "entrar" no banco de dados para trabalhar com ele
mysqli_select_db($conexao, $db_name);

// Cria a tabela "jogadores" que armazena informações dos jogadores
// CREATE TABLE IF NOT EXISTS = cria a tabela apenas se ela não existir
$sql_jogadores = "CREATE TABLE IF NOT EXISTS `jogadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,  -- ID único que aumenta automaticamente (1, 2, 3...)
  `jogador` varchar(100) NOT NULL,        -- Nome do jogador (máximo 100 caracteres, obrigatório)
  `personagem` varchar(100) NOT NULL,     -- Nome do personagem do jogador (máximo 100 caracteres, obrigatório)
  `numero` varchar(50) NOT NULL,         -- Número de contato do jogador (máximo 50 caracteres, obrigatório)
  PRIMARY KEY (`id`)                      -- Define o campo 'id' como chave primária (identificador único)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

// Executa o comando para criar a tabela jogadores
if (mysqli_query($conexao, $sql_jogadores)) {
    echo "<p style='color: green;'>Tabela 'jogadores' criada ou já existe!</p>";
} else {
    // Se deu erro, exibe a mensagem de erro
    echo "<p style='color: red;'>Erro ao criar tabela jogadores: " . mysqli_error($conexao) . "</p>";
}

// Cria a tabela "personagens" que armazena informações detalhadas dos personagens
$sql_personagens = "CREATE TABLE IF NOT EXISTS `personagens` (
  `id` int(50) NOT NULL AUTO_INCREMENT,      -- ID único que aumenta automaticamente
  `personagem` varchar(100) NOT NULL,         -- Nome do personagem
  `jogador` varchar(100) NOT NULL,             -- Nome do jogador que controla este personagem
  `especie` varchar(50) NOT NULL,              -- Espécie do personagem (Humano, Elfo, Anão, etc)
  `classe` varchar(50) NOT NULL,              -- Classe do personagem (Guerreiro, Mago, Clérigo, etc)
  `subclasse` varchar(50) DEFAULT NULL,       -- Subclasse (opcional, pode ser vazio)
  `forca` int(20) NOT NULL,                   -- Atributo de Força (número inteiro)
  `destreza` int(20) NOT NULL,                 -- Atributo de Destreza
  `constituicao` int(20) NOT NULL,            -- Atributo de Constituição
  `inteligencia` int(20) NOT NULL,           -- Atributo de Inteligência
  `sabedoria` int(20) NOT NULL,               -- Atributo de Sabedoria
  `carisma` int(20) NOT NULL,                 -- Atributo de Carisma
  `multclasse` varchar(50) DEFAULT NULL,      -- Informação sobre multiclasse (opcional)
  PRIMARY KEY (`id`)                          -- Define o campo 'id' como chave primária
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

// Executa o comando para criar a tabela personagens
if (mysqli_query($conexao, $sql_personagens)) {
    echo "<p style='color: green;'>Tabela 'personagens' criada ou já existe!</p>";
} else {
    echo "<p style='color: red;'>Erro ao criar tabela personagens: " . mysqli_error($conexao) . "</p>";
}

// Verifica se já existem jogadores cadastrados na tabela
// COUNT(*) conta quantos registros existem na tabela
$check_jogador = mysqli_query($conexao, "SELECT COUNT(*) as total FROM jogadores");
// mysqli_fetch_assoc() pega o resultado da consulta e transforma em um array associativo
$row = mysqli_fetch_assoc($check_jogador);

// Se não existir nenhum jogador (total == 0), insere dados iniciais de exemplo
if ($row['total'] == 0) {
    // INSERT INTO adiciona um novo registro na tabela
    // VALUES define os valores que serão inseridos em cada coluna
    $sql_insert = "INSERT INTO `jogadores` (`jogador`, `personagem`, `numero`) VALUES ('Tallison', 'Apollo', '83988885555')";
    // Executa o comando de inserção
    if (mysqli_query($conexao, $sql_insert)) {
        echo "<p style='color: green;'>Dados iniciais de jogadores inseridos!</p>";
    }
}

// Verifica se já existem personagens cadastrados na tabela
$check_personagem = mysqli_query($conexao, "SELECT COUNT(*) as total FROM personagens");
$row = mysqli_fetch_assoc($check_personagem);

// Se não existir nenhum personagem, insere dados iniciais de exemplo
if ($row['total'] == 0) {
    // Insere um personagem completo com todos os atributos
    // Os valores numéricos são os atributos do personagem (força, destreza, etc)
    $sql_insert = "INSERT INTO `personagens` (`personagem`, `jogador`, `especie`, `classe`, `subclasse`, `forca`, `destreza`, `constituicao`, `inteligencia`, `sabedoria`, `carisma`, `multclasse`) VALUES ('Apollo', 'Tallison', 'Elfo', 'Druida', 'Círculo da Terra', 8, 13, 14, 10, 15, 12, '')";
    if (mysqli_query($conexao, $sql_insert)) {
        echo "<p style='color: green;'>Dados iniciais de personagens inseridos!</p>";
    }
}

// Fecha a conexão com o banco de dados
// É uma boa prática fechar conexões quando não precisar mais delas
mysqli_close($conexao);

// Exibe mensagem final de conclusão
echo "<hr>";
echo "<h2>Setup concluído com sucesso!</h2>";
// Cria links para navegar para o site principal ou para o painel administrativo
echo "<p><a href='/frontend/index.php'>Ir para o site</a> | <a href='/frontend/admin/login.php'>Ir para o painel admin</a></p>";
?>
