<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Alpine Firewall Pro') — Firewall Inteligente para PMEs</title>
    <meta name="description" content="@yield('description', 'Firewall corporativo open source com painel web, gestão de regras e relatórios. Solução profissional para PMEs.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-gray-950 text-gray-100 font-sans antialiased">
    @if(isset($header))
        {{-- Admin layout --}}
        <nav class="bg-gray-900 border-b border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center gap-6">
                        <a href="/" class="flex items-center gap-2">
                            <span class="w-8 h-8 rounded-lg bg-cyan-500 flex items-center justify-center text-black font-bold text-sm">AF</span>
                            <span class="font-bold text-lg">Alpine<span class="text-cyan-400">Pro</span></span>
                        </a>
                        <div class="hidden md:flex items-center gap-4 text-sm">
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-cyan-400' : '' }}">Dashboard</a>
                            <a href="{{ route('admin.rules.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-lg {{ request()->routeIs('admin.rules.*') ? 'bg-gray-800 text-cyan-400' : '' }}">Regras</a>
                            <a href="{{ route('admin.logs') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-lg {{ request()->routeIs('admin.logs') ? 'bg-gray-800 text-cyan-400' : '' }}">Logs</a>
                            <a href="{{ route('admin.settings.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-lg {{ request()->routeIs('admin.settings.*') ? 'bg-gray-800 text-cyan-400' : '' }}">Config</a>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href="/" class="text-sm text-gray-400 hover:text-white">Site</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-gray-400 hover:text-white">Sair</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <div class="bg-gray-950 border-b border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                {{ $header }}
            </div>
        </div>
        <main>
            {{ $slot }}
        </main>
    @else
        {{-- Public site layout --}}
        <nav class="fixed top-0 left-0 right-0 z-50 bg-gray-950/80 backdrop-blur-xl border-b border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <a href="/" class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-cyan-500 flex items-center justify-center text-black font-bold text-sm">AF</span>
                        <span class="font-bold text-lg">Alpine<span class="text-cyan-400">Pro</span></span>
                    </a>
                    <div class="hidden md:flex items-center gap-6 text-sm">
                        <a href="/features" class="text-gray-400 hover:text-white transition">Recursos</a>
                        <a href="/documentation" class="text-gray-400 hover:text-white transition">Documentação</a>
                        <a href="/pricing" class="text-gray-400 hover:text-white transition">Preços</a>
                        <a href="/security" class="text-gray-400 hover:text-white transition">Segurança</a>
                        <a href="/contact" class="text-gray-400 hover:text-white transition">Contato</a>
                        @auth
                            <a href="/admin" class="bg-cyan-500 text-black px-4 py-2 rounded-lg font-semibold hover:bg-cyan-400 transition">Painel</a>
                        @else
                            <a href="/login" class="text-gray-400 hover:text-white transition">Entrar</a>
                            <a href="/login" class="bg-cyan-500 text-black px-4 py-2 rounded-lg font-semibold hover:bg-cyan-400 transition">Começar</a>
                        @endauth
                    </div>
                    <button id="mobile-menu-btn" class="md:hidden text-gray-400 hover:text-white" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
            <div id="mobile-menu" class="hidden md:hidden border-t border-gray-800 bg-gray-900">
                <div class="px-4 py-4 space-y-3">
                    <a href="/features" class="block text-gray-400 hover:text-white">Recursos</a>
                    <a href="/documentation" class="block text-gray-400 hover:text-white">Documentação</a>
                    <a href="/pricing" class="block text-gray-400 hover:text-white">Preços</a>
                    <a href="/security" class="block text-gray-400 hover:text-white">Segurança</a>
                    <a href="/contact" class="block text-gray-400 hover:text-white">Contato</a>
                    @auth
                        <a href="/admin" class="block text-cyan-400 font-semibold">Painel</a>
                    @else
                        <a href="/login" class="block text-gray-400 hover:text-white">Entrar</a>
                        <a href="/login" class="block bg-cyan-500 text-black px-4 py-2 rounded-lg font-semibold text-center">Começar</a>
                    @endauth
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="bg-gray-900 border-t border-gray-800 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-8">
                    <div>
                        <span class="font-bold text-lg">Alpine<span class="text-cyan-400">Pro</span></span>
                        <p class="text-gray-500 text-sm mt-2">Firewall inteligente para PMEs. Código aberto, seguro e acessível.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-3">Produto</h4>
                        <div class="space-y-2 text-sm text-gray-400">
                            <a href="/features" class="block hover:text-white">Recursos</a>
                            <a href="/pricing" class="block hover:text-white">Preços</a>
                            <a href="/documentation" class="block hover:text-white">Documentação</a>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-3">Empresa</h4>
                        <div class="space-y-2 text-sm text-gray-400">
                            <a href="/security" class="block hover:text-white">Segurança & LGPD</a>
                            <a href="/contact" class="block hover:text-white">Contato</a>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-3">Legal</h4>
                        <div class="space-y-2 text-sm text-gray-400">
                            <a href="#" class="block hover:text-white">Política de Privacidade</a>
                            <a href="#" class="block hover:text-white">Termos de Uso</a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-500">
                    &copy; {{ date('Y') }} Alpine Firewall Pro. Todos os direitos reservados. Feito com &hearts; no Brasil.
                </div>
            </div>
        </footer>
    @endif

    @stack('scripts')
</body>
</html>
