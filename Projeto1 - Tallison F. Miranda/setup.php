<?php

echo "<h1>Setup do Banco de Dados</h1>";

$conexao = false;
try {
    $conexao = @mysqli_connect("127.0.0.1", "root", "", "", 3306);
} catch (Exception $e) {
    $conexao = false;
}

if (!$conexao || mysqli_connect_error()) {
    echo "<p style='color: red;'>Erro ao conectar ao MySQL. Verifique se o MySQL está instalado e rodando.</p>";
    echo "<p><strong>Para instalar MySQL no macOS:</strong></p>";
    echo "<pre>brew install mysql\nbrew services start mysql</pre>";
    echo "<p>Ou use: <code>mysql.server start</code></p>";
    exit;
}

echo "<p style='color: green;'>Conectado ao MySQL com sucesso!</p>";

$db_name = "projeto_1_tallison_f_miranda_";
$sql_create_db = "CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

if (mysqli_query($conexao, $sql_create_db)) {
    echo "<p style='color: green;'>Banco de dados '$db_name' criado ou já existe!</p>";
} else {
    echo "<p style='color: red;'>Erro ao criar banco: " . mysqli_error($conexao) . "</p>";
    exit;
}

mysqli_select_db($conexao, $db_name);

$sql_jogadores = "CREATE TABLE IF NOT EXISTS `jogadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jogador` varchar(100) NOT NULL,
  `personagem` varchar(100) NOT NULL,
  `numero` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

if (mysqli_query($conexao, $sql_jogadores)) {
    echo "<p style='color: green;'>Tabela 'jogadores' criada ou já existe!</p>";
} else {
    echo "<p style='color: red;'>Erro ao criar tabela jogadores: " . mysqli_error($conexao) . "</p>";
}

$sql_personagens = "CREATE TABLE IF NOT EXISTS `personagens` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `personagem` varchar(100) NOT NULL,
  `jogador` varchar(100) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `classe` varchar(50) NOT NULL,
  `subclasse` varchar(50) DEFAULT NULL,
  `forca` int(20) NOT NULL,
  `destreza` int(20) NOT NULL,
  `constituicao` int(20) NOT NULL,
  `inteligencia` int(20) NOT NULL,
  `sabedoria` int(20) NOT NULL,
  `carisma` int(20) NOT NULL,
  `multclasse` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

if (mysqli_query($conexao, $sql_personagens)) {
    echo "<p style='color: green;'>Tabela 'personagens' criada ou já existe!</p>";
} else {
    echo "<p style='color: red;'>Erro ao criar tabela personagens: " . mysqli_error($conexao) . "</p>";
}

$check_jogador = mysqli_query($conexao, "SELECT COUNT(*) as total FROM jogadores");
$row = mysqli_fetch_assoc($check_jogador);
if ($row['total'] == 0) {
    $sql_insert = "INSERT INTO `jogadores` (`jogador`, `personagem`, `numero`) VALUES ('Tallison', 'Apollo', '83988885555')";
    if (mysqli_query($conexao, $sql_insert)) {
        echo "<p style='color: green;'>Dados iniciais de jogadores inseridos!</p>";
    }
}

$check_personagem = mysqli_query($conexao, "SELECT COUNT(*) as total FROM personagens");
$row = mysqli_fetch_assoc($check_personagem);
if ($row['total'] == 0) {
    $sql_insert = "INSERT INTO `personagens` (`personagem`, `jogador`, `especie`, `classe`, `subclasse`, `forca`, `destreza`, `constituicao`, `inteligencia`, `sabedoria`, `carisma`, `multclasse`) VALUES ('Apollo', 'Tallison', 'Elfo', 'Druida', 'Círculo da Terra', 8, 13, 14, 10, 15, 12, '')";
    if (mysqli_query($conexao, $sql_insert)) {
        echo "<p style='color: green;'>Dados iniciais de personagens inseridos!</p>";
    }
}

mysqli_close($conexao);

echo "<hr>";
echo "<h2>Setup concluído com sucesso!</h2>";
echo "<p><a href='index.php'>Ir para o site</a> | <a href='admin/login.php'>Ir para o painel admin</a></p>";
?>

