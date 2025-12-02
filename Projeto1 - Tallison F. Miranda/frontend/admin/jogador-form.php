<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="glass-card">
            <div class="p-4" style="background: var(--cyan-gradient); border-radius: 20px 20px 0 0;">
                <h3 class="mb-0 text-white">
                    <i class="bi bi-person-plus me-2"></i> Cadastrar Novo Jogador
                </h3>
            </div>
            <div class="p-4">
                <form action="?pg=jogador-cadastro" method="post">
                    <div class="mb-3">
                        <label for="jogador" class="form-label mb-2" style="color: var(--primary-cyan); font-weight: 600;">
                            <i class="bi bi-person me-2"></i> Nome do Jogador <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" 
                               id="jogador" name="jogador" required 
                               style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                               placeholder="Digite o nome do jogador">
                    </div>
                    
                    <div class="mb-3">
                        <label for="personagem" class="form-label mb-2" style="color: var(--primary-cyan); font-weight: 600;">
                            <i class="bi bi-person-badge me-2"></i> Nome do Personagem
                        </label>
                        <input type="text" class="form-control" 
                               id="personagem" name="personagem" 
                               style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                               placeholder="Digite o nome do personagem">
                    </div>
                    
                    <div class="mb-4">
                        <label for="numero" class="form-label mb-2" style="color: var(--primary-cyan); font-weight: 600;">
                            <i class="bi bi-telephone me-2"></i> Número de Contato
                        </label>
                        <input type="text" class="form-control" 
                               id="numero" name="numero" 
                               style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                               placeholder="Ex: (83) 98888-5555">
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="?pg=jogador-admin" class="btn" style="background: rgba(160, 174, 192, 0.2); border: 1px solid rgba(160, 174, 192, 0.4); color: var(--text-secondary); border-radius: 12px; padding: 0.75rem 2rem;">
                            <i class="bi bi-arrow-left me-2"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-modern">
                            <i class="bi bi-check-circle me-2"></i> Cadastrar Jogador
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
