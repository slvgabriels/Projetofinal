#Projetofinal

_Integrantes + cargos:_

Tallison Miranda: Página Admin, Cadastros.

Luiz Dias: Front-end, Cabeçalho e Rodape.

Arthur Nunes: Página de Jogadores e Personagens.

Vinícius Angelo: Página de Discussões.

Eduardo Nunes: Pagina Principal (Homepage).

_Descrição do Projeto:_

O nosso projeto será um site para organizar e planejar campanhas de D&D, com duas ou três páginas, uma homepage com informações e regras sobre a campanha e uma página contendo o cadastro dos jogadores e seus personagens. Uma página admin para cadastrar jogadores e personagens.

## Como Rodar o Sistema

### Requisitos

- PHP 7.4 ou superior
- MySQL 8.0 ou superior
- Docker (opcional, mas recomendado para MySQL)
- Navegador web moderno

### Passo a Passo

#### 1. Instalar e Iniciar MySQL

**Opção A: Usando Docker (Recomendado)**

```bash
docker run --name mysql-dnd -e MYSQL_ROOT_PASSWORD= -e MYSQL_ALLOW_EMPTY_PASSWORD=yes -p 3306:3306 -d mysql:8.0
```

**Opção B: MySQL Local**

Se você já tem MySQL instalado localmente, certifique-se de que está rodando:

```bash
# macOS (via Homebrew)
brew services start mysql

# Linux
sudo systemctl start mysql

# Windows
# Inicie o serviço MySQL através do Gerenciador de Serviços
```

#### 2. Navegar até a Pasta do Projeto

```bash
cd "Projeto1 - Tallison F. Miranda"
```

#### 3. Configurar o Banco de Dados

Acesse o arquivo `setup.php` no navegador para criar automaticamente o banco de dados e as tabelas:

```bash
# Inicie o servidor PHP (em outro terminal)
php -S localhost:8000
```

Depois acesse: `http://localhost:8000/setup.php`

Este script irá:

- Conectar ao MySQL
- Criar o banco de dados `projeto_1_tallison_f_miranda_`
- Criar as tabelas `jogadores` e `personagens`
- Inserir dados iniciais de exemplo

#### 4. Iniciar o Servidor PHP

Se ainda não estiver rodando, inicie o servidor PHP embutido:

```bash
php -S localhost:8000
```

#### 5. Acessar o Sistema

**Site Principal:**

```
http://localhost:8000/
```

**Painel Administrativo:**

```
http://localhost:8000/admin/login.php
```

**🔐 Credenciais de Login para Teste:**

Para acessar o painel administrativo, utilize as seguintes credenciais:

| Campo       | Valor   |
| ----------- | ------- |
| **Usuário** | `admin` |
| **Senha**   | `123`   |

> ⚠️ **Importante:** Estas são credenciais de teste. Em produção, altere-as para credenciais seguras.

#### 6. Verificar Status do Sistema (Opcional)

Para verificar se tudo está funcionando corretamente, acesse:

```
http://localhost:8000/status.php
```

### Estrutura de Arquivos

```
Projeto1 - Tallison F. Miranda/
├── index.php              # Página principal
├── topo.php               # Cabeçalho
├── menu.php                # Menu de navegação
├── rodape.php              # Rodapé
├── conteudo.php            # Homepage
├── jogadores.php           # Lista de jogadores
├── personagens.php         # Lista de personagens
├── quemsomos.php           # Sobre nós
├── faleconosco.php         # Contato
├── setup.php               # Script de configuração do banco
├── status.php              # Verificação de status
└── admin/
    ├── admin.php           # Painel administrativo
    ├── login.php           # Página de login
    ├── config.inc.php      # Configuração do banco
    ├── principal.php       # Dashboard admin
    ├── jogador-*.php       # CRUD de jogadores
    └── personagem-*.php    # CRUD de personagens
```

### Solução de Problemas

**Erro de conexão com MySQL:**

- Verifique se o MySQL está rodando
- Se estiver usando Docker, verifique se o container está ativo: `docker ps`
- Certifique-se de que a porta 3306 está disponível

**Erro "headers already sent":**

- Verifique se não há espaços ou caracteres antes de `<?php` nos arquivos
- Certifique-se de que não há output antes de `header()` ou `session_start()`

**Página em branco:**

- Verifique os logs de erro do PHP
- Certifique-se de que todas as extensões necessárias estão instaladas (mysqli)
