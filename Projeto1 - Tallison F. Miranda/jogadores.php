<div class="container">
    <div class="content-wrapper">
        <div class="text-center mb-5 pb-4">
            <h1 class="display-2 fw-bold mb-4 gradient-text" style="font-size: 3rem;">
                <i class="bi bi-people-fill me-3"></i> Jogadores da Campanha
            </h1>
            <p class="lead fs-5">Conheça os aventureiros que fazem parte desta jornada épica</p>
        </div>

        <?php
        require_once "admin/config.inc.php";

        $sql = "SELECT * FROM jogadores ORDER BY jogador ASC";
        $resultado = mysqli_query($conexao, $sql);

        if(mysqli_num_rows($resultado) > 0){
        ?>
        <div class="row g-4">
            <?php
            while($dados = mysqli_fetch_array($resultado)){
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="glass-card p-4 h-100" style="position: relative; overflow: hidden;">
                    <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: var(--cyan-gradient); opacity: 0.1; border-radius: 50%;"></div>
                    <div class="text-center mb-4" style="position: relative; z-index: 1;">
                        <div style="width: 80px; height: 80px; background: var(--cyan-gradient); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 1rem; box-shadow: 0 8px 25px rgba(0, 212, 255, 0.3);">
                            <i class="bi bi-person-circle fs-1 text-white"></i>
                        </div>
                        <h3 class="mb-3 gradient-text"><?= htmlspecialchars($dados['jogador']) ?></h3>
                    </div>
                    <div class="mb-4" style="position: relative; z-index: 1;">
                        <div class="mb-3 p-3" style="background: rgba(99, 102, 241, 0.1); border-radius: 12px; border-left: 3px solid var(--primary-cyan);">
                            <p class="mb-1 small text-secondary">Personagem</p>
                            <p class="mb-0 fw-semibold" style="color: var(--primary-cyan);"><?= htmlspecialchars($dados['personagem']) ?></p>
                        </div>
                        <?php if(!empty($dados['numero'])) { ?>
                        <div class="p-3" style="background: rgba(99, 102, 241, 0.1); border-radius: 12px; border-left: 3px solid var(--primary-cyan);">
                            <p class="mb-1 small text-secondary">Contato</p>
                            <p class="mb-0 fw-semibold" style="color: var(--primary-cyan);">
                                <i class="bi bi-telephone me-2"></i><?= htmlspecialchars($dados['numero']) ?>
                            </p>
                        </div>
                        <?php } ?>
                    </div>
                    <div style="position: relative; z-index: 1;">
                        <a href="?pg=personagens" class="btn btn-modern w-100">
                            <i class="bi bi-person-badge me-2"></i> Ver Personagem
                        </a>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <?php
        } else {
        ?>
        <div class="text-center py-5">
            <div style="width: 120px; height: 120px; background: rgba(99, 102, 241, 0.2); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                <i class="bi bi-inbox fs-1" style="color: var(--primary-cyan);"></i>
            </div>
            <h2 class="mb-3 gradient-text">Nenhum jogador cadastrado</h2>
            <p class="lead text-secondary mb-4">Os jogadores aparecerão aqui quando forem cadastrados.</p>
            <a href="admin/login.php" class="btn btn-modern btn-lg">
                <i class="bi bi-shield-lock me-2"></i> Acessar Admin para Cadastrar
            </a>
        </div>
        <?php
        }
        ?>
    </div>
</div>
