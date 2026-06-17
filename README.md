<p align="center">
    <img src="https://img.shields.io/badge/Laravel-11-FF2D20?logo=laravel" alt="Laravel 11">
    <img src="https://img.shields.io/badge/Tailwind_CSS-4-06B6D4?logo=tailwindcss" alt="Tailwind CSS">
    <img src="https://img.shields.io/badge/SQLite-003B57?logo=sqlite" alt="SQLite">
    <img src="https://img.shields.io/badge/license-MIT-green" alt="MIT License">
</p>

<h1 align="center">🔥 Alpine Firewall Pro</h1>
<p align="center">
    <strong>Painel web interativo para gerenciamento de firewall com iptables</strong>
    <br>
    Interface administrativa completa, API REST, relatórios e suporte multi-tenant.
</p>

<hr>

## 📋 Sobre

O **Alpine Firewall Pro** é a versão completa do [Alpine Firewall](https://github.com/anomalyco/alpine-firewall), um sistema de bloqueio de conteúdo baseado em Docker + KVM, com foco em:

- **PMEs e projetos pessoais** — controle de acesso à internet simples e eficaz
- **LGPD e segurança** — logs de auditoria, criptografia em trânsito, relatórios de compliance
- **Gestão visual** — cadastro e ativação de regras sem editar scripts manualmente
- **API REST** — integração com outros sistemas e automação

## ✨ Funcionalidades

| Funcionalidade | Descrição |
|---|---|
| **Painel Admin** | Dashboard com estatísticas, regras ativas, logs recentes |
| **Regras de Firewall** | CRUD completo com toggle ativar/desativar, preview de iptables |
| **Logs de Bloqueio** | Histórico com data, IP, domínio, chain e ação |
| **API REST** | Endpoints para gerenciar regras, consultar logs e estatísticas |
| **Configurações** | Timezone, limits de log, templates de iptables |
| **Multi-tenant** | Usuários independentes com suas próprias regras e logs |
| **Suporte Premium** | E-mail e chat prioritário (assinatura Pro) |

## 🚀 Início Rápido

```bash
# Clone
git clone https://github.com/seu-user/alpine-firewall-pro.git
cd alpine-firewall-pro

# Configure o ambiente
cp .env.example .env
php artisan key:generate

# Instale dependências
composer install
npm ci && npm run build

# Banco de dados e seed
php artisan migrate --seed

# Inicie o servidor
php artisan serve --host=0.0.0.0 --port=8000
```

Acesse **http://localhost:8000** — login: `admin@firewallpro.com` / `admin123`

### Docker

```bash
docker compose up -d
```

## 🐳 Deploy em Produção

```bash
# Servidor Ubuntu/Debian
sudo apt install -y nginx php8.3-fpm php8.3-mbstring php8.3-xml \
  php8.3-curl php8.3-sqlite3 php8.3-gd php8.3-zip unzip composer

# Clone e configure
cd /var/www
git clone https://github.com/seu-user/alpine-firewall-pro.git
cd alpine-firewall-pro
cp .env.example .env
php artisan key:generate
composer install --no-dev
php artisan migrate --seed
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Configure o Nginx com SSL (veja a [documentação completa](/documentation)).

## 📚 Documentação

Documentação completa disponível em **http://localhost:8000/documentation**:
- Início rápido e instalação
- Painel administrativo
- Gerenciamento de regras
- API REST (endpoints, exemplos, autenticação)
- Deploy em produção com Nginx + SSL
- Segurança e conformidade LGPD
- Troubleshooting e FAQ

## 🧪 Testes

```bash
php artisan test
```

## 🛣️ Roadmap

- [x] Painel admin com CRUD de regras
- [x] Logs de bloqueio
- [x] API REST básica
- [x] Documentação completa
- [ ] Autenticação via API (Sanctum)
- [ ] Multi-tenant avançado
- [ ] Relatórios exportáveis (PDF/CSV)
- [ ] Notificações em tempo real
- [ ] Integração com Docker compose

## 📄 Licença

Este projeto é licenciado sob a [MIT License](LICENSE).

## 🤝 Suporte

Para suporte comercial (Pro): **contato@firewallpro.com**
