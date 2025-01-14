<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <input type="hidden" id="id" wire:model="id">
                        <div class="mb-4">
                            <label for="product_name"
                                class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="product_name" placeholder="Enter Name" wire:model="product_name" >
                            @error('product_name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="product_description"
                                class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="product_description" placeholder="Enter Title" wire:model="product_description">
                            @error('product_description')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Sku"
                                class="block text-gray-700 text-sm font-bold mb-2">Sku:</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="sku" placeholder="Enter Sku" wire:model="sku">
                            @error('sku')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="product_group_id"
                                class="block text-gray-700 text-sm font-bold mb-2">Group:</label>
                                <select id="product_group_id" wire:model="product_group_id">
                                    @foreach (\App\Models\ProductGroup::all() as $group)
                                        <option value="{{ $group->id }}" @if ($product->product_group_id == $group->id) 'selected' @endif>{{ $group->name }}</option>
                                    @endforeach
                                </select>

                            @error('product_group_id')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <x-button wire:click.prevent="update()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Save
                        </x-button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <x-button wire:click="closeModal()" class="ml-4">Cancel
                        </x-button>
                    </span>
                </div>
            </form>
        </div>

    </div>
</div>
