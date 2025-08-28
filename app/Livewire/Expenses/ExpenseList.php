<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ExpenseList extends Component
{
    
    public function render()
    {
        $expenses = Expense::orderBy('created_at', 'desc')->get();
        return view('livewire.expenses.expense-list', compact('expenses'));
    }
}
