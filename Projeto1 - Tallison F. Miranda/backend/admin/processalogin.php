<?php
// Este arquivo processa o formulário de login do painel administrativo
// Ele recebe os dados do formulário, verifica se estão corretos e cria uma sessão se o login for válido
// É chamado quando o usuário clica no botão "Entrar" na página de login

// Inicia uma sessão PHP
// Sessões permitem armazenar dados do usuário enquanto ele navega pelo site
// Os dados ficam no servidor e são identificados por um cookie no navegador
session_start();

// Define as credenciais de acesso válidas (usuário e senha corretos)
// Em um sistema real, essas informações viriam de um banco de dados
// Por enquanto, estão "hardcoded" (fixas no código) para simplificar
$usuario = "admin";  // Nome de usuário válido
$senha = "123";      // Senha válida

// Pega os dados enviados pelo formulário de login
// $_POST é um array que contém todos os dados enviados via método POST
// O formulário envia os campos com os nomes "username" e "password"
$username = $_POST['username'];  // Nome de usuário digitado pelo usuário
$password = $_POST['password'];  // Senha digitada pelo usuário

// Compara as credenciais digitadas com as credenciais válidas
// === verifica se são iguais E do mesmo tipo (comparação estrita)
if ($username === $usuario && $password === $senha) {
    // Se as credenciais estiverem corretas:
    
    // Cria uma variável de sessão chamada 'logado' com valor true
    // Esta variável será verificada em outras páginas para saber se o usuário está logado
    $_SESSION['logado'] = true;
    
    // Redireciona o usuário para a página principal do painel administrativo
    // header() envia um cabeçalho HTTP que instrui o navegador a ir para outra página
    // Caminho relativo da raiz do projeto (onde o servidor PHP está rodando)
    header("Location: /frontend/admin/admin.php");
    
    // exit encerra a execução do script imediatamente
    // É importante para garantir que nenhum código adicional seja executado após o redirecionamento
    exit;
} else {
    // Se as credenciais estiverem incorretas:
    
    // Redireciona de volta para a página de login
    // O "?error=invalid" adiciona um parâmetro na URL que indica que houve erro
    // A página login.php usa este parâmetro para exibir uma mensagem de erro
    header("Location: /frontend/admin/login.php?error=invalid");
    
    // Encerra a execução do script
    exit;
}
// Nota: Em um sistema de produção, seria recomendado:
// - Armazenar senhas com hash (criptografia) no banco de dados
// - Usar prepared statements para evitar SQL injection
// - Implementar proteção contra força bruta (muitas tentativas de login)
// - Adicionar tokens CSRF para segurança adicional
