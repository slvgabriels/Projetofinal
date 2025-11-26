<?php
require_once "config.inc.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $personagem = mysqli_real_escape_string($conexao, $_POST["personagem"]);
    $jogador = mysqli_real_escape_string($conexao, $_POST["jogador"]);
    $especie = mysqli_real_escape_string($conexao, $_POST["especie"]);
    $classe = mysqli_real_escape_string($conexao, $_POST["classe"]);
    $subclasse = mysqli_real_escape_string($conexao, $_POST["subclasse"]);
    $multclasse = mysqli_real_escape_string($conexao, $_POST["multclasse"]);
    $forca = (int)$_POST["forca"];
    $destreza = (int)$_POST["destreza"];
    $constituicao = (int)$_POST["constituicao"];
    $inteligencia = (int)$_POST["inteligencia"];
    $sabedoria = (int)$_POST["sabedoria"];
    $carisma = (int)$_POST["carisma"];

    $sql = "INSERT INTO personagens (personagem, jogador, especie, classe, subclasse, multclasse, forca, destreza, constituicao, inteligencia, sabedoria, carisma)
            VALUES ('$personagem', '$jogador', '$especie', '$classe', '$subclasse', '$multclasse', $forca, $destreza, $constituicao, $inteligencia, $sabedoria, $carisma)";
    
    $executa = mysqli_query($conexao, $sql);
    if($executa) {
        echo '<div class="glass-card p-4" style="background: rgba(124, 58, 237, 0.1); border-color: rgba(124, 58, 237, 0.3);">
                <div class="d-flex align-items-center mb-3">
                    <div style="width: 50px; height: 50px; background: var(--purple-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                        <i class="bi bi-check-circle-fill fs-4 text-white"></i>
                    </div>
                    <div>
                        <h4 class="mb-1" style="background: var(--purple-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Cadastro realizado com sucesso!</h4>
                        <p class="mb-0 text-secondary">O personagem foi cadastrado no sistema.</p>
                    </div>
                </div>
                <a href="?pg=personagem-admin" class="btn btn-modern" style="background: var(--purple-gradient); box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);">
                    <i class="bi bi-arrow-left me-2"></i> Voltar para Lista
                </a>
              </div>';
    } else {
        echo '<div class="glass-card p-4" style="background: rgba(239, 68, 68, 0.1); border-color: rgba(239, 68, 68, 0.3);">
                <div class="d-flex align-items-center mb-3">
                    <div style="width: 50px; height: 50px; background: rgba(239, 68, 68, 0.3); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                        <i class="bi bi-exclamation-triangle-fill fs-4" style="color: #ef4444;"></i>
                    </div>
                    <div>
                        <h4 class="mb-1" style="color: #ef4444;">Erro ao cadastrar!</h4>
                        <p class="mb-0 text-secondary">Ocorreu um erro ao tentar cadastrar o personagem. Tente novamente.</p>
                    </div>
                </div>
                <a href="?pg=personagem-form" class="btn" style="background: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.4); color: #ef4444; border-radius: 12px; padding: 0.75rem 2rem;">
                    <i class="bi bi-arrow-left me-2"></i> Tentar Novamente
                </a>
              </div>';
    }
} else {
    echo '<div class="glass-card p-4" style="background: rgba(0, 212, 255, 0.1); border-color: rgba(0, 212, 255, 0.3);">
            <div class="d-flex align-items-center mb-3">
                <div style="width: 50px; height: 50px; background: rgba(0, 212, 255, 0.3); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                    <i class="bi bi-shield-exclamation fs-4" style="color: var(--primary-cyan);"></i>
                </div>
                <div>
                    <h4 class="mb-1 gradient-text">Acesso negado!</h4>
                    <p class="mb-0 text-secondary">Você não tem permissão para acessar esta página diretamente.</p>
                </div>
            </div>
            <a href="?pg=personagem-admin" class="btn" style="background: rgba(160, 174, 192, 0.2); border: 1px solid rgba(160, 174, 192, 0.4); color: var(--text-secondary); border-radius: 12px; padding: 0.75rem 2rem;">
                <i class="bi bi-arrow-left me-2"></i> Voltar
            </a>
          </div>';
}
?>
