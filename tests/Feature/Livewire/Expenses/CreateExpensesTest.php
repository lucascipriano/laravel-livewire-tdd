<?php

use App\Livewire\Expenses\CreateExpenses;
use App\Models\Expense;
use Livewire\Livewire;

it('criar um gasto com dados válidos', function(){
   Livewire::test(CreateExpenses::class)
   ->set('description', 'Almoço')
   ->set('amount', 50.00)
   ->call('save');

   expect(Expense::count())->toBe(1);
   expect(Expense::first()->description)->toBe('Almoço');
   expect(Expense::first()->amount)->toEqual(50.00);
});

it('não cria gasto sem descrição', function(){
    Livewire::test(CreateExpenses::class)
        ->set('description', '')
        ->set('amount', 50.00)
        ->call('save')
        ->assertHasErrors(['description' => 'required']);
    expect(Expense::count())->toBe(0);
});

it('não cria gasto com valor inválido', function(){
    Livewire::test(CreateExpenses::class)
        ->set('description', 'Almoço')
        ->set('amount', 0)
        ->call('save')
        ->assertHasErrors(['amount' => 'min']);
    expect(Expense::count())->toBe(0);
});
