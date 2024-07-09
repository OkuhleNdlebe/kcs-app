<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Customer;
use Livewire\WithPagination;

class Transactions extends Component
{
    use WithPagination;

    public $customer_id, $transaction_date, $reference, $amount, $type;
    public $isOpen = false;
    public $selectedCustomer = null;
    public $sortField = 'name';
    public $sortDirection = 'asc';

    protected $rules = [
        'transaction_date' => 'required|date',
        'reference' => 'required|string',
        'amount' => 'required|numeric',
        'type' => 'required|in:debit,credit',
    ];

    public function render()
    {
        $customers = Customer::orderBy($this->sortField, $this->sortDirection)->paginate(10);
        return view('livewire.transactions', compact('customers'));
    }

    public function selectCustomer($customerId)
    {
        $this->selectedCustomer = Customer::findOrFail($customerId);
        $this->create(); // Open the modal to add a transaction
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->transaction_date = '';
        $this->reference = '';
        $this->amount = '';
        $this->type = '';
    }

    public function store()
    {
        $this->validate();

        $transaction = Transaction::create([
            'customer_id' => $this->selectedCustomer->id,
            'transaction_date' => $this->transaction_date,
            'reference' => $this->reference,
            'amount' => $this->amount,
            'type' => $this->type,
        ]);

        if ($this->type == 'debit') {
            $this->selectedCustomer->balance += $this->amount;
        } else {
            $this->selectedCustomer->balance -= $this->amount;
        }

        $this->selectedCustomer->save();

        session()->flash('message', 'Transaction Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }
}
