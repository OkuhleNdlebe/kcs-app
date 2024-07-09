<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class Customers extends Component
{
    use WithPagination;

    public $account, $name, $balance, $customer_id;
    public $isOpen = 0;
    public $perPage = 10;
    public $sortField = 'name';
    public $sortAsc = true;

    protected function rules()
    {
        return [
            'account' => 'required|alpha_num|unique:customers,account,' . $this->customer_id . '|max:15',
            'name' => 'required|string|max:30',
            'balance' => 'nullable|numeric',
        ];
    }

    public function render()
    {
        $customers = Customer::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
        return view('livewire.customers', ['customers' => $customers]);
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
        $this->account = '';
        $this->name = '';
        $this->balance = 0;
        $this->customer_id = '';
    }

    public function store()
    {
        $this->validate();

        Customer::updateOrCreate(['id' => $this->customer_id], [
            'account' => $this->account,
            'name' => $this->name,
            'balance' => $this->balance ?? 0,  // Ensure balance is not null
        ]);

        session()->flash('message', $this->customer_id ? 'Customer Updated Successfully.' : 'Customer Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $this->customer_id = $id;
        $this->account = $customer->account;
        $this->name = $customer->name;
        $this->balance = $customer->balance;

        $this->openModal();
    }

    public function delete($id)
    {
        Customer::find($id)->delete();
        session()->flash('message', 'Customer Deleted Successfully.');
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }
}
