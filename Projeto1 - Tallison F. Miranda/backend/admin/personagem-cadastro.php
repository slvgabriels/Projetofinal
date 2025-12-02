<?php
// Este arquivo processa o cadastro de novos personagens
// Ele recebe todos os dados do formulário (nome, atributos, classe, etc) e insere no banco

// Inclui o arquivo de configuração do banco de dados
require_once __DIR__ . "/config.inc.php";

// Verifica se o formulário foi enviado usando o método POST
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pega os dados de texto do formulário e protege contra SQL Injection
    // mysqli_real_escape_string() escapa caracteres especiais perigosos
    $personagem = mysqli_real_escape_string($conexao, $_POST["personagem"]);
    $jogador = mysqli_real_escape_string($conexao, $_POST["jogador"]);
    $especie = mysqli_real_escape_string($conexao, $_POST["especie"]);
    $classe = mysqli_real_escape_string($conexao, $_POST["classe"]);
    $subclasse = mysqli_real_escape_string($conexao, $_POST["subclasse"]);
    $multclasse = mysqli_real_escape_string($conexao, $_POST["multclasse"]);
    
    // Pega os atributos numéricos do personagem
    // (int) força a conversão para número inteiro
    // Isso garante que valores inválidos sejam convertidos para 0
    $forca = (int)$_POST["forca"];           // Atributo de Força
    $destreza = (int)$_POST["destreza"];     // Atributo de Destreza
    $constituicao = (int)$_POST["constituicao"];  // Atributo de Constituição
    $inteligencia = (int)$_POST["inteligencia"];  // Atributo de Inteligência
    $sabedoria = (int)$_POST["sabedoria"];   // Atributo de Sabedoria
    $carisma = (int)$_POST["carisma"];       // Atributo de Carisma

    // Monta o comando SQL para inserir um novo personagem
    // INSERT INTO adiciona um novo registro na tabela 'personagens'
    // Os valores numéricos não precisam de aspas (são números, não texto)
    $sql = "INSERT INTO personagens (personagem, jogador, especie, classe, subclasse, multclasse, forca, destreza, constituicao, inteligencia, sabedoria, carisma)
            VALUES ('$personagem', '$jogador', '$especie', '$classe', '$subclasse', '$multclasse', $forca, $destreza, $constituicao, $inteligencia, $sabedoria, $carisma)";
    
    // Executa o comando SQL no banco de dados
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
