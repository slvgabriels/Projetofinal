<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0 gradient-text">
        <i class="bi bi-people-fill me-2"></i> Gerenciar Jogadores
    </h2>
    <a href="?pg=jogador-form" class="btn btn-modern">
        <i class="bi bi-plus-circle me-2"></i> Cadastrar Novo Jogador
    </a>
</div>

<?php
require_once "config.inc.php";

$sql = "SELECT * FROM jogadores ORDER BY jogador ASC";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){
?>
<div class="table-responsive">
    <table class="table" style="background: rgba(30, 35, 71, 0.3); border-radius: 16px; overflow: hidden;">
        <thead>
            <tr style="background: var(--cyan-gradient); color: white;">
                <th style="border: none; padding: 1rem;">ID</th>
                <th style="border: none; padding: 1rem;">Nome do Jogador</th>
                <th style="border: none; padding: 1rem;">Personagem</th>
                <th style="border: none; padding: 1rem;">Contato</th>
                <th class="text-center" style="border: none; padding: 1rem;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($dados = mysqli_fetch_array($resultado)){
            ?>
            <tr style="border-bottom: 1px solid rgba(99, 102, 241, 0.2); transition: background 0.3s;">
                <td style="border: none; padding: 1rem; color: var(--text-secondary);"><?= $dados['id'] ?></td>
                <td style="border: none; padding: 1rem;"><strong style="color: var(--text-primary);"><?= htmlspecialchars($dados['jogador']) ?></strong></td>
                <td style="border: none; padding: 1rem; color: var(--text-secondary);"><?= htmlspecialchars($dados['personagem']) ?></td>
                <td style="border: none; padding: 1rem; color: var(--text-secondary);"><?= htmlspecialchars($dados['numero']) ?></td>
                <td class="text-center" style="border: none; padding: 1rem;">
                    <a href="?pg=jogador-form-alterar&id=<?= $dados['id'] ?>" 
                       class="btn btn-sm me-1" 
                       style="background: rgba(0, 212, 255, 0.2); border: 1px solid rgba(0, 212, 255, 0.4); color: var(--primary-cyan); border-radius: 8px; padding: 0.4rem 1rem; transition: all 0.3s;"
                       onmouseover="this.style.background='rgba(0, 212, 255, 0.3)'; this.style.borderColor='var(--primary-cyan)'"
                       onmouseout="this.style.background='rgba(0, 212, 255, 0.2)'; this.style.borderColor='rgba(0, 212, 255, 0.4)'">
                        <i class="bi bi-pencil me-1"></i> Editar
                    </a>
                    <a href="?pg=jogador-excluir&id=<?= $dados['id'] ?>" 
                       class="btn btn-sm"
                       style="background: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.4); color: #ef4444; border-radius: 8px; padding: 0.4rem 1rem; transition: all 0.3s;"
                       onmouseover="this.style.background='rgba(239, 68, 68, 0.3)'; this.style.borderColor='#ef4444'"
                       onmouseout="this.style.background='rgba(239, 68, 68, 0.2)'; this.style.borderColor='rgba(239, 68, 68, 0.4)'"
                       onclick="return confirm('Tem certeza que deseja excluir este jogador?')">
                        <i class="bi bi-trash me-1"></i> Excluir
                    </a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
} else {
?>
<div class="glass-card p-5 text-center">
    <div style="width: 100px; height: 100px; background: rgba(99, 102, 241, 0.2); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
        <i class="bi bi-inbox fs-1" style="color: var(--primary-cyan);"></i>
    </div>
    <h4 class="mb-3 gradient-text">Nenhum jogador cadastrado!</h4>
    <p class="text-secondary mb-4">Comece cadastrando o primeiro jogador da campanha.</p>
    <a href="?pg=jogador-form" class="btn btn-modern">
        <i class="bi bi-plus-circle me-2"></i> Cadastrar Primeiro Jogador
    </a>
</div>
<?php
}
?>
