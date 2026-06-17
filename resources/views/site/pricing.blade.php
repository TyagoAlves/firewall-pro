@extends('layouts.app')
@section('title', 'Preços — Alpine Firewall Pro')
@push('head')
<style>.gradient-text { background: linear-gradient(135deg, #06b6d4, #22d3ee); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }</style>
@endpush
@section('content')
<section class="pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-cyan-400 text-sm font-semibold uppercase tracking-wider">Preços</span>
        <h1 class="text-5xl font-bold mt-3">Planos <span class="gradient-text">simples</span> e transparentes</h1>
        <p class="text-gray-400 text-xl mt-4 max-w-2xl mx-auto">Escolha o plano ideal para sua empresa. Sem taxas escondidas. Cancele quando quiser.</p>
        <div class="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto mt-16">
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 text-left">
                <h3 class="text-xl font-bold">Community</h3>
                <p class="text-gray-500 text-sm mt-1">Para projetos pessoais e laboratórios</p>
                <div class="text-4xl font-bold mt-6">Grátis</div>
                <ul class="mt-6 space-y-3 text-sm text-gray-400">
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Firewall Alpine Linux</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Regras iptables manuais</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Docker + KVM</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Documentação completa</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Comunidade</li>
                </ul>
                <a href="https://github.com/anomalyco/opencode" class="mt-8 block text-center border border-gray-700 hover:border-cyan-500/50 rounded-xl py-3 font-semibold transition">Acessar GitHub</a>
            </div>
            <div class="bg-gray-900 border-2 border-cyan-500 rounded-2xl p-8 text-left relative">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-cyan-500 text-black text-xs font-bold px-4 py-1 rounded-full">RECOMENDADO</div>
                <h3 class="text-xl font-bold">Pro</h3>
                <p class="text-gray-500 text-sm mt-1">Para PMEs que precisam de controle total</p>
                <div class="text-4xl font-bold mt-6">R$ 97 <span class="text-lg text-gray-500">/mês</span></div>
                <ul class="mt-6 space-y-3 text-sm text-gray-400">
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Tudo do Community</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Painel Web Interativo</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Gestão Visual de Regras</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Relatórios e Estatísticas</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> API REST Completa</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Suporte Prioritário</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Até 5 usuários</li>
                </ul>
                <a href="/login" class="mt-8 block bg-cyan-500 text-black text-center rounded-xl py-3 font-bold hover:bg-cyan-400 transition shadow-lg shadow-cyan-500/25">Começar Trial Grátis</a>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 text-left">
                <h3 class="text-xl font-bold">Enterprise</h3>
                <p class="text-gray-500 text-sm mt-1">Para empresas com necessidades específicas</p>
                <div class="text-4xl font-bold mt-6">Sob Medida</div>
                <ul class="mt-6 space-y-3 text-sm text-gray-400">
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Tudo do Pro</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Multi-tenant</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> SLA Personalizado</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Suporte 24/7</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> On-premise ou Cloud</li>
                    <li class="flex items-center gap-2"><span class="text-cyan-400">&#10003;</span> Usuários ilimitados</li>
                </ul>
                <a href="/contact" class="mt-8 block text-center border border-gray-700 hover:border-cyan-500/50 rounded-xl py-3 font-semibold transition">Falar com Vendas</a>
            </div>
        </div>
        <div class="mt-16 bg-gray-900 border border-gray-800 rounded-2xl p-8 max-w-3xl mx-auto text-left">
            <h3 class="text-xl font-bold mb-4">&#10068; Perguntas Frequentes</h3>
            <div class="space-y-4 text-sm">
                <div><strong class="text-gray-200">Posso cancelar quando quiser?</strong><p class="text-gray-500 mt-1">Sim. Sem multa, sem burocracia. Seu firewall continua funcionando até o fim do período contratado.</p></div>
                <div><strong class="text-gray-200">O plano Community é limitado?</strong><p class="text-gray-500 mt-1">Não. É 100% funcional, mas sem o painel web e suporte prioritário. Ideal para aprender e testar.</p></div>
                <div><strong class="text-gray-200">Vocês armazenam meus dados de tráfego?</strong><p class="text-gray-500 mt-1">Só o necessário para funcionamento. Compatível com LGPD. Você pode configurar a retenção.</p></div>
            </div>
        </div>
    </div>
</section>
@endsection
