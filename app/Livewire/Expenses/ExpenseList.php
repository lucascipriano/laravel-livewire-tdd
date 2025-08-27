<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ExpenseList extends Component
{

    #[Computed]
    public function expenses(){
        return Expense::all();
    }


    public function render()
    {
        return view('livewire.expenses.expense-list');
    }
}
