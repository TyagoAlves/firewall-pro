@extends('layouts.app')
@section('title', 'Contato — Alpine Firewall Pro')
@push('head')
<style>.gradient-text { background: linear-gradient(135deg, #06b6d4, #22d3ee); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }</style>
@endpush
@section('content')
<section class="pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center mb-16">
            <span class="text-cyan-400 text-sm font-semibold uppercase tracking-wider">Contato</span>
            <h1 class="text-5xl font-bold mt-3">Vamos <span class="gradient-text">conversar</span></h1>
            <p class="text-gray-400 text-xl mt-4">Tire dúvidas, solicite um orçamento Enterprise ou dê sugestões. Respondemos em até 24h úteis.</p>
        </div>
        <div class="max-w-2xl mx-auto bg-gray-900 border border-gray-800 rounded-2xl p-8">
            <form class="space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Nome</label>
                        <input type="text" class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-3 text-gray-100 focus:outline-none focus:border-cyan-500 transition" placeholder="Seu nome">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Email</label>
                        <input type="email" class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-3 text-gray-100 focus:outline-none focus:border-cyan-500 transition" placeholder="seu@email.com">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Assunto</label>
                    <select class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-3 text-gray-100 focus:outline-none focus:border-cyan-500 transition">
                        <option>Dúvida sobre o produto</option>
                        <option>Orçamento Enterprise</option>
                        <option>Suporte</option>
                        <option>Parcerias</option>
                        <option>Outro</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Mensagem</label>
                    <textarea rows="5" class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-3 text-gray-100 focus:outline-none focus:border-cyan-500 transition" placeholder="Como podemos ajudar?"></textarea>
                </div>
                <button type="submit" class="w-full bg-cyan-500 hover:bg-cyan-400 text-black font-bold py-3 rounded-xl transition shadow-lg shadow-cyan-500/25">Enviar Mensagem</button>
            </form>
        </div>
        <div class="grid md:grid-cols-3 gap-6 max-w-3xl mx-auto mt-12 text-center">
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                <div class="text-cyan-400 text-2xl font-bold">Email</div>
                <p class="text-gray-500 text-sm mt-1">contato@firewallpro.com</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                <div class="text-cyan-400 text-2xl font-bold">Resposta</div>
                <p class="text-gray-500 text-sm mt-1">Em até 24h úteis</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                <div class="text-cyan-400 text-2xl font-bold">LGPD</div>
                <p class="text-gray-500 text-sm mt-1">dpo@firewallpro.com</p>
            </div>
        </div>
    </div>
</section>
@endsection
