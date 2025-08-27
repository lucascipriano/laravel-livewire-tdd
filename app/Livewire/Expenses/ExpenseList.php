<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use Livewire\Attributes\On;
use Livewire\Component;

class ExpenseList extends Component
{
    public $expenses;

    public function mount()
    {
        $this->refreshExpenses();
    }
    protected function listeners(): array
    {
        return [
            'expenseCreated' => 'refreshExpenses',
        ];
    }

    #[On('expenseCreated')]
    public function refreshExpenses(): void
    {
        $this->expenses = Expense::orderBy('created_at', 'desc')->get();
    }
    public function render()
    {
        return view('livewire.expenses.expense-list');
    }
}
