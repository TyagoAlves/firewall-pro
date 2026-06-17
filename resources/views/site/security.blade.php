@extends('layouts.app')
@section('title', 'Segurança e LGPD — Alpine Firewall Pro')
@push('head')
<style>.gradient-text { background: linear-gradient(135deg, #06b6d4, #22d3ee); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }</style>
@endpush
@section('content')
<section class="pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-cyan-400 text-sm font-semibold uppercase tracking-wider">Segurança & LGPD</span>
            <h1 class="text-5xl font-bold mt-3">Segurança é <span class="gradient-text">prioridade</span></h1>
            <p class="text-gray-400 text-xl mt-4 max-w-2xl mx-auto">Projetado com conformidade LGPD desde o primeiro dia. Seus dados e os dados da sua rede estão protegidos.</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="bg-gray-900 border border-cyan-500/20 rounded-2xl p-8">
                <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center text-green-400 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-xl font-bold mb-4">LGPD Compliance</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Dados pessoais anonimizados em logs</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Retenção de dados configurável</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Direito de exclusão (Art. 18 LGPD)</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Registro de atividades de tratamento (Art. 37)</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Consentimento explícito para coleta</li>
                </ul>
            </div>
            <div class="bg-gray-900 border border-cyan-500/20 rounded-2xl p-8">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Segurança Técnica</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Criptografia TLS 1.3 em todas as conexões</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Autenticação multifator (MFA)</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Rate limiting na API pública</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Auditoria completa de ações</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Isolamento de rede por tenant</li>
                </ul>
            </div>
            <div class="bg-gray-900 border border-cyan-500/20 rounded-2xl p-8">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Política de Dados</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Apenas metadados de conexão são registrados</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Sem inspeção de conteúdo (apenas domínios)</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Dados armazenados localmente (on-premise)</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Sem compartilhamento com terceiros</li>
                </ul>
            </div>
            <div class="bg-gray-900 border border-cyan-500/20 rounded-2xl p-8">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Certificações</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Código aberto e auditável</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Pronto para auditoria LGPD</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> Relatório de Impacto (RIPD) disponível</li>
                    <li class="flex gap-3"><span class="text-cyan-400">&#10003;</span> DPO designado para clientes Enterprise</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
