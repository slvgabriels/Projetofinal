<div class="container">
    <div class="content-wrapper">
        <div class="text-center mb-5 pb-4">
            <h1 class="display-2 fw-bold mb-4 gradient-text" style="font-size: 3rem;">
                <i class="bi bi-envelope-fill me-3"></i> Fale Conosco
            </h1>
            <p class="lead fs-5">Entre em contato conosco para dúvidas ou sugestões</p>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="glass-card p-5">
                    <form action="#" method="POST" id="contactForm">
                        <div class="mb-4">
                            <label for="nome" class="form-label mb-2" style="color: var(--primary-cyan); font-weight: 600;">
                                <i class="bi bi-person me-2"></i> Nome
                            </label>
                            <input type="text" class="form-control" 
                                   id="nome" name="nome" 
                                   style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                   placeholder="Seu nome completo" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="form-label mb-2" style="color: var(--primary-cyan); font-weight: 600;">
                                <i class="bi bi-envelope me-2"></i> Email
                            </label>
                            <input type="email" class="form-control" 
                                   id="email" name="email" 
                                   style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                   placeholder="seu@email.com" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="assunto" class="form-label mb-2" style="color: var(--primary-cyan); font-weight: 600;">
                                <i class="bi bi-tag me-2"></i> Assunto
                            </label>
                            <select class="form-select" 
                                    id="assunto" name="assunto" 
                                    style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem;"
                                    required>
                                <option value="">Selecione um assunto</option>
                                <option value="duvida">Dúvida sobre a Campanha</option>
                                <option value="sugestao">Sugestão</option>
                                <option value="problema">Reportar Problema</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="mensagem" class="form-label mb-2" style="color: var(--primary-cyan); font-weight: 600;">
                                <i class="bi bi-chat-left-text me-2"></i> Mensagem
                            </label>
                            <textarea class="form-control" 
                                      id="mensagem" name="mensagem" rows="5" 
                                      style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3); color: var(--text-primary); border-radius: 12px; padding: 0.75rem 1rem; resize: none;"
                                      placeholder="Digite sua mensagem aqui..." required></textarea>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-modern btn-lg">
                                <i class="bi bi-send me-2"></i> Enviar Mensagem
                            </button>
                        </div>
                    </form>
                    
                    <div id="formMessage" class="mt-4"></div>
                </div>
                
                <div class="glass-card p-4 mt-4 text-center">
                    <h5 class="mb-3 gradient-text">
                        <i class="bi bi-info-circle me-2"></i> Informações de Contato
                    </h5>
                    <p class="text-secondary mb-2">
                        <i class="bi bi-envelope me-2" style="color: var(--primary-cyan);"></i> contato@campanhadnd.com
                    </p>
                    <p class="text-secondary mb-0">
                        <i class="bi bi-clock me-2" style="color: var(--primary-cyan);"></i> Horário de Atendimento: Segunda a Sexta, 9h às 18h
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formMessage = document.getElementById('formMessage');
    formMessage.innerHTML = '<div class="glass-card p-4" style="background: rgba(0, 212, 255, 0.1); border-color: rgba(0, 212, 255, 0.3);"><div class="d-flex align-items-center"><i class="bi bi-check-circle-fill me-3" style="color: var(--primary-cyan); font-size: 1.5rem;"></i><div><h5 class="mb-1" style="color: var(--primary-cyan);">Mensagem enviada com sucesso!</h5><p class="mb-0 text-secondary">Entraremos em contato em breve.</p></div></div></div>';
    this.reset();
});
</script>
