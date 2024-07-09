<div class="container mx-auto px-4 py-8">
    <div class="relative bg-indigo-200 p-4 sm:p-6 rounded-sm overflow-hidden mb-8" style="margin-bottom:0px !important;">
        <!-- Content -->
        <div class="relative">
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold mb-1" style="margin-left:10px;">Transactions
            </h1>
        </div>
    </div>
    <div class="my-4"></div>


    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border cursor-pointer" wire:click="sortBy('id')">No.
                        @if($sortField == 'id')
                            @if($sortDirection == 'asc')
                                &#9650;
                            @else
                                &#9660;
                            @endif
                        @endif
                    </th>
                    <th class="px-4 py-2 border cursor-pointer" wire:click="sortBy('account')">Account
                        @if($sortField == 'account')
                            @if($sortDirection == 'asc')
                                &#9650;
                            @else
                                &#9660;
                            @endif
                        @endif
                    </th>
                    <th class="px-4 py-2 border cursor-pointer" wire:click="sortBy('name')">Name
                        @if($sortField == 'name')
                            @if($sortDirection == 'asc')
                                &#9650;
                            @else
                                &#9660;
                            @endif
                        @endif
                    </th>
                    <th class="px-4 py-2 border cursor-pointer" wire:click="sortBy('balance')">Balance
                        @if($sortField == 'balance')
                            @if($sortDirection == 'asc')
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
                            <button wire:click="selectCustomer({{ $customer->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded mx-1">Add Transaction</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $customers->links() }}
    </div>

    @if($isOpen)
        @include('livewire.create-transactions')
    @endif
</div>
