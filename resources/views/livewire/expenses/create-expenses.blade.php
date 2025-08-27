<div>
    <!-- Botão que abre o modal -->
    <button wire:click="openModal" class="bg-green-600 text-white px-4 py-2 rounded">
        Novo Gasto
    </button>

    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-xl font-bold mb-4">Novo Gasto</h2>

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

                    <div class="flex justify-end space-x-2">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 border rounded">
                            Cancelar
                        </button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
