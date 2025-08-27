<?php

use App\Livewire\Expenses\CreateExpenses;
use App\Livewire\Expenses\ExpenseList;
use App\Models\Expense;
use Livewire\Livewire;

it('pode renderizar o componente', function () {
    Livewire::test(ExpenseList::class)
        ->assertStatus(200)
        ->assertViewIs('livewire.expenses.expense-list');
});
it('mostra os gastos cadastrados', function(){
    Expense::factory()->create(['description' => 'Almoço', 'amount' => 50]);
    Expense::factory()->create(['description' => 'Transporte', 'amount' => 20]);
   Livewire::test(ExpenseList::class)
       ->assertSet('expenses.0.description', 'Almoço')
       ->assertSet('expenses.1.description', 'Transporte');

});
it('atualiza a lista quando um gasto é criado', function () {
    // Inicializa o componente pai
    $component = Livewire::test(ExpenseList::class);

    // Inicialmente não tem gastos
    expect($component->expenses)->toHaveCount(0);

    // Cria um gasto no banco
    $expense = Expense::factory()->create([
        'description' => 'Jantar',
        'amount' => 30,
    ]);

    // Recarrega o componente para refletir o novo dado
    $component->refresh();

    // Verifica se o gasto apareceu
    expect($component->expenses->first()->description)->toBe('Jantar');
});

it('ordena os gastos do mais recente ao mais antigo', function () {
    Expense::factory()->create(['description' => 'Antigo', 'created_at' => now()->subDay()]);
    Expense::factory()->create(['description' => 'Novo', 'created_at' => now()]);

    Livewire::test(ExpenseList::class)
        ->assertSet('expenses.0.description', 'Novo')
        ->assertSet('expenses.1.description', 'Antigo');
});
