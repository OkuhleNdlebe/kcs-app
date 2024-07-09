<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Transaction;
use Livewire\WithPagination;

class CustomerEnquiries extends Component
{
    use WithPagination;

    public $selectedCustomer = null;
    public $customerSortField = 'name';
    public $customerSortDirection = 'asc';
    public $transactionSortField = 'transaction_date';
    public $transactionSortDirection = 'desc';
    public $viewingTransactions = false;

    public function render()
    {
        $customers = Customer::orderBy($this->customerSortField, $this->customerSortDirection)->paginate(10);
        $transactions = $this->selectedCustomer ? Transaction::where('customer_id', $this->selectedCustomer->id)->orderBy($this->transactionSortField, $this->transactionSortDirection)->paginate(10) : [];

        return view('livewire.customer-enquiries', compact('customers', 'transactions'));
    }

    public function selectCustomer($customerId)
    {
        $this->selectedCustomer = Customer::findOrFail($customerId);
        $this->viewingTransactions = true;
    }

    public function sortByCustomer($field)
    {
        if ($this->customerSortField === $field) {
            $this->customerSortDirection = $this->customerSortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->customerSortDirection = 'asc';
        }
        $this->customerSortField = $field;
    }

    public function sortByTransaction($field)
    {
        if ($this->transactionSortField === $field) {
            $this->transactionSortDirection = $this->transactionSortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->transactionSortDirection = 'asc';
        }
        $this->transactionSortField = $field;
    }

    public function closeTransactionView()
    {
        $this->viewingTransactions = false;
        $this->selectedCustomer = null;
    }

    public function printTransactions()
    {
        // Logic to print the transaction list
        $transactions = Transaction::where('customer_id', $this->selectedCustomer->id)
            ->orderBy($this->transactionSortField, $this->transactionSortDirection)
            ->get();

        return response()->streamDownload(function () use ($transactions) {
            $output = fopen('php://output', 'w');
            fputcsv($output, ['Date', 'Reference', 'Amount', 'Type']);

            foreach ($transactions as $transaction) {
                fputcsv($output, [
                    $transaction->transaction_date,
                    $transaction->reference,
                    $transaction->amount,
                    ucfirst($transaction->type)
                ]);
            }

            fclose($output);
        }, 'transactions.csv');
    }
}
