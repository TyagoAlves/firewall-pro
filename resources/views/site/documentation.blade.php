@extends('layouts.app')
@section('title', 'Documentação — Alpine Firewall Pro')
@push('head')
<style>.gradient-text { background: linear-gradient(135deg, #06b6d4, #22d3ee); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.doc-section { scroll-margin-top: 6rem; }
.doc-sidebar a.active { color: #06b6d4; border-left-color: #06b6d4; }
</style>
@endpush
@section('content')
<section class="pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-cyan-400 text-sm font-semibold uppercase tracking-wider">Documentação</span>
            <h1 class="text-5xl font-bold mt-3">Documentação <span class="gradient-text">Completa</span></h1>
            <p class="text-gray-400 text-xl mt-4 max-w-2xl mx-auto">Tudo que você precisa saber para implantar, configurar e gerenciar o Alpine Firewall Pro.</p>
        </div>

        <div class="lg:grid lg:grid-cols-4 lg:gap-12">
            <!-- Sidebar -->
            <nav class="lg:col-span-1 mb-12 lg:mb-0">
                <div class="sticky top-24 space-y-1 text-sm border-l border-gray-800 pl-4">
                    <h4 class="font-semibold text-cyan-400 mb-4 text-base">Nesta página</h4>
                    <a href="#quickstart" class="block text-gray-400 hover:text-white py-1.5 border-l-2 border-transparent hover:border-cyan-500 pl-3 transition">Início Rápido</a>
                    <a href="#installation" class="block text-gray-400 hover:text-white py-1.5 border-l-2 border-transparent hover:border-cyan-500 pl-3 transition">Instalação</a>
                    <a href="#admin-panel" class="block text-gray-400 hover:text-white py-1.5 border-l-2 border-transparent hover:border-cyan-500 pl-3 transition">Painel Admin</a>
                    <a href="#rules" class="block text-gray-400 hover:text-white py-1.5 border-l-2 border-transparent hover:border-cyan-500 pl-3 transition">Regras de Firewall</a>
                    <a href="#api" class="block text-gray-400 hover:text-white py-1.5 border-l-2 border-transparent hover:border-cyan-500 pl-3 transition">API REST</a>
                    <a href="#deploy" class="block text-gray-400 hover:text-white py-1.5 border-l-2 border-transparent hover:border-cyan-500 pl-3 transition">Deploy em Produção</a>
                    <a href="#security" class="block text-gray-400 hover:text-white py-1.5 border-l-2 border-transparent hover:border-cyan-500 pl-3 transition">Segurança & LGPD</a>
                    <a href="#troubleshooting" class="block text-gray-400 hover:text-white py-1.5 border-l-2 border-transparent hover:border-cyan-500 pl-3 transition">Troubleshooting</a>
                    <a href="#faq" class="block text-gray-400 hover:text-white py-1.5 border-l-2 border-transparent hover:border-cyan-500 pl-3 transition">FAQ</a>
                </div>
            </nav>

            <!-- Content -->
            <div class="lg:col-span-3 prose prose-invert max-w-none">
                <!-- QUICKSTART -->
                <section id="quickstart" class="doc-section">
                    <h2 class="text-3xl font-bold gradient-text inline-block">Início Rápido</h2>
                    <p class="text-gray-400 mt-4">Em 3 passos você tem o Alpine Firewall Pro rodando com Docker:</p>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-6">
                        <div class="flex items-center gap-4 mb-4">
                            <span class="w-8 h-8 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center font-bold text-sm">1</span>
                            <div><strong class="text-gray-100">Clone e suba o ambiente</strong></div>
                        </div>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">docker compose up -d</code></pre>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-4">
                        <div class="flex items-center gap-4 mb-4">
                            <span class="w-8 h-8 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center font-bold text-sm">2</span>
                            <div><strong class="text-gray-100">Acesse o painel web</strong></div>
                        </div>
                        <p class="text-gray-400 text-sm mb-3">Abra o navegador em <code class="text-cyan-400">http://localhost:8000/admin</code></p>
                        <div class="bg-gray-950 rounded-lg p-4 text-sm">
                            <table class="w-full text-gray-300">
                                <tr><td class="py-1 text-gray-500">Email</td><td class="py-1 font-mono"><code>admin@firewallpro.com</code></td></tr>
                                <tr><td class="py-1 text-gray-500">Senha</td><td class="py-1 font-mono"><code>admin123</code></td></tr>
                            </table>
                        </div>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-4">
                        <div class="flex items-center gap-4 mb-4">
                            <span class="w-8 h-8 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center font-bold text-sm">3</span>
                            <div><strong class="text-gray-100">Crie sua primeira regra</strong></div>
                        </div>
                        <p class="text-gray-400 text-sm">No painel, vá em <strong class="text-gray-100">Regras</strong> &rarr; <strong class="text-gray-100">Nova Regra</strong>. Preencha nome, domínio e ação. Pronto.</p>
                    </div>
                </section>

                <hr class="border-gray-800 my-12">

                <!-- INSTALLATION -->
                <section id="installation" class="doc-section">
                    <h2 class="text-3xl font-bold gradient-text inline-block">Instalação</h2>
                    <p class="text-gray-400 mt-4">O Alpine Firewall Pro pode ser implantado de três formas diferentes, dependendo da sua necessidade.</p>

                    <h3 class="text-xl font-semibold mt-10 mb-4"> Opção 1: Docker (recomendado para testes e PMEs)</h3>
                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">git clone https://github.com/seu-repo/alpine-firewall-pro
cd alpine-firewall-pro
docker compose up -d</code></pre>
                        <div class="mt-4 space-y-2 text-sm text-gray-400">
                            <p><span class="text-cyan-400">&#10003;</span> Inicialização em 5 segundos</p>
                            <p><span class="text-cyan-400">&#10003;</span> Consumo de &lt; 50MB RAM</p>
                            <p><span class="text-cyan-400">&#10003;</span> Ideal para CI/CD e laboratórios</p>
                        </div>
                    </div>

                    <h3 class="text-xl font-semibold mt-10 mb-4"> Opção 2: KVM (simulação realista de produção)</h3>
                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                        <p class="text-sm text-gray-400 mb-3">Execute o script de setup dentro da VM Firewall:</p>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">bash kvm/setup-firewall.sh</code></pre>
                        <div class="mt-4 space-y-2 text-sm text-gray-400">
                            <p><span class="text-cyan-400">&#10003;</span> Múltiplas interfaces de rede (WAN + LAN)</p>
                            <p><span class="text-cyan-400">&#10003;</span> Roteamento e NAT reais</p>
                            <p><span class="text-cyan-400">&#10003;</span> DHCP e serviços completos</p>
                        </div>
                    </div>

                    <h3 class="text-xl font-semibold mt-10 mb-4"> Opção 3: Laravel (painel web standalone)</h3>
                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                        <p class="text-sm text-gray-400 mb-3">Para rodar apenas o painel web em um servidor:</p>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve</code></pre>
                        <div class="mt-4 space-y-2 text-sm text-gray-400">
                            <p><span class="text-cyan-400">&#10003;</span> Painel web completo</p>
                            <p><span class="text-cyan-400">&#10003;</span> API REST integrada</p>
                            <p><span class="text-cyan-400">&#10003;</span> Banco SQLite (sem dependências externas)</p>
                        </div>
                    </div>
                </section>

                <hr class="border-gray-800 my-12">

                <!-- ADMIN PANEL -->
                <section id="admin-panel" class="doc-section">
                    <h2 class="text-3xl font-bold gradient-text inline-block">Painel Admin</h2>
                    <p class="text-gray-400 mt-4">O painel web é o centro de controle do Alpine Firewall Pro. Acesse via <code class="text-cyan-400">/admin</code> após o login.</p>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-6">
                        <h4 class="text-lg font-semibold text-gray-100 mb-3"> Dashboard</h4>
                        <div class="space-y-3 text-sm text-gray-400">
                            <p><strong class="text-gray-200">Regras de Firewall:</strong> Total de regras cadastradas e quantas estão ativas.</p>
                            <p><strong class="text-gray-200">Bloqueios Registrados:</strong> Total de eventos de bloqueio logados no sistema.</p>
                            <p><strong class="text-gray-200">Status do Firewall:</strong> Indica se o serviço de firewall está online.</p>
                            <p><strong class="text-gray-200">Regras Recentes:</strong> Tabela com as últimas regras criadas, ação e status.</p>
                            <p><strong class="text-gray-200">Últimos Bloqueios:</strong> Logs mais recentes de pacotes bloqueados.</p>
                            <p><strong class="text-gray-200">Ações Rápidas:</strong> Atalhos para criar regra, gerenciar, ver logs e gerar iptables.</p>
                        </div>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-6">
                        <h4 class="text-lg font-semibold text-gray-100 mb-3"> Gerenciamento de Regras</h4>
                        <div class="space-y-3 text-sm text-gray-400">
                            <p><strong class="text-gray-200">Listagem:</strong> Tabela com todas as regras, domínios, chains, ações, status e comandos iptables.</p>
                            <p><strong class="text-gray-200">Criar:</strong> Formulário com preview ao vivo do comando iptables que será gerado.</p>
                            <p><strong class="text-gray-200">Editar:</strong> Altere nome, domínio, chain, ação e ative/desative a regra.</p>
                            <p><strong class="text-gray-200">Ativar/Desativar:</strong> Botão toggle para ligar/desligar regras sem deletá-las.</p>
                            <p><strong class="text-gray-200">Copiar comando:</strong> Copie o comando iptables equivalente para usar no terminal.</p>
                            <p><strong class="text-gray-200">Gerar iptables:</strong> Gere todos os comandos iptables das regras ativas de uma vez.</p>
                        </div>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-6">
                        <h4 class="text-lg font-semibold text-gray-100 mb-3"> Logs de Bloqueio</h4>
                        <div class="space-y-3 text-sm text-gray-400">
                            <p><strong class="text-gray-200">Resumo do dia:</strong> Cards com total de bloqueios e permissões hoje.</p>
                            <p><strong class="text-gray-200">Tabela detalhada:</strong> Destino, ação, regra associada, IP de origem, protocolo e data.</p>
                            <p><strong class="text-gray-200">Paginação:</strong> Navegação entre páginas de logs (30 por página).</p>
                        </div>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-6">
                        <h4 class="text-lg font-semibold text-gray-100 mb-3"> Configurações</h4>
                        <div class="space-y-3 text-sm text-gray-400">
                            <p><strong class="text-gray-200">Nome da Aplicação:</strong> Personalize o nome exibido no sistema.</p>
                            <p><strong class="text-gray-200">Contato LGPD:</strong> Email do Encarregado (DPO) para exercício de direitos.</p>
                            <p><strong class="text-gray-200">Retenção de Logs:</strong> Dias que os logs são mantidos antes de expirar.</p>
                            <p><strong class="text-gray-200">Modo de Inspeção:</strong> String (padrão), DNS ou Híbrido.</p>
                        </div>
                    </div>
                </section>

                <hr class="border-gray-800 my-12">

                <!-- RULES -->
                <section id="rules" class="doc-section">
                    <h2 class="text-3xl font-bold gradient-text inline-block">Regras de Firewall</h2>
                    <p class="text-gray-400 mt-4">O núcleo do Alpine Firewall Pro é o módulo <code class="text-cyan-400">xt_string</code> do iptables, que inspeciona o payload dos pacotes em busca de strings específicas.</p>

                    <div class="bg-gray-900 border border-cyan-500/20 rounded-xl p-6 mt-6">
                        <h4 class="text-lg font-semibold text-cyan-400 mb-2"> Como funciona</h4>
                        <p class="text-sm text-gray-400">Cada pacote que passa pelo firewall tem seu payload inspecionado em tempo real. Se uma string correspondente a um domínio bloqueado for encontrada, o pacote é descartado (DROP) antes de sair da interface de rede.</p>
                    </div>

                    <h3 class="text-xl font-semibold mt-10 mb-4">Comandos iptables</h3>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                        <h4 class="text-sm font-semibold text-gray-300 mb-3">Adicionar regra de bloqueio</h4>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">iptables -A FORWARD -m string --string "youtube.com" --algo bm -j DROP</code></pre>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-4">
                        <h4 class="text-sm font-semibold text-gray-300 mb-3">Remover regra de bloqueio</h4>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">iptables -D FORWARD -m string --string "youtube.com" --algo bm -j DROP</code></pre>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-4">
                        <h4 class="text-sm font-semibold text-gray-300 mb-3">Listar regras ativas</h4>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">iptables -L FORWARD -v -n   # Tráfego roteado entre redes
iptables -L OUTPUT -v -n    # Tráfego originado do firewall</code></pre>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-4">
                        <h4 class="text-sm font-semibold text-gray-300 mb-3">Limpar todas as regras</h4>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">iptables -F FORWARD   # Libera todo o tráfego roteado
iptables -F OUTPUT     # Libera todo o tráfego local</code></pre>
                    </div>

                    <h3 class="text-xl font-semibold mt-10 mb-4">Tabela de Exemplos</h3>
                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                        <table class="w-full text-sm text-gray-300">
                            <thead>
                                <tr class="border-b border-gray-700 text-left">
                                    <th class="pb-3 text-gray-500 font-medium">Cenário</th>
                                    <th class="pb-3 text-gray-500 font-medium">Comando</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-800"><td class="py-3">Bloquear YouTube</td><td class="py-3 font-mono text-xs">iptables -A FORWARD -m string --string "youtube.com" --algo bm -j DROP</td></tr>
                                <tr class="border-b border-gray-800"><td class="py-3">Bloquear TikTok</td><td class="py-3 font-mono text-xs">iptables -A FORWARD -m string --string "tiktok.com" --algo bm -j DROP</td></tr>
                                <tr class="border-b border-gray-800"><td class="py-3">Bloquear Instagram</td><td class="py-3 font-mono text-xs">iptables -A FORWARD -m string --string "instagram.com" --algo bm -j DROP</td></tr>
                                <tr class="border-b border-gray-800"><td class="py-3">Bloquear Facebook</td><td class="py-3 font-mono text-xs">iptables -A FORWARD -m string --string "facebook.com" --algo bm -j DROP</td></tr>
                                <tr class="border-b border-gray-800"><td class="py-3">Bloquear Netflix</td><td class="py-3 font-mono text-xs">iptables -A FORWARD -m string --string "netflix.com" --algo bm -j DROP</td></tr>
                                <tr><td class="py-3">Bloquear Twitter/X</td><td class="py-3 font-mono text-xs">iptables -A FORWARD -m string --string "twitter.com" --algo bm -j DROP</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="bg-yellow-500/10 border border-yellow-500/20 rounded-xl p-4 mt-6">
                        <p class="text-sm text-yellow-400">
                            <strong>Dica:</strong> Para bloquear subdomínios (ex: <code>music.youtube.com</code>, <code>accounts.youtube.com</code>), use apenas o domínio raiz <code>youtube.com</code> &mdash; a inspeção de string captura qualquer subdomínio automaticamente.
                        </p>
                    </div>
                </section>

                <hr class="border-gray-800 my-12">

                <!-- API -->
                <section id="api" class="doc-section">
                    <h2 class="text-3xl font-bold gradient-text inline-block">API REST</h2>
                    <p class="text-gray-400 mt-4">O Alpine Firewall Pro expõe uma API RESTful para integração com outros sistemas, automação de regras e consulta de logs.</p>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-6">
                        <h4 class="text-lg font-semibold text-gray-100 mb-3"> Autenticação</h4>
                        <p class="text-sm text-gray-400">Todas as requisições à API exigem um Bearer Token. Para obter seu token, faça login no painel e acesse <strong class="text-gray-200">Configurações &rarr; API Token</strong>.</p>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm mt-3 overflow-x-auto"><code class="text-gray-300">Authorization: Bearer seu-token-aqui</code></pre>
                    </div>

                    <h3 class="text-xl font-semibold mt-10 mb-4">Endpoints</h3>
                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                        <table class="w-full text-sm text-gray-300">
                            <thead>
                                <tr class="border-b border-gray-700 text-left">
                                    <th class="pb-3 text-gray-500 font-medium">Método</th>
                                    <th class="pb-3 text-gray-500 font-medium">Endpoint</th>
                                    <th class="pb-3 text-gray-500 font-medium">Descrição</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-800">
                                    <td class="py-3"><span class="bg-green-500/20 text-green-400 px-2 py-0.5 rounded text-xs font-bold">GET</span></td>
                                    <td class="py-3 font-mono text-xs">/api/rules</td>
                                    <td class="py-3 text-gray-500">Listar todas as regras</td>
                                </tr>
                                <tr class="border-b border-gray-800">
                                    <td class="py-3"><span class="bg-blue-500/20 text-blue-400 px-2 py-0.5 rounded text-xs font-bold">POST</span></td>
                                    <td class="py-3 font-mono text-xs">/api/rules</td>
                                    <td class="py-3 text-gray-500">Criar nova regra</td>
                                </tr>
                                <tr class="border-b border-gray-800">
                                    <td class="py-3"><span class="bg-green-500/20 text-green-400 px-2 py-0.5 rounded text-xs font-bold">GET</span></td>
                                    <td class="py-3 font-mono text-xs">/api/rules/{id}</td>
                                    <td class="py-3 text-gray-500">Detalhes de uma regra</td>
                                </tr>
                                <tr class="border-b border-gray-800">
                                    <td class="py-3"><span class="bg-yellow-500/20 text-yellow-400 px-2 py-0.5 rounded text-xs font-bold">PUT</span></td>
                                    <td class="py-3 font-mono text-xs">/api/rules/{id}</td>
                                    <td class="py-3 text-gray-500">Atualizar regra</td>
                                </tr>
                                <tr class="border-b border-gray-800">
                                    <td class="py-3"><span class="bg-red-500/20 text-red-400 px-2 py-0.5 rounded text-xs font-bold">DELETE</span></td>
                                    <td class="py-3 font-mono text-xs">/api/rules/{id}</td>
                                    <td class="py-3 text-gray-500">Remover regra</td>
                                </tr>
                                <tr class="border-b border-gray-800">
                                    <td class="py-3"><span class="bg-green-500/20 text-green-400 px-2 py-0.5 rounded text-xs font-bold">GET</span></td>
                                    <td class="py-3 font-mono text-xs">/api/logs</td>
                                    <td class="py-3 text-gray-500">Listar logs de bloqueio</td>
                                </tr>
                                <tr class="border-b border-gray-800">
                                    <td class="py-3"><span class="bg-green-500/20 text-green-400 px-2 py-0.5 rounded text-xs font-bold">GET</span></td>
                                    <td class="py-3 font-mono text-xs">/api/stats</td>
                                    <td class="py-3 text-gray-500">Estatísticas do firewall</td>
                                </tr>
                                <tr>
                                    <td class="py-3"><span class="bg-green-500/20 text-green-400 px-2 py-0.5 rounded text-xs font-bold">GET</span></td>
                                    <td class="py-3 font-mono text-xs">/api/iptables</td>
                                    <td class="py-3 text-gray-500">Gerar comandos iptables</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="text-xl font-semibold mt-10 mb-4">Exemplos de uso</h3>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                        <h4 class="text-sm font-semibold text-gray-300 mb-3">Criar regra via API</h4>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">curl -X POST https://seu-servidor.com/api/rules \
  -H "Authorization: Bearer seu-token" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Bloquear YouTube",
    "domain": "youtube.com",
    "chain": "FORWARD",
    "action": "DROP"
  }'</code></pre>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-4">
                        <h4 class="text-sm font-semibold text-gray-300 mb-3">Listar logs de bloqueio</h4>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">curl -H "Authorization: Bearer seu-token" \
  https://seu-servidor.com/api/logs?per_page=10</code></pre>
                    </div>
                </section>

                <hr class="border-gray-800 my-12">

                <!-- DEPLOY -->
                <section id="deploy" class="doc-section">
                    <h2 class="text-3xl font-bold gradient-text inline-block">Deploy em Produção</h2>
                    <p class="text-gray-400 mt-4">Guia passo a passo para colocar o Alpine Firewall Pro em produção com segurança.</p>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-6">
                        <h4 class="text-lg font-semibold text-gray-100 mb-3"> 1. Servidor Linux (Ubuntu 22.04+/Debian 12+)</h4>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300"># Instalar dependências
sudo apt update
sudo apt install -y nginx php8.3-fpm php8.3-mbstring php8.3-xml \
  php8.3-curl php8.3-sqlite3 php8.3-gd php8.3-zip unzip composer

# Clonar o projeto
cd /var/www
git clone https://github.com/seu-repo/alpine-firewall-pro.git
cd alpine-firewall-pro

# Configurar
cp .env.example .env
php artisan key:generate
# Edite .env: APP_URL, DB_*, etc

# Instalar dependências e rodar migrations
composer install --no-dev
php artisan migrate --seed
php artisan config:cache
php artisan route:cache
php artisan view:cache</code></pre>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-4">
                        <h4 class="text-lg font-semibold text-gray-100 mb-3"> 2. Configurar Nginx</h4>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">server {
    listen 80;
    server_name firewallpro.meusite.com;
    root /var/www/alpine-firewall-pro/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    add_header X-XSS-Protection "1; mode=block";
    add_header Strict-Transport-Security "max-age=31536000; includeSubDomains";

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known) {
        deny all;
    }
}</code></pre>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-4">
                        <h4 class="text-lg font-semibold text-gray-100 mb-3"> 3. SSL com Let's Encrypt</h4>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">sudo apt install -y certbot python3-certbot-nginx
sudo certbot --nginx -d firewallpro.meusite.com</code></pre>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-4">
                        <h4 class="text-lg font-semibold text-gray-100 mb-3"> 4. Configurar Firewall do Servidor</h4>
                        <pre class="bg-gray-950 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">sudo ufw allow 22/tcp      # SSH
sudo ufw allow 80/tcp      # HTTP
sudo ufw allow 443/tcp     # HTTPS
sudo ufw --force enable</code></pre>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-4">
                        <h4 class="text-lg font-semibold text-gray-100 mb-3"> 5. Backup e Manutenção</h4>
                        <div class="space-y-3 text-sm text-gray-400">
                            <p><strong class="text-gray-200">Backup do banco:</strong> Copie o arquivo <code>database/database.sqlite</code> regularmente.</p>
                            <p><strong class="text-gray-200">Logs do Laravel:</strong> Verifique <code>storage/logs/laravel.log</code> para erros.</p>
                            <p><strong class="text-gray-200">Atualização:</strong> <code>git pull && composer install --no-dev && php artisan migrate</code></p>
                        </div>
                    </div>
                </section>

                <hr class="border-gray-800 my-12">

                <!-- SECURITY -->
                <section id="security" class="doc-section">
                    <h2 class="text-3xl font-bold gradient-text inline-block">Segurança & LGPD</h2>
                    <p class="text-gray-400 mt-4">O Alpine Firewall Pro foi projetado com conformidade LGPD (Lei Geral de Proteção de Dados) desde a concepção.</p>

                    <div class="grid md:grid-cols-2 gap-4 mt-6">
                        <div class="bg-gray-900 border border-green-500/20 rounded-xl p-6">
                            <h4 class="text-lg font-semibold text-green-400 mb-3">&#10003; Conformidade LGPD</h4>
                            <ul class="space-y-2 text-sm text-gray-400">
                                <li>Dados de tráfego anonimizados por padrão</li>
                                <li>Logs com retenção configurável (padrão 90 dias)</li>
                                <li>Controle de acesso baseado em papéis (RBAC)</li>
                                <li>Criptografia TLS 1.3 em todas as conexões</li>
                                <li>Direito à exclusão de dados pessoais (Art. 18)</li>
                                <li>Registro de atividades de tratamento (Art. 37)</li>
                                <li>Relatório de Impacto (RIPD) disponível</li>
                                <li>DPO designado para clientes Enterprise</li>
                            </ul>
                        </div>
                        <div class="bg-gray-900 border border-cyan-500/20 rounded-xl p-6">
                            <h4 class="text-lg font-semibold text-cyan-400 mb-3">&#10003; Práticas de Segurança</h4>
                            <ul class="space-y-2 text-sm text-gray-400">
                                <li>Autenticação multifator (MFA)</li>
                                <li>Rate limiting na API (100 req/min)</li>
                                <li>Auditoria de todas as ações administrativas</li>
                                <li>Criptografia em repouso (SQLite criptografado)</li>
                                <li>Firewall em camadas (iptables + nftables)</li>
                                <li>Isolamento de rede por tenant (Enterprise)</li>
                                <li>Headers de segurança (HSTS, X-Frame-Options, etc.)</li>
                                <li>Atualizações automáticas de segurança</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mt-6">
                        <h4 class="text-lg font-semibold text-gray-100 mb-3"> Política de Dados</h4>
                        <div class="space-y-2 text-sm text-gray-400">
                            <p><span class="text-cyan-400">&#8226;</span> <strong>O que é registrado:</strong> Apenas metadados de conexão (domínio destino, IP de origem, ação tomada).</p>
                            <p><span class="text-cyan-400">&#8226;</span> <strong>O que NÃO é registrado:</strong> Conteúdo de pacotes, dados pessoais, senhas, mensagens, vídeos ou áudio.</p>
                            <p><span class="text-cyan-400">&#8226;</span> <strong>Onde os dados ficam:</strong> Armazenados localmente no servidor (on-premise). Sem compartilhamento com terceiros.</p>
                            <p><span class="text-cyan-400">&#8226;</span> <strong>Quanto tempo:</strong> Configurável pelo administrador (default 90 dias). Exclusão automática após o período.</p>
                        </div>
                    </div>
                </section>

                <hr class="border-gray-800 my-12">

                <!-- TROUBLESHOOTING -->
                <section id="troubleshooting" class="doc-section">
                    <h2 class="text-3xl font-bold gradient-text inline-block">Troubleshooting</h2>
                    <p class="text-gray-400 mt-4">Problemas comuns e suas soluções.</p>

                    <div class="space-y-4 mt-6">
                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                            <h4 class="text-lg font-semibold text-gray-100 mb-2"> O painel web não carrega</h4>
                            <div class="space-y-2 text-sm text-gray-400">
                                <p><strong>Causa:</strong> Servidor do Laravel não está rodando ou porta ocupada.</p>
                                <p><strong>Solução:</strong></p>
                                <pre class="bg-gray-950 rounded-lg p-3 text-xs mt-2"><code class="text-gray-300"># Verifique se o servidor está rodando
ps aux | grep artisan

# Verifique a porta
ss -tlnp | grep 8000

# Reinicie o servidor
php artisan serve --host=0.0.0.0 --port=8000</code></pre>
                            </div>
                        </div>

                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                            <h4 class="text-lg font-semibold text-gray-100 mb-2"> As regras não estão bloqueando</h4>
                            <div class="space-y-2 text-sm text-gray-400">
                                <p><strong>Causa:</strong> Regras iptables não foram aplicadas no firewall ou chain incorreta.</p>
                                <p><strong>Solução:</strong></p>
                                <pre class="bg-gray-950 rounded-lg p-3 text-xs mt-2"><code class="text-gray-300"># Verifique as regras ativas
iptables -L FORWARD -v -n
iptables -L OUTPUT -v -n

# Aplique as regras manualmente se necessário
iptables -A FORWARD -m string --string "youtube.com" --algo bm -j DROP</code></pre>
                            </div>
                        </div>

                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                            <h4 class="text-lg font-semibold text-gray-100 mb-2"> Erro "SQLSTATE[HY000] - No such table"</h4>
                            <div class="space-y-2 text-sm text-gray-400">
                                <p><strong>Causa:</strong> Migrations não foram executadas.</p>
                                <p><strong>Solução:</strong></p>
                                <pre class="bg-gray-950 rounded-lg p-3 text-xs mt-2"><code class="text-gray-300">php artisan migrate --seed</code></pre>
                            </div>
                        </div>

                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                            <h4 class="text-lg font-semibold text-gray-100 mb-2"> Erro 403 na API</h4>
                            <div class="space-y-2 text-sm text-gray-400">
                                <p><strong>Causa:</strong> Token de autenticação inválido ou ausente.</p>
                                <p><strong>Solução:</strong> Verifique se o header <code class="text-cyan-400">Authorization: Bearer seu-token</code> está presente e correto.</p>
                            </div>
                        </div>

                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                            <h4 class="text-lg font-semibold text-gray-100 mb-2"> O Docker não sobe</h4>
                            <div class="space-y-2 text-sm text-gray-400">
                                <p><strong>Causa:</strong> Docker não instalado ou porta 5901 ocupada.</p>
                                <p><strong>Solução:</strong></p>
                                <pre class="bg-gray-950 rounded-lg p-3 text-xs mt-2"><code class="text-gray-300"># Verifique se o Docker está rodando
systemctl status docker

# Verifique portas
lsof -i :5901

# Reinstale os containers
docker compose down && docker compose up -d</code></pre>
                            </div>
                        </div>
                    </div>
                </section>

                <hr class="border-gray-800 my-12">

                <!-- FAQ -->
                <section id="faq" class="doc-section">
                    <h2 class="text-3xl font-bold gradient-text inline-block">Perguntas Frequentes</h2>
                    <p class="text-gray-400 mt-4">As dúvidas mais comuns sobre o Alpine Firewall Pro.</p>

                    <div class="space-y-4 mt-6">
                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                            <h4 class="font-semibold text-gray-100">Posso usar o Alpine Firewall Pro na minha empresa?</h4>
                            <p class="text-sm text-gray-400 mt-2">Sim. O Alpine Firewall Pro foi desenvolvido para PMEs. A versão Community é gratuita e a Pro oferece painel web, API, relatórios e suporte prioritário.</p>
                        </div>

                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                            <h4 class="font-semibold text-gray-100">Preciso de hardware específico?</h4>
                            <p class="text-sm text-gray-400 mt-2">Não. O Alpine Linux roda em qualquer hardware. O consumo médio é de 20-50 MB de RAM. Você pode usar um Raspberry Pi, um servidor antigo ou uma VM na nuvem.</p>
                        </div>

                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                            <h4 class="font-semibold text-gray-100">Quais domínios posso bloquear?</h4>
                            <p class="text-sm text-gray-400 mt-2">Qualquer domínio. YouTube, TikTok, Instagram, Netflix, Facebook, Twitter, sites adulto, sites de jogos &mdash; basta adicionar o domínio na regra. A inspeção de string captura qualquer subdomínio automaticamente.</p>
                        </div>

                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                            <h4 class="font-semibold text-gray-100">O firewall inspeciona o conteúdo dos pacotes?</h4>
                            <p class="text-sm text-gray-400 mt-2">Apenas o suficiente para identificar o domínio no payload. Não há inspeção profunda de pacotes (DPI), não há registro de conteúdo, e não há armazenamento de dados pessoais. Compatível com a LGPD.</p>
                        </div>

                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                            <h4 class="font-semibold text-gray-100">Posso cancelar o plano Pro quando quiser?</h4>
                            <p class="text-sm text-gray-400 mt-2">Sim. Sem multa, sem burocracia. Seu firewall continua funcionando até o fim do período contratado. Você pode fazer downgrade para Community ou exportar seus dados.</p>
                        </div>

                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                            <h4 class="font-semibold text-gray-100">O Alpine Firewall Pro funciona com IPv6?</h4>
                            <p class="text-sm text-gray-400 mt-2">Sim. O iptables moderno (nftables) suporta IPv6 nativamente. Configure regras para <code>ip6tables</code> seguindo a mesma sintaxe.</p>
                        </div>

                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                            <h4 class="font-semibold text-gray-100">Como entrar em contato com o suporte?</h4>
                            <p class="text-sm text-gray-400 mt-2">Clientes Pro têm suporte prioritário via email <code class="text-cyan-400">suporte@firewallpro.com</code>. Clientes Enterprise têm suporte 24/7 com SLA personalizado. Dúvidas sobre LGPD: <code class="text-cyan-400">dpo@firewallpro.com</code>.</p>
                        </div>

                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                            <h4 class="font-semibold text-gray-100">O código é aberto? Posso auditar?</h4>
                            <p class="text-sm text-gray-400 mt-2">Sim. A versão Community é 100% open source. A versão Pro também é auditável mediante contrato de confidencialidade. Transparência é um dos pilares do projeto.</p>
                        </div>
                    </div>
                </section>

                <!-- Bottom CTA -->
                <div class="mt-16 text-center bg-cyan-500/5 border border-cyan-500/20 rounded-2xl p-10">
                    <h3 class="text-2xl font-bold mb-3">Precisando de ajuda?</h3>
                    <p class="text-gray-400 mb-6">Nossa equipe está pronta para ajudar com deploy, configuração ou personalização.</p>
                    <a href="/contact" class="inline-block bg-cyan-500 hover:bg-cyan-400 text-black font-bold px-8 py-3 rounded-xl transition shadow-lg shadow-cyan-500/25">Falar com Suporte</a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
