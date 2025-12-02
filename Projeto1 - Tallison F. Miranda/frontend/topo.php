<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Campanha D&D - Organizador de Campanhas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
            font-weight: 400;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        [data-theme="light"] body {
            background-image: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(124, 58, 237, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(0, 212, 255, 0.03) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(99, 102, 241, 0.03) 0px, transparent 50%);
        }
        
        .navbar-custom {
            background: var(--navbar-bg) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            padding: 1.2rem 0;
            box-shadow: 0 4px 30px var(--shadow);
            transition: all 0.3s ease;
        }
        
        .navbar-brand-custom {
            font-size: 1.4rem;
            font-weight: 700;
            background: var(--cyan-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
            transition: all 0.3s ease;
        }
        
        .navbar-brand-custom:hover {
            transform: scale(1.05);
        }
        
        .nav-link-custom {
            color: var(--text-secondary) !important;
            margin: 0 0.3rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 10px;
            padding: 0.6rem 1.2rem !important;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }
        
        .nav-link-custom::before {
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
        
        .nav-link-custom:hover::before {
            left: 0;
        }
        
        .nav-link-custom:hover {
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
        
        .content-wrapper:hover {
            border-color: var(--border-hover);
            box-shadow: 
                0 12px 48px var(--shadow-hover),
                inset 0 1px 0 rgba(255, 255, 255, 0.15);
        }
        
        [data-theme="light"] .content-wrapper:hover {
            box-shadow: 
                0 12px 48px var(--shadow-hover),
                inset 0 1px 0 rgba(0, 0, 0, 0.05);
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
        
        .stat-card {
            background: var(--cyan-gradient);
            border-radius: 20px;
            padding: 2.5rem;
            color: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 3s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.6; }
        }
        
        .stat-card:hover {
            transform: scale(1.05) translateY(-5px);
            box-shadow: 0 20px 60px rgba(0, 212, 255, 0.4);
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        
        .lead {
            color: var(--text-secondary);
            font-weight: 400;
            font-size: 1.15rem;
        }
        
        [data-theme="light"] .stat-card {
            box-shadow: 0 8px 30px rgba(0, 212, 255, 0.2);
        }
        
        [data-theme="light"] .stat-card:hover {
            box-shadow: 0 20px 60px rgba(0, 212, 255, 0.3);
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
        
        [data-theme="light"] .text-secondary {
            color: var(--text-secondary) !important;
        }
        
        [data-theme="light"] footer {
            background: rgba(255, 255, 255, 0.9) !important;
        }
        
        [data-theme="light"] .glass-card p,
        [data-theme="light"] .glass-card span {
            color: var(--text-secondary);
        }
        
        [data-theme="light"] .glass-card h3,
        [data-theme="light"] .glass-card h4,
        [data-theme="light"] .glass-card h5 {
            color: var(--text-primary);
        }
        
        [data-theme="light"] table {
            background: var(--bg-surface) !important;
            color: var(--text-primary) !important;
        }
        
        [data-theme="light"] table td,
        [data-theme="light"] table th {
            color: var(--text-primary) !important;
        }
        
        [data-theme="light"] .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: rgba(99, 102, 241, 0.05) !important;
        }
        
        [data-theme="light"] [style*="background: rgba(99, 102, 241, 0.1)"] {
            background: rgba(99, 102, 241, 0.08) !important;
        }
        
        [data-theme="light"] [style*="background: rgba(0, 212, 255, 0.1)"] {
            background: rgba(0, 212, 255, 0.08) !important;
        }
        
        [data-theme="light"] [style*="background: rgba(124, 58, 237, 0.1)"] {
            background: rgba(124, 58, 237, 0.08) !important;
        }
        
        [data-theme="light"] .stat-card {
            box-shadow: 0 8px 30px rgba(0, 212, 255, 0.2);
        }
        
        [data-theme="light"] .stat-card:hover {
            box-shadow: 0 20px 60px rgba(0, 212, 255, 0.3);
        }
        
        [data-theme="light"] .alert {
            background: var(--bg-surface) !important;
            border-color: var(--border-color) !important;
            color: var(--text-primary) !important;
        }
        
        [data-theme="light"] a.text-secondary:hover {
            color: var(--primary-cyan) !important;
        }
        
        * {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        
        .stat-card,
        .btn-modern,
        .theme-toggle {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand navbar-brand-custom" href="?pg=conteudo">
            <i class="bi bi-dice-6-fill"></i> Campanha D&D
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php include "menu.php"; ?>
        </div>
    </div>
</nav>
<div style="padding-top: 100px;">