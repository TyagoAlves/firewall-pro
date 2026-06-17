<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">{{ __('Nova Regra de Firewall') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
                <form method="POST" action="{{ route('admin.rules.store') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Nome da Regra</label>
                        <input type="text" name="name" required class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none" placeholder="Ex: Bloquear YouTube">
                        @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Domínio</label>
                        <input type="text" name="domain" required class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none font-mono" placeholder="Ex: youtube.com">
                        @error('domain') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Chain</label>
                            <select name="chain" class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none">
                                <option value="FORWARD">FORWARD</option>
                                <option value="OUTPUT">OUTPUT</option>
                                <option value="INPUT">INPUT</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Ação</label>
                            <select name="action" class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none">
                                <option value="DROP">DROP (Descartar)</option>
                                <option value="REJECT">REJECT (Rejeitar)</option>
                                <option value="ACCEPT">ACCEPT (Aceitar)</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Descrição (opcional)</label>
                        <textarea name="description" rows="3" class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none" placeholder="Por que essa regra existe?"></textarea>
                    </div>
                    <div class="bg-gray-950 border border-gray-700 rounded-xl p-5">
                        <p class="text-sm text-gray-500 mb-2 font-mono text-xs">Preview do comando iptables:</p>
                        <p class="text-sm text-gray-300 font-mono">
                            iptables -A <span id="previewChain" class="text-cyan-400">FORWARD</span> -m string --string "<span id="previewDomain" class="text-yellow-400">dominio.com</span>" --algo bm -j <span id="previewAction" class="text-red-400">DROP</span>
                        </p>
                    </div>
                    <div class="flex justify-end gap-4 pt-2">
                        <a href="{{ route('admin.rules.index') }}" class="px-6 py-3 border border-gray-700 rounded-xl text-gray-300 hover:bg-gray-800 transition font-medium">Cancelar</a>
                        <button type="submit" class="px-8 py-3 bg-cyan-500 hover:bg-cyan-400 text-black font-bold rounded-xl transition shadow-lg shadow-cyan-500/25">Criar Regra</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        document.querySelector('[name=domain]')?.addEventListener('input', function() {
            document.getElementById('previewDomain').textContent = this.value || 'dominio.com';
        });
        document.querySelector('[name=chain]')?.addEventListener('change', function() {
            document.getElementById('previewChain').textContent = this.value;
        });
        document.querySelector('[name=action]')?.addEventListener('change', function() {
            document.getElementById('previewAction').textContent = this.value;
        });
    </script>
    @endpush
</x-app-layout>
