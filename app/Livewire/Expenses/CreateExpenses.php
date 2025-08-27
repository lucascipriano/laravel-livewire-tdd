<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use Illuminate\View\View;
use Livewire\Component;

class CreateExpenses extends Component
{

    public bool $showModal = false;
    public string $description = '';
    public float|string $amount = '';

    public function openModal(): void
    {
        $this->resetValidation();
        $this->reset(['description', 'amount']);
        $this->showModal = true;
    }
    public function closeModal(): void
    {
        $this->showModal = false;
    }

    public function rules(): array
    {
      return [
            'description' => 'required|string|max:255|min:3',
            'amount' => 'required|numeric|min:0.01',
        ];
    }
    public function save(): void
    {
        $this->validate();
        Expense::create([
            'description' => $this->description,
            'amount' => $this->amount,
        ]);
        $this->dispatch('created');
        $this->closeModal();
        $this->reset(['description', 'amount']);
    }

    public function render(): View
    {
        return view('livewire.expenses.create-expenses');
    }
}
