<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Painel Administrativo</title>
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
            --shadow: rgba(0, 0, 0, 0.1);
            --shadow-hover: rgba(0, 0, 0, 0.15);
        }
        
        body {
            background: var(--bg-primary);
            background-image: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.08) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(124, 58, 237, 0.08) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(0, 212, 255, 0.05) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(99, 102, 241, 0.05) 0px, transparent 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        [data-theme="light"] body {
            background-image: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(124, 58, 237, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(0, 212, 255, 0.03) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(99, 102, 241, 0.03) 0px, transparent 50%);
        }
        
        .login-card {
            background: var(--bg-card-hover);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            box-shadow: 
                0 8px 32px var(--shadow),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        [data-theme="light"] .login-card {
            box-shadow: 
                0 8px 32px var(--shadow),
                inset 0 1px 0 rgba(0, 0, 0, 0.05);
        }
        
        .login-card:hover {
            border-color: var(--border-hover);
            box-shadow: 
                0 12px 48px var(--shadow-hover),
                inset 0 1px 0 rgba(255, 255, 255, 0.15);
        }
        
        [data-theme="light"] .login-card:hover {
            box-shadow: 
                0 12px 48px var(--shadow-hover),
                inset 0 1px 0 rgba(0, 0, 0, 0.05);
        }
        
        .form-control {
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.3);
            color: var(--text-primary);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        
        [data-theme="light"] .form-control {
            background: rgba(248, 250, 252, 0.8);
        }
        
        .form-control:focus {
            background: rgba(99, 102, 241, 0.15);
            border-color: var(--primary-cyan);
            color: var(--text-primary);
            box-shadow: 0 0 0 3px rgba(0, 212, 255, 0.1);
        }
        
        [data-theme="light"] .form-control:focus {
            background: rgba(255, 255, 255, 0.95);
        }
        
        .form-control::placeholder {
            color: var(--text-secondary);
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
        
        .gradient-text {
            background: var(--cyan-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--cyan-gradient);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 212, 255, 0.3);
            z-index: 1000;
        }
        
        .theme-toggle:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 212, 255, 0.4);
        }
        
        .toast-container {
            position: fixed;
            top: 20px;
            right: 80px;
            z-index: 9999;
        }
        
        .toast-modern {
            background: rgba(239, 68, 68, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(239, 68, 68, 0.5);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(239, 68, 68, 0.3);
            color: white;
            padding: 1rem 1.5rem;
            min-width: 300px;
            animation: slideInRight 0.3s ease-out;
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
        
        .toast-modern.hide {
            animation: slideOutRight 0.3s ease-out forwards;
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
    <button class="theme-toggle" id="themeToggle" aria-label="Alternar tema">
        <i class="bi bi-sun-fill" id="themeIcon"></i>
    </button>
    <div class="toast-container" id="toastContainer"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card p-4" style="color: var(--text-primary);">
                    <div class="text-center mb-4">
                        <div style="width: 80px; height: 80px; background: var(--cyan-gradient); border-radius: 20px; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; box-shadow: 0 8px 25px rgba(0, 212, 255, 0.3);">
                            <i class="bi bi-shield-lock-fill fs-1 text-white"></i>
                        </div>
                        <h1 class="mt-3 mb-1 gradient-text">Painel Administrativo</h1>
                        <p style="color: var(--text-secondary);">Acesse o painel de controle</p>
                    </div>
                    <form action="processalogin.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label" style="color: var(--primary-cyan); font-weight: 600;">
                                <i class="bi bi-person me-2"></i> Usuário
                            </label>
                            <input type="text" class="form-control" id="username" name="username" 
                                   placeholder="Digite seu usuário" required autofocus>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label" style="color: var(--primary-cyan); font-weight: 600;">
                                <i class="bi bi-lock me-2"></i> Senha
                            </label>
                            <input type="password" class="form-control" id="password" name="password" 
                                   placeholder="Digite sua senha" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-modern btn-lg" name="submit">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Entrar
                            </button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <a href="../index.php" class="text-decoration-none" style="color: var(--primary-cyan); transition: color 0.3s;">
                            <i class="bi bi-arrow-left me-2"></i> Voltar ao site
                        </a>
                    </div>
                </div>
            </div>
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
        
        function showErrorToast(message) {
            const toastContainer = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = 'toast-modern';
            toast.innerHTML = `
                <div class="d-flex align-items-center">
                    <div style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                        <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                    </div>
                    <div class="flex-grow-1">
                        <strong class="d-block mb-1">Erro no Login</strong>
                        <span class="small">${message}</span>
                    </div>
                    <button type="button" class="btn-close btn-close-white ms-2" onclick="closeToast(this)"></button>
                </div>
            `;
            toastContainer.appendChild(toast);
            
            setTimeout(() => {
                closeToast(toast.querySelector('.btn-close'));
            }, 5000);
        }
        
        function closeToast(button) {
            const toast = button.closest('.toast-modern');
            toast.classList.add('hide');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }
        
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('error') === 'invalid') {
            showErrorToast('Usuário ou senha incorretos. Tente novamente.');
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    </script>
</body>
</html>
