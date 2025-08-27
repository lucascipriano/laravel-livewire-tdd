<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use Livewire\Component;

class CreateExpenses extends Component
{

    public bool $showModal = false;
    public string $description = '';
    public float|string $amount = '';

    public function openModal(){
        $this->resetValidation();
        $this->reset(['description', 'amount']);
        $this->showModal = true;
    }
    public function closeModal()
    {
        $this->showModal = false;
    }

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
        $this->dispatch('expenseCreated');
        $this->closeModal();
        $this->reset(['description', 'amount']);
    }

    public function render()
    {
        return view('livewire.expenses.create-expenses');
    }
}
