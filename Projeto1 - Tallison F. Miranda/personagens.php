<div class="container">
    <div class="content-wrapper">
        <div class="text-center mb-5 pb-4">
            <h1 class="display-2 fw-bold mb-4 gradient-text" style="font-size: 3rem;">
                <i class="bi bi-person-badge-fill me-3"></i> Personagens da Campanha
            </h1>
            <p class="lead fs-5">Explore os heróis e suas características detalhadas</p>
        </div>

        <?php
        require_once "admin/config.inc.php";

        $sql = "SELECT * FROM personagens ORDER BY personagem ASC";
        $resultado = mysqli_query($conexao, $sql);

        if(mysqli_num_rows($resultado) > 0){
        ?>
        <div class="row g-4">
            <?php
            while($dados = mysqli_fetch_array($resultado)){
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="glass-card p-4 h-100" style="position: relative; overflow: hidden;">
                    <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: var(--purple-gradient); opacity: 0.1; border-radius: 50%;"></div>
                    
                    <div class="mb-4" style="position: relative; z-index: 1;">
                        <div class="p-3 mb-3" style="background: var(--purple-gradient); border-radius: 16px; text-align: center;">
                            <h3 class="mb-1 fw-bold text-white"><?= htmlspecialchars($dados['personagem']) ?></h3>
                            <p class="mb-0 small text-white" style="opacity: 0.9;">Jogador: <?= htmlspecialchars($dados['jogador']) ?></p>
                        </div>
                        
                        <div class="mb-3">
                            <h5 class="mb-3" style="color: var(--primary-cyan);">
                                <i class="bi bi-info-circle me-2"></i> Informações
                            </h5>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="p-2" style="background: rgba(99, 102, 241, 0.1); border-radius: 8px;">
                                        <p class="mb-0 small text-secondary">Espécie</p>
                                        <p class="mb-0 fw-semibold" style="color: var(--primary-cyan); font-size: 0.9rem;"><?= htmlspecialchars($dados['especie']) ?></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2" style="background: rgba(99, 102, 241, 0.1); border-radius: 8px;">
                                        <p class="mb-0 small text-secondary">Classe</p>
                                        <p class="mb-0 fw-semibold" style="color: var(--primary-cyan); font-size: 0.9rem;"><?= htmlspecialchars($dados['classe']) ?></p>
                                    </div>
                                </div>
                                <?php if(!empty($dados['subclasse'])) { ?>
                                <div class="col-12">
                                    <div class="p-2" style="background: rgba(99, 102, 241, 0.1); border-radius: 8px;">
                                        <p class="mb-0 small text-secondary">Subclasse</p>
                                        <p class="mb-0 fw-semibold" style="color: var(--primary-cyan); font-size: 0.9rem;"><?= htmlspecialchars($dados['subclasse']) ?></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        
                        <div>
                            <h5 class="mb-3" style="color: var(--primary-cyan);">
                                <i class="bi bi-bar-chart me-2"></i> Atributos
                            </h5>
                            <div class="row g-2">
                                <div class="col-4">
                                    <div class="p-2 text-center" style="background: rgba(99, 102, 241, 0.15); border-radius: 10px; border: 1px solid rgba(99, 102, 241, 0.3);">
                                        <p class="mb-0 small text-secondary">FOR</p>
                                        <p class="mb-0 fw-bold" style="color: var(--primary-cyan); font-size: 1.1rem;"><?= $dados['forca'] ?></p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-2 text-center" style="background: rgba(99, 102, 241, 0.15); border-radius: 10px; border: 1px solid rgba(99, 102, 241, 0.3);">
                                        <p class="mb-0 small text-secondary">DES</p>
                                        <p class="mb-0 fw-bold" style="color: var(--primary-cyan); font-size: 1.1rem;"><?= $dados['destreza'] ?></p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-2 text-center" style="background: rgba(99, 102, 241, 0.15); border-radius: 10px; border: 1px solid rgba(99, 102, 241, 0.3);">
                                        <p class="mb-0 small text-secondary">CON</p>
                                        <p class="mb-0 fw-bold" style="color: var(--primary-cyan); font-size: 1.1rem;"><?= $dados['constituicao'] ?></p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-2 text-center" style="background: rgba(99, 102, 241, 0.15); border-radius: 10px; border: 1px solid rgba(99, 102, 241, 0.3);">
                                        <p class="mb-0 small text-secondary">INT</p>
                                        <p class="mb-0 fw-bold" style="color: var(--primary-cyan); font-size: 1.1rem;"><?= $dados['inteligencia'] ?></p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-2 text-center" style="background: rgba(99, 102, 241, 0.15); border-radius: 10px; border: 1px solid rgba(99, 102, 241, 0.3);">
                                        <p class="mb-0 small text-secondary">SAB</p>
                                        <p class="mb-0 fw-bold" style="color: var(--primary-cyan); font-size: 1.1rem;"><?= $dados['sabedoria'] ?></p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-2 text-center" style="background: rgba(99, 102, 241, 0.15); border-radius: 10px; border: 1px solid rgba(99, 102, 241, 0.3);">
                                        <p class="mb-0 small text-secondary">CAR</p>
                                        <p class="mb-0 fw-bold" style="color: var(--primary-cyan); font-size: 1.1rem;"><?= $dados['carisma'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            <h2 class="mb-3 gradient-text">Nenhum personagem cadastrado</h2>
            <p class="lead text-secondary mb-4">Os personagens aparecerão aqui quando forem cadastrados.</p>
            <a href="admin/login.php" class="btn btn-modern btn-lg">
                <i class="bi bi-shield-lock me-2"></i> Acessar Admin para Cadastrar
            </a>
        </div>
        <?php
        }
        ?>
    </div>
</div>
