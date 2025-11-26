<?php
require_once "config.inc.php";

$id = $_GET['id'];
$sql = "SELECT * FROM personagens WHERE id = '$id'";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){
    $personagem = mysqli_fetch_array($resultado);
?>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="glass-card">
            <div class="p-4" style="background: var(--purple-gradient); border-radius: 20px 20px 0 0;">
                <h3 class="mb-0 text-white">
                    <i class="bi bi-pencil-square me-2"></i> Editar Personagem
                </h3>
            </div>
            <div class="p-4">
                <form action="?pg=personagem-alterar" method="post">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($personagem['id']) ?>">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="personagem" class="form-label mb-2" style="color: var(--primary-cyan); font-weight: 600;">
                                <i class="bi bi-person-badge me-2"></i> Nome do Personagem <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" 
                                   id="personagem" name="personagem" required 
                                   style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                   value="<?= htmlspecialchars($personagem['personagem']) ?>">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="jogador" class="form-label mb-2" style="color: var(--primary-cyan); font-weight: 600;">
                                <i class="bi bi-person me-2"></i> Nome do Jogador
                            </label>
                            <input type="text" class="form-control" 
                                   id="jogador" name="jogador" 
                                   style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                   value="<?= htmlspecialchars($personagem['jogador']) ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="especie" class="form-label mb-2" style="color: var(--primary-cyan); font-weight: 600;">
                                <i class="bi bi-star me-2"></i> Espécie
                            </label>
                            <input type="text" class="form-control" 
                                   id="especie" name="especie" 
                                   style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                   value="<?= htmlspecialchars($personagem['especie']) ?>">
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="classe" class="form-label mb-2" style="color: var(--primary-cyan); font-weight: 600;">
                                <i class="bi bi-shield me-2"></i> Classe
                            </label>
                            <input type="text" class="form-control" 
                                   id="classe" name="classe" 
                                   style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                   value="<?= htmlspecialchars($personagem['classe']) ?>">
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="subclasse" class="form-label mb-2" style="color: var(--primary-cyan); font-weight: 600;">
                                <i class="bi bi-shield-check me-2"></i> Subclasse
                            </label>
                            <input type="text" class="form-control" 
                                   id="subclasse" name="subclasse" 
                                   style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                   value="<?= htmlspecialchars($personagem['subclasse']) ?>">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="multclasse" class="form-label mb-2" style="color: var(--primary-cyan); font-weight: 600;">
                            <i class="bi bi-diagram-3 me-2"></i> Multiclasse
                        </label>
                        <input type="text" class="form-control" 
                               id="multclasse" name="multclasse" 
                               style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                               value="<?= htmlspecialchars($personagem['multclasse']) ?>">
                    </div>
                    
                    <hr class="my-4" style="border-color: rgba(99, 102, 241, 0.2);">
                    
                    <h5 class="mb-3 gradient-text"><i class="bi bi-bar-chart me-2"></i> Atributos</h5>
                    
                    <div class="row">
                        <div class="col-md-4 col-6 mb-3">
                            <label for="forca" class="form-label mb-2" style="color: var(--text-secondary);">Força</label>
                            <input type="number" class="form-control" 
                                   id="forca" name="forca" min="1" max="30" 
                                   style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                   value="<?= $personagem['forca'] ?>">
                        </div>
                        
                        <div class="col-md-4 col-6 mb-3">
                            <label for="destreza" class="form-label mb-2" style="color: var(--text-secondary);">Destreza</label>
                            <input type="number" class="form-control" 
                                   id="destreza" name="destreza" min="1" max="30" 
                                   style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                   value="<?= $personagem['destreza'] ?>">
                        </div>
                        
                        <div class="col-md-4 col-6 mb-3">
                            <label for="constituicao" class="form-label mb-2" style="color: var(--text-secondary);">Constituição</label>
                            <input type="number" class="form-control" 
                                   id="constituicao" name="constituicao" min="1" max="30" 
                                   style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                   value="<?= $personagem['constituicao'] ?>">
                        </div>
                        
                        <div class="col-md-4 col-6 mb-3">
                            <label for="inteligencia" class="form-label mb-2" style="color: var(--text-secondary);">Inteligência</label>
                            <input type="number" class="form-control" 
                                   id="inteligencia" name="inteligencia" min="1" max="30" 
                                   style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                   value="<?= $personagem['inteligencia'] ?>">
                        </div>
                        
                        <div class="col-md-4 col-6 mb-3">
                            <label for="sabedoria" class="form-label mb-2" style="color: var(--text-secondary);">Sabedoria</label>
                            <input type="number" class="form-control" 
                                   id="sabedoria" name="sabedoria" min="1" max="30" 
                                   style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                   value="<?= $personagem['sabedoria'] ?>">
                        </div>
                        
                        <div class="col-md-4 col-6 mb-3">
                            <label for="carisma" class="form-label mb-2" style="color: var(--text-secondary);">Carisma</label>
                            <input type="number" class="form-control" 
                                   id="carisma" name="carisma" min="1" max="30" 
                                   style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                   value="<?= $personagem['carisma'] ?>">
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <a href="?pg=personagem-admin" class="btn" style="background: rgba(160, 174, 192, 0.2); border: 1px solid rgba(160, 174, 192, 0.4); color: var(--text-secondary); border-radius: 12px; padding: 0.75rem 2rem;">
                            <i class="bi bi-arrow-left me-2"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-modern" style="background: var(--purple-gradient); box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);">
                            <i class="bi bi-check-circle me-2"></i> Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
} else {
?>
<div class="glass-card p-4" style="background: rgba(239, 68, 68, 0.1); border-color: rgba(239, 68, 68, 0.3);">
    <h4 class="mb-3" style="color: #ef4444;"><i class="bi bi-exclamation-triangle me-2"></i> Personagem não encontrado!</h4>
    <a href="?pg=personagem-admin" class="btn" style="background: rgba(160, 174, 192, 0.2); border: 1px solid rgba(160, 174, 192, 0.4); color: var(--text-secondary); border-radius: 12px; padding: 0.75rem 2rem;">
        Voltar
    </a>
</div>
<?php
}
?>
