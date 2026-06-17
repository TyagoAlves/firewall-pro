@extends('layouts.app')
@section('title', 'Recursos — Alpine Firewall Pro')
@push('head')
<style>.gradient-text { background: linear-gradient(135deg, #06b6d4, #22d3ee); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }</style>
@endpush
@section('content')
<section class="pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-cyan-400 text-sm font-semibold uppercase tracking-wider">Recursos</span>
            <h1 class="text-5xl font-bold mt-3">Tudo que o <span class="gradient-text">Alpine Pro</span> oferece</h1>
            <p class="text-gray-400 text-xl mt-4 max-w-2xl mx-auto">Uma plataforma completa para gestão de firewall, segurança de rede e controle de conteúdo.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Painel Interativo</h3>
                <p class="text-gray-400 text-sm">Dashboard completo com estatísticas em tempo real: pacotes bloqueados, regras ativas, tráfego por domínio e muito mais.</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Gestão de Regras</h3>
                <p class="text-gray-400 text-sm">CRUD completo de regras de firewall. Crie, edite, ative/desative e remova regras com uma interface visual. Preview do comando iptables.</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Relatórios</h3>
                <p class="text-gray-400 text-sm">Visualize logs de bloqueio, domínios mais acessados, tendências de tráfego e exporte relatórios para PDF/CSV.</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Docker + KVM</h3>
                <p class="text-gray-400 text-sm">Implantação flexível: Docker para testes rápidos, KVM para ambientes de produção. Escolha o que faz sentido para você.</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">API REST</h3>
                <p class="text-gray-400 text-sm">API completa para integração com outros sistemas. Automatize regras, consulte logs e gerencie o firewall programaticamente.</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">LGPD & Segurança</h3>
                <p class="text-gray-400 text-sm">LGPD Compliance desde o design. Dados criptografados, logs anonimizados, controle de acesso e trilha de auditoria.</p>
            </div>
        </div>
    </div>
</section>
@endsection
