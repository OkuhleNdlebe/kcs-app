<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form wire:submit.prevent="store">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Add Transaction for {{ $selectedCustomer ? $selectedCustomer->name : '...' }}
                            </h3>
                            <div class="mt-2">
                                <div class="mt-4">
                                    <label for="transaction_date" class="block text-sm font-medium text-gray-700">Transaction Date</label>
                                    <input type="date" id="transaction_date" wire:model="transaction_date" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                    @error('transaction_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div class="mt-4">
                                    <label for="reference" class="block text-sm font-medium text-gray-700">Reference</label>
                                    <input type="text" id="reference" wire:model="reference" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="Reference">
                                    @error('reference') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div class="mt-4">
                                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                                    <input type="number" id="amount" wire:model="amount" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="Amount">
                                    @error('amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700">Type</label>
                                    <div class="mt-2 space-y-4">
                                        <div class="flex items-center">
                                            <input id="debit" name="type" type="radio" wire:model="type" value="debit" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                            <label for="debit" class="ml-3 block text-sm font-medium text-gray-700">
                                                Debit
                                            </label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="credit" name="type" type="radio" wire:model="type" value="credit" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                            <label for="credit" class="ml-3 block text-sm font-medium text-gray-700">
                                                Credit
                                            </label>
                                        </div>
                                    </div>
                                    @error('type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Save
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button type="button" wire:click="closeModal()" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cancel
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
