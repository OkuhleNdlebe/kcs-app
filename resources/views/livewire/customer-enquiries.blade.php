<div class="container mx-auto px-4 py-8">
    <div class="relative bg-indigo-200 p-4 sm:p-6 rounded-sm overflow-hidden mb-8" style="margin-bottom:0px !important;">
        <!-- Content -->
        <div class="relative">
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold mb-1" style="margin-left:10px;">Customer Enquiries</h1>
        </div>
    </div>

    <div class="my-4"></div>
    

    @if($viewingTransactions && $selectedCustomer)
        <div>
            <h3 class="text-xl font-semibold mb-4">Transactions for {{ $selectedCustomer->name }}</h3>
            <button wire:click="closeTransactionView" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded mb-4">Back to Customers</button>
            <button wire:click="printTransactions" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded mb-4">Print Transactions</button>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 border cursor-pointer" wire:click="sortByTransaction('transaction_date')">Date
                                @if($transactionSortField == 'transaction_date')
                                    @if($transactionSortDirection == 'asc')
                                        &#9650;
                                    @else
                                        &#9660;
                                    @endif
                                @endif
                            </th>
                            <th class="px-4 py-2 border cursor-pointer" wire:click="sortByTransaction('reference')">Reference
                                @if($transactionSortField == 'reference')
                                    @if($transactionSortDirection == 'asc')
                                        &#9650;
                                    @else
                                        &#9660;
                                    @endif
                                @endif
                            </th>
                            <th class="px-4 py-2 border cursor-pointer" wire:click="sortByTransaction('amount')">Amount
                                @if($transactionSortField == 'amount')
                                    @if($transactionSortDirection == 'asc')
                                        &#9650;
                                    @else
                                        &#9660;
                                    @endif
                                @endif
                            </th>
                            <th class="px-4 py-2 border cursor-pointer" wire:click="sortByTransaction('type')">Type
                                @if($transactionSortField == 'type')
                                    @if($transactionSortDirection == 'asc')
                                        &#9650;
                                    @else
                                        &#9660;
                                    @endif
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="px-4 py-2 border">{{ $transaction->transaction_date }}</td>
                                <td class="px-4 py-2 border">{{ $transaction->reference }}</td>
                                <td class="px-4 py-2 border">{{ $transaction->amount }}</td>
                                <td class="px-4 py-2 border">{{ ucfirst($transaction->type) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $transactions->links() }}
            </div>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 border cursor-pointer" wire:click="sortByCustomer('id')">No.
                            @if($customerSortField == 'id')
                                @if($customerSortDirection == 'asc')
                                    &#9650;
                                @else
                                    &#9660;
                                @endif
                            @endif
                        </th>
                        <th class="px-4 py-2 border cursor-pointer" wire:click="sortByCustomer('account')">Account
                            @if($customerSortField == 'account')
                                @if($customerSortDirection == 'asc')
                                    &#9650;
                                @else
                                    &#9660;
                                @endif
                            @endif
                        </th>
                        <th class="px-4 py-2 border cursor-pointer" wire:click="sortByCustomer('name')">Name
                            @if($customerSortField == 'name')
                                @if($customerSortDirection == 'asc')
                                    &#9650;
                                @else
                                    &#9660;
                                @endif
                            @endif
                        </th>
                        <th class="px-4 py-2 border cursor-pointer" wire:click="sortByCustomer('balance')">Balance
                            @if($customerSortField == 'balance')
                                @if($customerSortDirection == 'asc')
                                    &#9650;
                                @else
                                    &#9660;
                                @endif
                            @endif
                        </th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $index => $customer)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2 border">{{ $index + 1 + (($customers->currentPage() - 1) * $customers->perPage()) }}</td>
                            <td class="px-4 py-2 border">{{ $customer->account }}</td>
                            <td class="px-4 py-2 border">{{ $customer->name }}</td>
                            <td class="px-4 py-2 border">{{ $customer->balance }}</td>
                            <td class="px-4 py-2 border text-center">
                                <button wire:click="selectCustomer({{ $customer->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded mx-1">View Transactions</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $customers->links() }}
        </div>
    @endif
</div>
