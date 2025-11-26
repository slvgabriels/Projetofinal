<?php
session_start();

if (isset($_GET['pg']) && $_GET['pg'] == 'logout') {
    session_destroy();
    header("Location: ../index.php");
    exit;
}

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    include "login.php";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-cyan: #00d4ff;
            --primary-blue: #0099ff;
            --primary-purple: #7c3aed;
            --primary-indigo: #6366f1;
            --cyan-gradient: linear-gradient(135deg, #00d4ff 0%, #0099ff 100%);
            --purple-gradient: linear-gradient(135deg, #7c3aed 0%, #6366f1 100%);
        }
        
        [data-theme="dark"] {
            --bg-primary: #0a0e27;
            --bg-surface: #151932;
            --bg-card: #1e2347;
            --bg-card-hover: rgba(30, 35, 71, 0.6);
            --text-primary: #ffffff;
            --text-secondary: #a0aec0;
            --border-color: rgba(99, 102, 241, 0.2);
            --border-hover: rgba(99, 102, 241, 0.4);
            --navbar-bg: rgba(21, 25, 50, 0.8);
            --shadow: rgba(0, 0, 0, 0.3);
            --shadow-hover: rgba(0, 0, 0, 0.5);
        }
        
        [data-theme="light"] {
            --bg-primary: #f8fafc;
            --bg-surface: #ffffff;
            --bg-card: #ffffff;
            --bg-card-hover: rgba(255, 255, 255, 0.9);
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border-color: rgba(99, 102, 241, 0.2);
            --border-hover: rgba(99, 102, 241, 0.4);
            --navbar-bg: rgba(255, 255, 255, 0.9);
            --shadow: rgba(0, 0, 0, 0.1);
            --shadow-hover: rgba(0, 0, 0, 0.15);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: var(--bg-primary);
            background-image: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.08) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(124, 58, 237, 0.08) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(0, 212, 255, 0.05) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(99, 102, 241, 0.05) 0px, transparent 50%);
            color: var(--text-primary);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            min-height: 100vh;
            line-height: 1.6;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        [data-theme="light"] body {
            background-image: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(124, 58, 237, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(0, 212, 255, 0.03) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(99, 102, 241, 0.03) 0px, transparent 50%);
        }
        
        .navbar-admin {
            background: var(--navbar-bg) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            box-shadow: 0 4px 30px var(--shadow);
            transition: all 0.3s ease;
        }
        
        .navbar-brand {
            font-weight: 700;
            background: var(--cyan-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .content-wrapper {
            background: var(--bg-card-hover);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 3rem;
            margin: 2rem 0;
            backdrop-filter: blur(20px);
            box-shadow: 
                0 8px 32px var(--shadow),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        [data-theme="light"] .content-wrapper {
            box-shadow: 
                0 8px 32px var(--shadow),
                inset 0 1px 0 rgba(0, 0, 0, 0.05);
        }
        
        .nav-link-admin {
            color: var(--text-secondary) !important;
            margin: 0 0.3rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 10px;
            padding: 0.6rem 1.2rem !important;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }
        
        .nav-link-admin::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--cyan-gradient);
            opacity: 0.1;
            transition: left 0.3s ease;
            z-index: -1;
        }
        
        .nav-link-admin:hover::before {
            left: 0;
        }
        
        .nav-link-admin:hover {
            color: var(--primary-cyan) !important;
            transform: translateY(-2px);
        }
        
        .theme-toggle {
            background: var(--cyan-gradient);
            border: none;
            border-radius: 12px;
            padding: 0.5rem 1rem;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 212, 255, 0.3);
            margin-left: 0.5rem;
        }
        
        .theme-toggle:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 212, 255, 0.4);
        }
        
        .glass-card {
            background: var(--bg-card-hover);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        [data-theme="light"] .glass-card {
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 20px var(--shadow);
        }
        
        .glass-card:hover {
            transform: translateY(-5px);
            border-color: var(--border-hover);
            box-shadow: 0 20px 40px var(--shadow-hover);
        }
        
        * {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        
        .stat-card,
        .btn-modern,
        .theme-toggle {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        [data-theme="light"] .text-secondary {
            color: var(--text-secondary) !important;
        }
        
        [data-theme="light"] input.form-control,
        [data-theme="light"] textarea.form-control,
        [data-theme="light"] select.form-select {
            background: rgba(248, 250, 252, 0.8) !important;
            border-color: rgba(99, 102, 241, 0.2) !important;
            color: var(--text-primary) !important;
        }
        
        [data-theme="light"] input.form-control:focus,
        [data-theme="light"] textarea.form-control:focus,
        [data-theme="light"] select.form-select:focus {
            background: rgba(255, 255, 255, 0.95) !important;
            border-color: var(--primary-cyan) !important;
        }
        
        .gradient-text {
            background: var(--cyan-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-modern {
            background: var(--cyan-gradient);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(0, 212, 255, 0.3);
        }
        
        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 212, 255, 0.4);
            color: white;
        }
    </style>
    <script>
        (function() {
            const theme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-admin">
    <div class="container">
        <a class="navbar-brand" href="admin.php">
            <i class="bi bi-shield-lock-fill"></i> Painel Admin
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-admin" href="?pg=jogador-admin">
                        <i class="bi bi-people"></i> Jogadores
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-admin" href="?pg=personagem-admin">
                        <i class="bi bi-person-badge"></i> Personagens
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-admin text-danger" href="?pg=logout">
                        <i class="bi bi-box-arrow-right"></i> Sair
                    </a>
                </li>
                <li class="nav-item">
                    <button class="theme-toggle" id="themeToggle" aria-label="Alternar tema">
                        <i class="bi bi-sun-fill" id="themeIcon"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="content-wrapper">
        <?php
        if(empty($_SERVER["QUERY_STRING"])){
            $var = "principal";
            include_once "$var.php";
        }else{
            $pg = $_GET['pg'];
            if(file_exists("$pg.php")){
                include_once "$pg.php";
            } else {
                echo "<div class='alert alert-danger'><h3><i class='bi bi-exclamation-triangle'></i> Página não encontrada!</h3></div>";
            }
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const html = document.documentElement;
    
    if (!themeToggle || !themeIcon) return;
    
    const savedTheme = localStorage.getItem('theme') || 'light';
    html.setAttribute('data-theme', savedTheme);
    updateIcon(savedTheme);
    
    function updateIcon(theme) {
        if (theme === 'light') {
            themeIcon.className = 'bi bi-sun-fill';
        } else {
            themeIcon.className = 'bi bi-moon-fill';
        }
    }
    
    themeToggle.addEventListener('click', () => {
        const currentTheme = html.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        html.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateIcon(newTheme);
    });
});
</script>
</body>
</html>
