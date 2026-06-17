<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">{{ __('Logs de Bloqueio') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">
                    <p class="text-sm text-gray-400">Bloqueios Hoje</p>
                    <p class="text-3xl font-bold text-red-400 mt-1">{{ $blockedToday }}</p>
                </div>
                <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">
                    <p class="text-sm text-gray-400">Permissões Hoje</p>
                    <p class="text-3xl font-bold text-green-400 mt-1">{{ $allowedToday }}</p>
                </div>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
                <div class="p-6">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left text-gray-500 border-b border-gray-800">
                                <th class="pb-3">Destino</th>
                                <th class="pb-3">Ação</th>
                                <th class="pb-3">Regra</th>
                                <th class="pb-3">IP Origem</th>
                                <th class="pb-3">Protocolo</th>
                                <th class="pb-3">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logs as $log)
                            <tr class="border-b border-gray-800/50 hover:bg-gray-800/30">
                                <td class="py-3 text-gray-200 font-mono text-xs">{{ $log->destination }}</td>
                                <td class="py-3">
                                    <span class="px-2 py-0.5 rounded text-xs font-medium {{ $log->action === 'blocked' ? 'bg-red-500/20 text-red-400' : 'bg-green-500/20 text-green-400' }}">{{ $log->action }}</span>
                                </td>
                                <td class="py-3 text-gray-400 text-xs">{{ $log->rule?->name ?? '-' }}</td>
                                <td class="py-3 text-gray-500 font-mono text-xs">{{ $log->source_ip ?? '-' }}</td>
                                <td class="py-3 text-gray-500 text-xs">{{ $log->protocol ?? '-' }}</td>
                                <td class="py-3 text-gray-500 text-xs">{{ $log->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="6" class="py-12 text-center text-gray-500">Nenhum log registrado.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">{{ $logs->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
