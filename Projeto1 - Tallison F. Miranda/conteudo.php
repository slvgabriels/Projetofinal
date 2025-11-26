<div class="container">
    <div class="content-wrapper">
        <div class="text-center mb-5 pb-4">
            <h1 class="display-2 fw-bold mb-4 gradient-text" style="font-size: 3.5rem;">
                Bem-vindo à Campanha
            </h1>
            <p class="lead fs-4" style="max-width: 600px; margin: 0 auto;">
                Organize e gerencie sua campanha de Dungeons & Dragons com tecnologia de ponta
            </p>
        </div>

        <div class="row mb-5 g-4">
            <div class="col-md-6">
                <div class="glass-card p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3" style="width: 50px; height: 50px; background: var(--cyan-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-book fs-4 text-white"></i>
                        </div>
                        <h3 class="mb-0" style="color: var(--primary-cyan);">Sobre a Campanha</h3>
                    </div>
                    <p class="text-secondary mb-0" style="line-height: 1.8;">
                        Plataforma dedicada à organização de campanhas de D&D. 
                        Gerencie jogadores, personagens e todas as informações 
                        importantes da sua aventura épica de forma moderna e intuitiva.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="glass-card p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3" style="width: 50px; height: 50px; background: var(--purple-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-list-check fs-4 text-white"></i>
                        </div>
                        <h3 class="mb-0" style="color: #a78bfa;">Funcionalidades</h3>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2" style="color: var(--primary-cyan);"></i><span class="text-secondary">Cadastro de Jogadores</span></li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2" style="color: var(--primary-cyan);"></i><span class="text-secondary">Gerenciamento de Personagens</span></li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2" style="color: var(--primary-cyan);"></i><span class="text-secondary">Estatísticas e Atributos</span></li>
                        <li><i class="bi bi-check-circle-fill me-2" style="color: var(--primary-cyan);"></i><span class="text-secondary">Painel Administrativo</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">
                <div class="glass-card p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="me-3" style="width: 50px; height: 50px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-scroll fs-4 text-white"></i>
                        </div>
                        <h3 class="mb-0 gradient-text">Regras da Campanha</h3>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="p-3" style="background: rgba(99, 102, 241, 0.1); border-radius: 12px; border-left: 3px solid var(--primary-cyan);">
                                <h5 class="mb-3" style="color: var(--primary-cyan);">
                                    <i class="bi bi-dice-1 me-2"></i> Sistema de Dados
                                </h5>
                                <p class="text-secondary mb-0 small">
                                    Utilizamos o sistema padrão de D&D 5ª Edição com dados de 20 faces (d20) para testes de habilidade e ataques.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3" style="background: rgba(99, 102, 241, 0.1); border-radius: 12px; border-left: 3px solid var(--primary-cyan);">
                                <h5 class="mb-3" style="color: var(--primary-cyan);">
                                    <i class="bi bi-shield-check me-2"></i> Atributos
                                </h5>
                                <p class="text-secondary mb-0 small">
                                    Cada personagem possui 6 atributos principais: Força, Destreza, Constituição, Inteligência, Sabedoria e Carisma.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3" style="background: rgba(99, 102, 241, 0.1); border-radius: 12px; border-left: 3px solid var(--primary-cyan);">
                                <h5 class="mb-3" style="color: var(--primary-cyan);">
                                    <i class="bi bi-people-fill me-2"></i> Trabalho em Equipe
                                </h5>
                                <p class="text-secondary mb-0 small">
                                    A colaboração entre jogadores é essencial. Trabalhem juntos para superar os desafios da campanha.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        require_once "admin/config.inc.php";
        
        $sql_jogadores = "SELECT COUNT(*) as total FROM jogadores";
        $result_jogadores = mysqli_query($conexao, $sql_jogadores);
        $total_jogadores = mysqli_fetch_assoc($result_jogadores)['total'];
        
        $sql_personagens = "SELECT COUNT(*) as total FROM personagens";
        $result_personagens = mysqli_query($conexao, $sql_personagens);
        $total_personagens = mysqli_fetch_assoc($result_personagens)['total'];
        ?>
        
        <div class="row text-center g-4 mb-5">
            <div class="col-md-6">
                <div class="stat-card" style="background: var(--cyan-gradient);">
                    <div style="position: relative; z-index: 1;">
                        <h2 class="display-1 fw-bold mb-3"><?= $total_jogadores ?></h2>
                        <h4 class="mb-4"><i class="bi bi-people me-2"></i> Jogadores</h4>
                        <a href="?pg=jogadores" class="btn btn-light btn-modern" style="background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.3);">
                            Ver Jogadores <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stat-card" style="background: var(--purple-gradient);">
                    <div style="position: relative; z-index: 1;">
                        <h2 class="display-1 fw-bold mb-3"><?= $total_personagens ?></h2>
                        <h4 class="mb-4"><i class="bi bi-person-badge me-2"></i> Personagens</h4>
                        <a href="?pg=personagens" class="btn btn-light btn-modern" style="background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.3);">
                            Ver Personagens <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <div class="glass-card p-5">
                <div class="mb-4">
                    <div style="width: 60px; height: 60px; background: var(--cyan-gradient); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                        <i class="bi bi-info-circle fs-2 text-white"></i>
                    </div>
                </div>
                <h4 class="mb-3 gradient-text">Pronto para começar?</h4>
                <p class="text-secondary mb-4" style="max-width: 500px; margin: 0 auto;">
                    Explore as páginas de Jogadores e Personagens para ver os membros da campanha, ou acesse o painel administrativo para gerenciar o conteúdo.
                </p>
                <a href="admin/login.php" class="btn btn-modern btn-lg">
                    <i class="bi bi-shield-lock me-2"></i> Acessar Painel Admin
                </a>
            </div>
        </div>
    </div>
</div>
