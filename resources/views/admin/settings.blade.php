<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">{{ __('Configurações') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-400 px-4 py-3 rounded-xl">{{ session('success') }}</div>
            @endif
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
                <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Nome da Aplicação</label>
                        <input type="text" name="app_name" value="{{ $settings['app_name'] ?? 'Alpine Firewall Pro' }}" class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Contato LGPD (Email do DPO)</label>
                        <input type="email" name="lgpd_contact" value="{{ $settings['lgpd_contact'] ?? '' }}" class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Retenção de Logs (dias)</label>
                        <input type="number" name="log_retention_days" value="{{ $settings['log_retention_days'] ?? 90 }}" class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Modo de Inspeção</label>
                        <select name="inspection_mode" class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none">
                            <option value="string" {{ ($settings['inspection_mode'] ?? 'string') === 'string' ? 'selected' : '' }}>Inspeção de String (padrão)</option>
                            <option value="dns" {{ ($settings['inspection_mode'] ?? '') === 'dns' ? 'selected' : '' }}>Bloqueio DNS</option>
                            <option value="hybrid" {{ ($settings['inspection_mode'] ?? '') === 'hybrid' ? 'selected' : '' }}>Híbrido</option>
                        </select>
                    </div>
                    <div class="flex justify-end pt-2">
                        <button type="submit" class="px-8 py-3 bg-cyan-500 hover:bg-cyan-400 text-black font-bold rounded-xl transition shadow-lg shadow-cyan-500/25">Salvar Configurações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
