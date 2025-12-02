<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0" style="background: var(--purple-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
        <i class="bi bi-person-badge-fill me-2"></i> Gerenciar Personagens
    </h2>
    <a href="?pg=personagem-form" class="btn btn-modern" style="background: var(--purple-gradient); box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);">
        <i class="bi bi-plus-circle me-2"></i> Cadastrar Novo Personagem
    </a>
</div>

<?php
// Este arquivo exibe a lista de todos os personagens cadastrados no sistema
// Mostra informações detalhadas como atributos, classe, espécie, etc
// Permite visualizar, editar e excluir personagens através de cards

// Inclui o arquivo de configuração do banco de dados
require_once dirname(__DIR__, 2) . "/backend/admin/config.inc.php";

// Monta o comando SQL para buscar todos os personagens
// SELECT * busca todas as colunas de todos os registros
// FROM personagens especifica a tabela de onde buscar os dados
// ORDER BY personagem ASC ordena os resultados pelo nome do personagem em ordem alfabética (A-Z)
$sql = "SELECT * FROM personagens ORDER BY personagem ASC";

// Executa a consulta SQL no banco de dados
// mysqli_query() retorna um resultado que contém todos os registros encontrados
$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){
?>
<div class="row g-4">
    <?php
    // Loop que percorre cada registro retornado pela consulta SQL
    // mysqli_fetch_array() pega uma linha do resultado por vez
    // Quando não há mais linhas, retorna false e o loop para
    // $dados é um array que contém todos os dados de um personagem
    // (id, personagem, jogador, especie, classe, atributos, etc)
    while($dados = mysqli_fetch_array($resultado)){
    ?>
    <div class="col-md-6 col-lg-4">
        <div class="glass-card h-100" style="position: relative; overflow: hidden;">
            <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: var(--purple-gradient); opacity: 0.1; border-radius: 50%;"></div>
            
            <div class="p-4 mb-3" style="background: var(--purple-gradient); border-radius: 16px 16px 0 0; position: relative; z-index: 1;">
                <h5 class="mb-1 fw-bold text-white"><?= htmlspecialchars($dados['personagem']) ?></h5>
                <small class="text-white" style="opacity: 0.9;">Jogador: <?= htmlspecialchars($dados['jogador']) ?></small>
            </div>
            
            <div class="px-4 pb-3" style="position: relative; z-index: 1;">
                <div class="mb-3">
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="p-2" style="background: rgba(99, 102, 241, 0.1); border-radius: 8px; border-left: 3px solid var(--primary-cyan);">
                                <p class="mb-0 small text-secondary">Espécie</p>
                                <p class="mb-0 fw-semibold" style="color: var(--primary-cyan); font-size: 0.9rem;"><?= htmlspecialchars($dados['especie']) ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2" style="background: rgba(99, 102, 241, 0.1); border-radius: 8px; border-left: 3px solid var(--primary-cyan);">
                                <p class="mb-0 small text-secondary">Classe</p>
                                <p class="mb-0 fw-semibold" style="color: var(--primary-cyan); font-size: 0.9rem;"><?= htmlspecialchars($dados['classe']) ?></p>
                            </div>
                        </div>
                        <?php if(!empty($dados['subclasse'])) { ?>
                        <div class="col-12">
                            <div class="p-2" style="background: rgba(99, 102, 241, 0.1); border-radius: 8px; border-left: 3px solid var(--primary-cyan);">
                                <p class="mb-0 small text-secondary">Subclasse</p>
                                <p class="mb-0 fw-semibold" style="color: var(--primary-cyan); font-size: 0.9rem;"><?= htmlspecialchars($dados['subclasse']) ?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="mt-3">
                    <p class="mb-2 small text-secondary"><i class="bi bi-bar-chart me-1"></i> Atributos</p>
                    <div class="row g-2">
                        <div class="col-4">
                            <div class="p-2 text-center" style="background: rgba(99, 102, 241, 0.15); border-radius: 8px; border: 1px solid rgba(99, 102, 241, 0.3);">
                                <p class="mb-0 small text-secondary">FOR</p>
                                <p class="mb-0 fw-bold" style="color: var(--primary-cyan);"><?= $dados['forca'] ?></p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 text-center" style="background: rgba(99, 102, 241, 0.15); border-radius: 8px; border: 1px solid rgba(99, 102, 241, 0.3);">
                                <p class="mb-0 small text-secondary">DES</p>
                                <p class="mb-0 fw-bold" style="color: var(--primary-cyan);"><?= $dados['destreza'] ?></p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 text-center" style="background: rgba(99, 102, 241, 0.15); border-radius: 8px; border: 1px solid rgba(99, 102, 241, 0.3);">
                                <p class="mb-0 small text-secondary">CON</p>
                                <p class="mb-0 fw-bold" style="color: var(--primary-cyan);"><?= $dados['constituicao'] ?></p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 text-center" style="background: rgba(99, 102, 241, 0.15); border-radius: 8px; border: 1px solid rgba(99, 102, 241, 0.3);">
                                <p class="mb-0 small text-secondary">INT</p>
                                <p class="mb-0 fw-bold" style="color: var(--primary-cyan);"><?= $dados['inteligencia'] ?></p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 text-center" style="background: rgba(99, 102, 241, 0.15); border-radius: 8px; border: 1px solid rgba(99, 102, 241, 0.3);">
                                <p class="mb-0 small text-secondary">SAB</p>
                                <p class="mb-0 fw-bold" style="color: var(--primary-cyan);"><?= $dados['sabedoria'] ?></p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 text-center" style="background: rgba(99, 102, 241, 0.15); border-radius: 8px; border: 1px solid rgba(99, 102, 241, 0.3);">
                                <p class="mb-0 small text-secondary">CAR</p>
                                <p class="mb-0 fw-bold" style="color: var(--primary-cyan);"><?= $dados['carisma'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="px-4 pb-4" style="position: relative; z-index: 1;">
                <div class="d-grid gap-2">
                    <a href="?pg=personagem-form-alterar&id=<?= $dados['id'] ?>" 
                       class="btn btn-sm" 
                       style="background: rgba(0, 212, 255, 0.2); border: 1px solid rgba(0, 212, 255, 0.4); color: var(--primary-cyan); border-radius: 8px; padding: 0.5rem; transition: all 0.3s;"
                       onmouseover="this.style.background='rgba(0, 212, 255, 0.3)'; this.style.borderColor='var(--primary-cyan)'"
                       onmouseout="this.style.background='rgba(0, 212, 255, 0.2)'; this.style.borderColor='rgba(0, 212, 255, 0.4)'">
                        <i class="bi bi-pencil me-2"></i> Editar
                    </a>
                    <a href="?pg=personagem-excluir&id=<?= $dados['id'] ?>" 
                       class="btn btn-sm"
                       style="background: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.4); color: #ef4444; border-radius: 8px; padding: 0.5rem; transition: all 0.3s;"
                       onmouseover="this.style.background='rgba(239, 68, 68, 0.3)'; this.style.borderColor='#ef4444'"
                       onmouseout="this.style.background='rgba(239, 68, 68, 0.2)'; this.style.borderColor='rgba(239, 68, 68, 0.4)'"
                       onclick="return confirm('Tem certeza que deseja excluir este personagem?')">
                        <i class="bi bi-trash me-2"></i> Excluir
                    </a>
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
<div class="glass-card p-5 text-center">
    <div style="width: 100px; height: 100px; background: rgba(99, 102, 241, 0.2); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
        <i class="bi bi-inbox fs-1" style="color: var(--primary-cyan);"></i>
    </div>
    <h4 class="mb-3" style="background: var(--purple-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Nenhum personagem cadastrado!</h4>
    <p class="text-secondary mb-4">Comece cadastrando o primeiro personagem da campanha.</p>
    <a href="?pg=personagem-form" class="btn btn-modern" style="background: var(--purple-gradient); box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);">
        <i class="bi bi-plus-circle me-2"></i> Cadastrar Primeiro Personagem
    </a>
</div>
<?php
}
?>
