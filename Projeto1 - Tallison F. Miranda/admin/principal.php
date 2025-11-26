<div class="text-center mb-5">
    <h1 class="display-3 fw-bold mb-3 gradient-text">
        <i class="bi bi-speedometer2 me-3"></i> Bem-vindo ao Painel Administrativo
    </h1>
    <p class="lead text-secondary fs-5">Gerencie jogadores e personagens da campanha</p>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-6">
        <div class="glass-card p-5 h-100 text-center">
            <div class="mb-4">
                <div style="width: 100px; height: 100px; background: var(--cyan-gradient); border-radius: 24px; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 8px 25px rgba(0, 212, 255, 0.3);">
                    <i class="bi bi-people-fill fs-1 text-white"></i>
                </div>
            </div>
            <h3 class="mb-3 gradient-text">Gerenciar Jogadores</h3>
            <p class="text-secondary mb-4">Cadastre, edite ou exclua jogadores da campanha</p>
            <a href="?pg=jogador-admin" class="btn btn-modern">
                <i class="bi bi-arrow-right me-2"></i> Acessar
            </a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="glass-card p-5 h-100 text-center">
            <div class="mb-4">
                <div style="width: 100px; height: 100px; background: var(--purple-gradient); border-radius: 24px; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 8px 25px rgba(124, 58, 237, 0.3);">
                    <i class="bi bi-person-badge-fill fs-1 text-white"></i>
                </div>
            </div>
            <h3 class="mb-3" style="background: var(--purple-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Gerenciar Personagens</h3>
            <p class="text-secondary mb-4">Cadastre, edite ou exclua personagens e suas estatísticas</p>
            <a href="?pg=personagem-admin" class="btn btn-modern" style="background: var(--purple-gradient); box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);">
                <i class="bi bi-arrow-right me-2"></i> Acessar
            </a>
        </div>
    </div>
</div>

<?php
require_once "config.inc.php";

$sql_jogadores = "SELECT COUNT(*) as total FROM jogadores";
$result_jogadores = mysqli_query($conexao, $sql_jogadores);
$total_jogadores = mysqli_fetch_assoc($result_jogadores)['total'];

$sql_personagens = "SELECT COUNT(*) as total FROM personagens";
$result_personagens = mysqli_query($conexao, $sql_personagens);
$total_personagens = mysqli_fetch_assoc($result_personagens)['total'];
?>

<div class="row g-4">
    <div class="col-md-6">
        <div class="glass-card p-4 h-100 d-flex flex-column" style="background: rgba(0, 212, 255, 0.1); border-color: rgba(0, 212, 255, 0.3);">
            <h5 class="mb-3 gradient-text">
                <i class="bi bi-people me-2"></i> Estatísticas
            </h5>
            <div class="d-flex justify-content-between align-items-center flex-grow-1">
                <div>
                    <p class="mb-1 text-secondary small">Total de Jogadores</p>
                    <p class="mb-0 fw-bold fs-4 gradient-text"><?= $total_jogadores ?></p>
                </div>
                <div>
                    <p class="mb-1 text-secondary small">Total de Personagens</p>
                    <p class="mb-0 fw-bold fs-4" style="background: var(--purple-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;"><?= $total_personagens ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="glass-card p-4 h-100 d-flex flex-column">
            <h5 class="mb-3 gradient-text">
                <i class="bi bi-info-circle me-2"></i> Informações
            </h5>
            <p class="mb-0 text-secondary flex-grow-1 d-flex align-items-center">Use o menu acima para navegar entre as seções de gerenciamento.</p>
        </div>
    </div>
</div>
