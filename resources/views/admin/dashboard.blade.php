<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-400 px-4 py-3 rounded-xl">{{ session('success') }}</div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 hover:border-cyan-500/30 transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400">Regras de Firewall</p>
                            <p class="text-3xl font-bold text-gray-100 mt-1">{{ $totalRules }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $activeRules }} ativas</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 text-2xl">&#128274;</div>
                    </div>
                </div>
                <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 hover:border-cyan-500/30 transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400">Bloqueios Registrados</p>
                            <p class="text-3xl font-bold text-gray-100 mt-1">{{ $totalLogs }}</p>
                            <p class="text-xs text-gray-500 mt-1">Total no sistema</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-red-500/10 flex items-center justify-center text-red-400 text-2xl">&#128200;</div>
                    </div>
                </div>
                <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 hover:border-cyan-500/30 transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400">Status do Firewall</p>
                            <p class="text-3xl font-bold text-green-400 mt-1">Online</p>
                            <p class="text-xs text-gray-500 mt-1">Sistema operacional</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center text-green-400 text-2xl">&#10003;</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
                    <div class="p-6 border-b border-gray-800">
                        <h3 class="text-lg font-semibold text-gray-100">Regras Recentes</h3>
                    </div>
                    <div class="p-6">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="text-left text-gray-500 border-b border-gray-800">
                                    <th class="pb-3">Domínio</th>
                                    <th class="pb-3">Ação</th>
                                    <th class="pb-3">Status</th>
                                    <th class="pb-3">Criada em</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentRules as $rule)
                                <tr class="border-b border-gray-800/50">
                                    <td class="py-3 text-gray-200">{{ $rule->domain }}</td>
                                    <td class="py-3">
                                        <span class="px-2 py-0.5 rounded text-xs font-medium {{ $rule->action === 'DROP' ? 'bg-red-500/20 text-red-400' : 'bg-green-500/20 text-green-400' }}">{{ $rule->action }}</span>
                                    </td>
                                    <td class="py-3">
                                        <span class="px-2 py-0.5 rounded text-xs font-medium {{ $rule->enabled ? 'bg-green-500/20 text-green-400' : 'bg-gray-700 text-gray-400' }}">{{ $rule->enabled ? 'Ativa' : 'Inativa' }}</span>
                                    </td>
                                    <td class="py-3 text-gray-500 text-xs">{{ $rule->created_at->diffForHumans() }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="py-8 text-center text-gray-500">Nenhuma regra criada.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
                    <div class="p-6 border-b border-gray-800">
                        <h3 class="text-lg font-semibold text-gray-100">Últimos Bloqueios</h3>
                    </div>
                    <div class="p-6">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="text-left text-gray-500 border-b border-gray-800">
                                    <th class="pb-3">Destino</th>
                                    <th class="pb-3">Ação</th>
                                    <th class="pb-3">Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentLogs as $log)
                                <tr class="border-b border-gray-800/50">
                                    <td class="py-3 text-gray-200 font-mono text-xs">{{ $log->destination }}</td>
                                    <td class="py-3">
                                        <span class="px-2 py-0.5 rounded text-xs font-medium {{ $log->action === 'blocked' ? 'bg-red-500/20 text-red-400' : 'bg-green-500/20 text-green-400' }}">{{ $log->action }}</span>
                                    </td>
                                    <td class="py-3 text-gray-500 text-xs">{{ $log->created_at->diffForHumans() }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="py-8 text-center text-gray-500">Nenhum log registrado.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-gray-900 border border-gray-800 rounded-2xl p-6">
                <h3 class="text-lg font-semibold text-gray-100 mb-6">Ações Rápidas</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="{{ route('admin.rules.create') }}" class="text-center p-5 bg-cyan-500/10 border border-cyan-500/20 rounded-xl hover:bg-cyan-500/20 transition group">
                        <div class="text-cyan-400 text-2xl mb-1 group-hover:scale-110 transition">+</div>
                        <div class="text-sm text-gray-300">Nova Regra</div>
                    </a>
                    <a href="{{ route('admin.rules.index') }}" class="text-center p-5 bg-gray-800 border border-gray-700 rounded-xl hover:bg-gray-700 transition group">
                        <div class="text-gray-400 text-2xl mb-1 group-hover:scale-110 transition">&#9881;</div>
                        <div class="text-sm text-gray-300">Gerenciar Regras</div>
                    </a>
                    <a href="{{ route('admin.logs') }}" class="text-center p-5 bg-gray-800 border border-gray-700 rounded-xl hover:bg-gray-700 transition group">
                        <div class="text-gray-400 text-2xl mb-1 group-hover:scale-110 transition">&#128196;</div>
                        <div class="text-sm text-gray-300">Ver Logs</div>
                    </a>
                    <a href="{{ route('admin.rules.generate') }}" id="generateIptables" class="text-center p-5 bg-gray-800 border border-gray-700 rounded-xl hover:bg-gray-700 transition group cursor-pointer">
                        <div class="text-gray-400 text-2xl mb-1 group-hover:scale-110 transition">&#9000;</div>
                        <div class="text-sm text-gray-300">Gerar iptables</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        document.getElementById('generateIptables')?.addEventListener('click', async function(e) {
            e.preventDefault();
            const res = await fetch('{{ route("admin.rules.generate") }}');
            const data = await res.json();
            alert(data.commands.join('\n') || 'Nenhuma regra ativa.');
        });
    </script>
    @endpush
</x-app-layout>
