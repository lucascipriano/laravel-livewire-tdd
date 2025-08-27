<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use Livewire\Component;

class CreateExpenses extends Component
{
    public string $description = '';
    public float|string $amount = '';

    protected array $rules = [
      'description' => 'required|string|max:255|min:3',
        'amount' => 'required|numeric|min:0.01',
    ];
    public function save(){
        $this->validate();
        Expense::create([
            'description' => $this->description,
            'amount' => $this->amount,
        ]);
        $this->reset(['description', 'amount']);
        $this->dispatch('expenseCreated');
    }

    public function render()
    {
        return view('livewire.expenses.create-expenses');
    }
}
