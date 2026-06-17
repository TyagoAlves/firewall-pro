<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">{{ __('Editar Regra') }}: {{ $rule->name }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
                <form method="POST" action="{{ route('admin.rules.update', $rule) }}" class="space-y-6">
                    @csrf @method('PUT')
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Nome da Regra</label>
                        <input type="text" name="name" value="{{ old('name', $rule->name) }}" required class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Domínio</label>
                        <input type="text" name="domain" value="{{ old('domain', $rule->domain) }}" required class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none font-mono">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Chain</label>
                            <select name="chain" class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none">
                                <option value="FORWARD" {{ $rule->chain === 'FORWARD' ? 'selected' : '' }}>FORWARD</option>
                                <option value="OUTPUT" {{ $rule->chain === 'OUTPUT' ? 'selected' : '' }}>OUTPUT</option>
                                <option value="INPUT" {{ $rule->chain === 'INPUT' ? 'selected' : '' }}>INPUT</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Ação</label>
                            <select name="action" class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none">
                                <option value="DROP" {{ $rule->action === 'DROP' ? 'selected' : '' }}>DROP (Descartar)</option>
                                <option value="REJECT" {{ $rule->action === 'REJECT' ? 'selected' : '' }}>REJECT (Rejeitar)</option>
                                <option value="ACCEPT" {{ $rule->action === 'ACCEPT' ? 'selected' : '' }}>ACCEPT (Aceitar)</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="enabled" value="1" {{ $rule->enabled ? 'checked' : '' }} class="rounded border-gray-700 bg-gray-950 text-cyan-500 focus:ring-cyan-500">
                        <label class="text-sm text-gray-300">Regra ativa</label>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Descrição</label>
                        <textarea name="description" rows="3" class="w-full rounded-xl border border-gray-700 bg-gray-950 text-gray-100 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500 focus:outline-none">{{ old('description', $rule->description) }}</textarea>
                    </div>
                    <div class="flex justify-end gap-4 pt-2">
                        <a href="{{ route('admin.rules.index') }}" class="px-6 py-3 border border-gray-700 rounded-xl text-gray-300 hover:bg-gray-800 transition font-medium">Cancelar</a>
                        <button type="submit" class="px-8 py-3 bg-cyan-500 hover:bg-cyan-400 text-black font-bold rounded-xl transition shadow-lg shadow-cyan-500/25">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
