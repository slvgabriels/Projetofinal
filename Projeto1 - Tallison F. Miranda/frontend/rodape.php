<footer class="mt-5 py-5" style="background: var(--navbar-bg); backdrop-filter: blur(20px); border-top: 1px solid var(--border-color); transition: all 0.3s ease;">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="mb-3 gradient-text">
                    <i class="bi bi-dice-6-fill me-2"></i> Campanha D&D
                </h5>
                <p class="text-secondary mb-0" style="line-height: 1.8;">
                    Plataforma moderna para organização e gerenciamento de campanhas de Dungeons & Dragons.
                </p>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3" style="color: var(--primary-cyan);">Links Rápidos</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="?pg=conteudo" class="text-decoration-none text-secondary" style="transition: color 0.3s;"><i class="bi bi-house me-2"></i> Home</a></li>
                    <li class="mb-2"><a href="?pg=jogadores" class="text-decoration-none text-secondary" style="transition: color 0.3s;"><i class="bi bi-people me-2"></i> Jogadores</a></li>
                    <li class="mb-2"><a href="?pg=personagens" class="text-decoration-none text-secondary" style="transition: color 0.3s;"><i class="bi bi-person-badge me-2"></i> Personagens</a></li>
                    <li><a href="admin/login.php" class="text-decoration-none text-secondary" style="transition: color 0.3s;"><i class="bi bi-shield-lock me-2"></i> Admin</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3" style="color: var(--primary-cyan);">Contato</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="?pg=faleconosco" class="text-decoration-none text-secondary" style="transition: color 0.3s;"><i class="bi bi-envelope me-2"></i> Fale Conosco</a></li>
                    <li><a href="?pg=quemsomos" class="text-decoration-none text-secondary" style="transition: color 0.3s;"><i class="bi bi-info-circle me-2"></i> Sobre Nós</a></li>
                </ul>
            </div>
        </div>
        <hr class="my-4" style="border-color: rgba(99, 102, 241, 0.2);">
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-secondary mb-2">
                    <i class="bi bi-copyright me-2"></i> <?= date('Y') ?> Campanha D&D. Todos os direitos reservados.
                </p>
                <p class="text-secondary mb-0" style="font-size: 0.9rem;">
                    Desenvolvido para organizar e gerenciar campanhas épicas de D&D
                </p>
            </div>
        </div>
    </div>
</footer>
</div>
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
