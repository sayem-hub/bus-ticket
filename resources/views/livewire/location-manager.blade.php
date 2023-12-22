@section('title', '| Location List')
<div class="container mx-auto">
    <h1 class="text-4xl font-extrabold dark:text-white mt-5 text-center">Location List</h1>
    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" wire:click="create">Create Location</button>
    
{{-- Tailwind CSS Form --}}

@if ($mode === 'create' || $mode === 'edit')
    <form wire:submit.prevent="save">

     

                <div class="grid gap-6 mb-6 md:grid-cols-3">
                    <div>
                        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location Name</label>
                        <input type="text" wire:model="location.location_name" id="location_name" autocomplete="given-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('location.location_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
      
                

            <div class="mt-3 text-end">
                <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{ $mode === 'create' ? 'Create' : 'Update' }}</button>
                <button type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" wire:click="cancel">Cancel</button>
            </div>
           
    </form>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">SL</th>
                <th class="px-6 py-3">Location Name</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($allLocation->count() == 0)
                <tr>
                    <td colspan="10" class="px-6 py-4 text-center">No Location Found!</td>
                </tr>
                
            @endif
            @foreach ($allLocation as $key=>$locationName)
                <tr>
                    <td class="px-6 py-3">{{ ++$key }}</td>
                    <td>{{ $locationName->location_name }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                        <button class="btn btn-success btn-sm" wire:click="edit({{ $locationName->id }})">Edit</button>
                        {{-- <button class="btn btn-danger btn-sm" wire:click="delete({{ $buyer->id }})">Del</button> --}}
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
