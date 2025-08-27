<div>
    <livewire:expenses.create-expenses @created="$refresh"/>
    <div class="p-4 max-w-md mx-auto space-y-2">
        <h2 class="text-xl font-bold mb-4">Gastos</h2>

        @if($this->expenses->isEmpty())
            <p class="text-gray-500">Nenhum gasto cadastrado.</p>
        @else
            <ul class="space-y-2">
                @foreach($this->expenses as $expense)
                    <li class="border p-2 rounded flex justify-between">
                        <span>{{ $expense->description }}</span>
                        <span>R$ {{ number_format($expense->amount, 2, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
