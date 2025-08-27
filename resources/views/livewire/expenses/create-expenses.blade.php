<div>
    <div class="p-4 max-w-md mx-auto">
        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label class="block font-semibold">Descrição</label>
                <input type="text" wire:model="description" class="border rounded w-full p-2">
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block font-semibold">Valor (R$)</label>
                <input type="number" step="0.01" wire:model="amount" class="border rounded w-full p-2">
                @error('amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Salvar Gasto
            </button>
        </form>
    </div>

</div>
