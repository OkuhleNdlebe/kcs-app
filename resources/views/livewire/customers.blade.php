<div class="container mx-auto px-4 py-8">
    <div class="relative bg-indigo-200 p-4 sm:p-6 rounded-sm overflow-hidden mb-8" style="margin-bottom:0px !important;">
        <!-- Content -->
        <div class="relative">
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold mb-1" style="margin-left:10px;">Customers</h1>
        </div>
    </div>

    @if($isOpen)
        @include('livewire.create-customer')
    @endif

    <div class="flex justify-between items-center my-4">
        <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Customer</button>
        <div>
            <label for="perPage" class="text-gray-700">Rows per page:</label>
            <select wire:model="perPage" id="perPage" class="ml-2 border border-gray-300 rounded text-gray-700">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        @if (session()->has('message'))
            <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
                <p class="font-bold">{{ session('message') }}</p>
            </div>
        @endif
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">No.</th>
                    <th class="px-4 py-2 border cursor-pointer" wire:click="sortBy('account')">Account
                        @if($sortField == 'account')
                            <i class="fa fa-fw fa-sort-{{ $sortAsc ? 'asc' : 'desc' }}"></i>
                        @endif
                    </th>
                    <th class="px-4 py-2 border cursor-pointer" wire:click="sortBy('name')">Name
                        @if($sortField == 'name')
                            <i class="fa fa-fw fa-sort-{{ $sortAsc ? 'asc' : 'desc' }}"></i>
                        @endif
                    </th>
                    <th class="px-4 py-2 border cursor-pointer" wire:click="sortBy('balance')">Balance
                        @if($sortField == 'balance')
                            <i class="fa fa-fw fa-sort-{{ $sortAsc ? 'asc' : 'desc' }}"></i>
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
                            <button wire:click="edit({{ $customer->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded mx-1">Edit</button>
                            <button onclick="confirm('Are you sure you want to delete this customer?') || event.stopImmediatePropagation()" wire:click="delete({{ $customer->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded mx-1">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $customers->links() }}
    </div>
</div>
