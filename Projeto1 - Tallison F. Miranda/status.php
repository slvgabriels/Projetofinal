<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status do Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .status-box {
            padding: 20px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .success { background-color: #d4edda; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; border: 1px solid #f5c6cb; }
        .warning { background-color: #fff3cd; border: 1px solid #ffeaa7; }
        code { background-color: #f4f4f4; padding: 2px 6px; border-radius: 3px; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Status do Sistema</h1>
        
        <?php
        echo "<div class='status-box success'>";
        echo "<h3>✅ PHP</h3>";
        echo "<p>Versão: " . phpversion() . "</p>";
        echo "</div>";
        
        if (extension_loaded('mysqli')) {
            echo "<div class='status-box success'>";
            echo "<h3>✅ Extensão MySQLi</h3>";
            echo "<p>A extensão MySQLi está carregada.</p>";
            echo "</div>";
        } else {
            echo "<div class='status-box error'>";
            echo "<h3>❌ Extensão MySQLi</h3>";
            echo "<p>A extensão MySQLi não está carregada. Instale o pacote php-mysqli.</p>";
            echo "</div>";
        }
        
        $conexao = false;
        try {
            $conexao = @mysqli_connect("127.0.0.1", "root", "", "", 3306);
        } catch (Exception $e) {
            $conexao = false;
        }
        
        if ($conexao && !mysqli_connect_error()) {
            echo "<div class='status-box success'>";
            echo "<h3>✅ MySQL</h3>";
            echo "<p>Conectado ao MySQL com sucesso!</p>";
            echo "<p>Versão: " . mysqli_get_server_info($conexao) . "</p>";
            mysqli_close($conexao);
            echo "<p><a href='setup.php' class='btn btn-primary'>Executar Setup do Banco</a></p>";
            echo "</div>";
        } else {
            echo "<div class='status-box error'>";
            echo "<h3>❌ MySQL</h3>";
            echo "<p><strong>MySQL não está rodando ou não está instalado.</strong></p>";
            echo "<h4>Como instalar MySQL no macOS:</h4>";
            echo "<ol>";
            echo "<li><strong>Via Homebrew (recomendado):</strong><br>";
            echo "<code>brew install mysql</code><br>";
            echo "<code>brew services start mysql</code></li>";
            echo "<li><strong>Ou baixe o instalador:</strong><br>";
            echo "Acesse: <a href='https://dev.mysql.com/downloads/mysql/' target='_blank'>https://dev.mysql.com/downloads/mysql/</a></li>";
            echo "</ol>";
            echo "<h4>Após instalar:</h4>";
            echo "<ol>";
            echo "<li>Inicie o MySQL: <code>brew services start mysql</code></li>";
            echo "<li>Configure a senha (se necessário): <code>mysql_secure_installation</code></li>";
            echo "<li>Se configurar senha, edite <code>admin/config.inc.php</code> e <code>setup.php</code></li>";
            echo "<li>Recarregue esta página</li>";
            echo "</ol>";
            echo "</div>";
        }
        
        if ($conexao) {
            $db_name = "projeto_1_tallison_f_miranda_";
            $db_selected = @mysqli_select_db($conexao, $db_name);
            
            if ($db_selected) {
                echo "<div class='status-box success'>";
                echo "<h3>✅ Banco de Dados</h3>";
                echo "<p>O banco '$db_name' existe!</p>";
                
                $tables = mysqli_query($conexao, "SHOW TABLES");
                $table_count = mysqli_num_rows($tables);
                echo "<p>Tabelas encontradas: $table_count</p>";
                
                if ($table_count > 0) {
                    echo "<ul>";
                    while ($row = mysqli_fetch_array($tables)) {
                        echo "<li>" . $row[0] . "</li>";
                    }
                    echo "</ul>";
                }
                
                echo "</div>";
            } else {
                echo "<div class='status-box warning'>";
                echo "<h3>⚠️ Banco de Dados</h3>";
                echo "<p>O banco '$db_name' não existe ainda.</p>";
                echo "<p><a href='setup.php' class='btn btn-primary'>Criar Banco de Dados</a></p>";
                echo "</div>";
            }
            mysqli_close($conexao);
        }
        ?>
        
        <hr>
        <h3>Links Úteis</h3>
        <ul>
            <li><a href="index.php">Página Principal</a></li>
            <li><a href="admin/login.php">Painel Administrativo</a></li>
            <li><a href="setup.php">Setup do Banco</a></li>
        </ul>
    </div>
</body>
</html>

