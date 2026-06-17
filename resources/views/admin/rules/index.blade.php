<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">{{ __('Regras de Firewall') }}</h2>
            <a href="{{ route('admin.rules.create') }}" class="bg-cyan-500 hover:bg-cyan-400 text-black font-bold px-5 py-2.5 rounded-xl text-sm transition shadow-lg shadow-cyan-500/25">+ Nova Regra</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-400 px-4 py-3 rounded-xl">{{ session('success') }}</div>
            @endif
            <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
                <div class="p-6">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left text-gray-500 border-b border-gray-800">
                                <th class="pb-3 px-2">Nome</th>
                                <th class="pb-3 px-2">Domínio</th>
                                <th class="pb-3 px-2">Chain</th>
                                <th class="pb-3 px-2">Ação</th>
                                <th class="pb-3 px-2">Status</th>
                                <th class="pb-3 px-2">Comando</th>
                                <th class="pb-3 px-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rules as $rule)
                            <tr class="border-b border-gray-800/50 hover:bg-gray-800/30">
                                <td class="py-3 px-2 text-gray-200 font-medium">{{ $rule->name }}</td>
                                <td class="py-3 px-2 text-gray-400 font-mono text-xs">{{ $rule->domain }}</td>
                                <td class="py-3 px-2"><span class="px-2 py-0.5 rounded text-xs font-medium bg-gray-800 text-gray-300">{{ $rule->chain }}</span></td>
                                <td class="py-3 px-2">
                                    <span class="px-2 py-0.5 rounded text-xs font-medium {{ $rule->action === 'DROP' ? 'bg-red-500/20 text-red-400' : 'bg-green-500/20 text-green-400' }}">{{ $rule->action }}</span>
                                </td>
                                <td class="py-3 px-2">
                                    <span class="px-2 py-0.5 rounded text-xs font-medium {{ $rule->enabled ? 'bg-green-500/20 text-green-400' : 'bg-gray-700 text-gray-400' }}">{{ $rule->enabled ? 'Ativa' : 'Inativa' }}</span>
                                </td>
                                <td class="py-3 px-2">
                                    <button onclick="copyCommand('{{ addslashes("iptables -A {$rule->chain} -m string --string \"{$rule->domain}\" --algo bm -j {$rule->action}") }}')" class="text-xs text-cyan-400 hover:text-cyan-300 font-mono hover:underline">
                                        Copiar
                                    </button>
                                </td>
                                <td class="py-3 px-2">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('admin.rules.edit', $rule) }}" class="text-cyan-400 hover:text-cyan-300 text-xs font-medium">Editar</a>
                                        <form action="{{ route('admin.rules.toggle', $rule) }}" method="POST" class="inline">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="text-xs font-medium {{ $rule->enabled ? 'text-yellow-400 hover:text-yellow-300' : 'text-green-400 hover:text-green-300' }}">{{ $rule->enabled ? 'Desativar' : 'Ativar' }}</button>
                                        </form>
                                        <form action="{{ route('admin.rules.destroy', $rule) }}" method="POST" class="inline" onsubmit="return confirm('Remover regra?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300 text-xs font-medium">Excluir</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="py-12 text-center text-gray-500">Nenhuma regra de firewall criada.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">{{ $rules->links() }}</div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        function copyCommand(cmd) {
            navigator.clipboard.writeText(cmd).then(() => {
                alert('Comando copiado para a área de transferência!');
            });
        }
    </script>
    @endpush
</x-app-layout>
