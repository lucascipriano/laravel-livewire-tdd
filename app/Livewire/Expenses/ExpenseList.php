<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ExpenseList extends Component
{
    #[Computed]
    public function expenses(){
        return Expense::query()->orderBy('created_at', 'desc')->get();
    }
    public function render()
    {
        return view('livewire.expenses.expense-list');
    }
}
