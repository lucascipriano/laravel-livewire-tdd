<?php

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
