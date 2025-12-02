<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Define a codificação de caracteres como UTF-8 (suporta acentos e caracteres especiais) -->
    <meta charset="UTF-8">
    <!-- Configura a página para ser responsiva (adaptar-se a diferentes tamanhos de tela) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título que aparece na aba do navegador -->
    <title>Status do Sistema</title>
    <!-- Carrega o framework Bootstrap 5.3.3 do CDN (servidor externo) -->
    <!-- Bootstrap fornece estilos CSS prontos para criar páginas bonitas rapidamente -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos CSS personalizados para as caixas de status */
        .status-box {
            padding: 20px;        /* Espaçamento interno de 20 pixels */
            margin: 10px 0;       /* Espaçamento externo de 10 pixels acima e abaixo */
            border-radius: 5px;   /* Bordas arredondadas de 5 pixels */
        }
        /* Classe para caixas de sucesso (verde) */
        .success { 
            background-color: #d4edda;  /* Cor de fundo verde claro */
            border: 1px solid #c3e6cb; /* Borda verde */
        }
        /* Classe para caixas de erro (vermelho) */
        .error { 
            background-color: #f8d7da;  /* Cor de fundo vermelho claro */
            border: 1px solid #f5c6cb;  /* Borda vermelha */
        }
        /* Classe para caixas de aviso (amarelo) */
        .warning { 
            background-color: #fff3cd;   /* Cor de fundo amarelo claro */
            border: 1px solid #ffeaa7;  /* Borda amarela */
        }
        /* Estilo para código (texto monoespaçado) */
        code { 
            background-color: #f4f4f4;  /* Fundo cinza claro */
            padding: 2px 6px;           /* Espaçamento interno */
            border-radius: 3px;          /* Bordas levemente arredondadas */
        }
    </style>
</head>
<body>
    <!-- Container do Bootstrap que centraliza o conteúdo e limita a largura -->
    <div class="container mt-5">
        <h1>Status do Sistema</h1>
        
        <?php
        // Este arquivo verifica o status de todos os componentes necessários para o sistema funcionar
        // É útil para diagnosticar problemas de instalação ou configuração
        
        // Verifica a versão do PHP instalada
        // phpversion() retorna a versão do PHP que está rodando no servidor
        echo "<div class='status-box success'>";
        echo "<h3>✅ PHP</h3>";
        echo "<p>Versão: " . phpversion() . "</p>";
        echo "</div>";
        
        // Verifica se a extensão MySQLi está instalada e habilitada
        // MySQLi é necessária para conectar ao banco de dados MySQL
        // extension_loaded() verifica se uma extensão específica está carregada
        if (extension_loaded('mysqli')) {
            // Se a extensão estiver carregada, exibe mensagem de sucesso
            echo "<div class='status-box success'>";
            echo "<h3>✅ Extensão MySQLi</h3>";
            echo "<p>A extensão MySQLi está carregada.</p>";
            echo "</div>";
        } else {
            // Se a extensão não estiver carregada, exibe mensagem de erro
            echo "<div class='status-box error'>";
            echo "<h3>❌ Extensão MySQLi</h3>";
            echo "<p>A extensão MySQLi não está carregada. Instale o pacote php-mysqli.</p>";
            echo "</div>";
        }
        
        // Tenta conectar ao servidor MySQL para verificar se está rodando
        $conexao = false;
        try {
            // Tenta estabelecer conexão com o MySQL
            // O @ suprime avisos de erro para tratamento manual
            $conexao = @mysqli_connect("127.0.0.1", "root", "", "", 3306);
        } catch (Exception $e) {
            // Se der erro, mantém $conexao como false
            $conexao = false;
        }
        
        // Verifica se a conexão foi bem-sucedida e se não há erros
        if ($conexao && !mysqli_connect_error()) {
            // Se conectou com sucesso, exibe informações do MySQL
            echo "<div class='status-box success'>";
            echo "<h3>✅ MySQL</h3>";
            echo "<p>Conectado ao MySQL com sucesso!</p>";
            // mysqli_get_server_info() retorna a versão do servidor MySQL
            echo "<p>Versão: " . mysqli_get_server_info($conexao) . "</p>";
            // Fecha a conexão
            mysqli_close($conexao);
            // Cria um link para executar o setup do banco de dados
            echo "<p><a href='/backend/setup.php' class='btn btn-primary'>Executar Setup do Banco</a></p>";
            echo "</div>";
        } else {
            // Se não conseguiu conectar, exibe instruções de instalação
            echo "<div class='status-box error'>";
            echo "<h3>❌ MySQL</h3>";
            echo "<p><strong>MySQL não está rodando ou não está instalado.</strong></p>";
            echo "<h4>Como instalar MySQL no macOS:</h4>";
            echo "<ol>";
            // Instruções para instalar via Homebrew (gerenciador de pacotes do macOS)
            echo "<li><strong>Via Homebrew (recomendado):</strong><br>";
            echo "<code>brew install mysql</code><br>";
            echo "<code>brew services start mysql</code></li>";
            // Alternativa: baixar instalador oficial
            echo "<li><strong>Ou baixe o instalador:</strong><br>";
            echo "Acesse: <a href='https://dev.mysql.com/downloads/mysql/' target='_blank'>https://dev.mysql.com/downloads/mysql/</a></li>";
            echo "</ol>";
            echo "<h4>Após instalar:</h4>";
            echo "<ol>";
            // Passos pós-instalação
            echo "<li>Inicie o MySQL: <code>brew services start mysql</code></li>";
            echo "<li>Configure a senha (se necessário): <code>mysql_secure_installation</code></li>";
            echo "<li>Se configurar senha, edite <code>admin/config.inc.php</code> e <code>setup.php</code></li>";
            echo "<li>Recarregue esta página</li>";
            echo "</ol>";
            echo "</div>";
        }
        
        // Se conseguiu conectar ao MySQL, verifica se o banco de dados existe
        if ($conexao) {
            // Define o nome do banco de dados que deveria existir
            $db_name = "projeto_1_tallison_f_miranda_";
            // Tenta selecionar (usar) o banco de dados
            // mysqli_select_db() retorna true se o banco existe, false se não existe
            $db_selected = @mysqli_select_db($conexao, $db_name);
            
            if ($db_selected) {
                // Se o banco existe, exibe informações sobre ele
                echo "<div class='status-box success'>";
                echo "<h3>✅ Banco de Dados</h3>";
                echo "<p>O banco '$db_name' existe!</p>";
                
                // Lista todas as tabelas que existem no banco de dados
                // SHOW TABLES é um comando SQL que retorna todas as tabelas
                $tables = mysqli_query($conexao, "SHOW TABLES");
                // mysqli_num_rows() conta quantas tabelas foram encontradas
                $table_count = mysqli_num_rows($tables);
                echo "<p>Tabelas encontradas: $table_count</p>";
                
                // Se existirem tabelas, lista o nome de cada uma
                if ($table_count > 0) {
                    echo "<ul>";
                    // Loop que percorre cada tabela encontrada
                    // mysqli_fetch_array() pega uma linha do resultado por vez
                    while ($row = mysqli_fetch_array($tables)) {
                        // $row[0] contém o nome da primeira coluna (nome da tabela)
                        echo "<li>" . $row[0] . "</li>";
                    }
                    echo "</ul>";
                }
                
                echo "</div>";
            } else {
                // Se o banco não existe, exibe aviso e link para criá-lo
                echo "<div class='status-box warning'>";
                echo "<h3>⚠️ Banco de Dados</h3>";
                echo "<p>O banco '$db_name' não existe ainda.</p>";
                // Link para executar o setup que criará o banco
                echo "<p><a href='/backend/setup.php' class='btn btn-primary'>Criar Banco de Dados</a></p>";
                echo "</div>";
            }
            // Fecha a conexão com o MySQL
            mysqli_close($conexao);
        }
        ?>
        
        <!-- Linha horizontal para separar seções -->
        <hr>
        <h3>Links Úteis</h3>
        <!-- Lista de links para navegação rápida -->
        <ul>
            <li><a href="/frontend/index.php">Página Principal</a></li>
            <li><a href="/frontend/admin/login.php">Painel Administrativo</a></li>
            <li><a href="/backend/setup.php">Setup do Banco</a></li>
        </ul>
    </div>
</body>
</html>
