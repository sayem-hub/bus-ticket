<div>
   

   <div class="container mx-auto">
    <div class="flex flex-col justify-center items-center">
        <h3 class="text-2xl font-extrabold dark:text-white mt-5 text-lime-900">User Section</h3>
        
    </div>

    <h6 class="text-2xl font-extrabold dark:text-white mt-5 text-indigo-500">Ticket Purchase History</h6>
    <p class="dark:text-white mt-5 text-black-500">To view your ticket purchase history type your phone number below</p>
   </div>

   
   <div class="container w-1/3 mt-5">
   
<form wire:submit.prevent="searchByPhone" class="flex items-center">   
    <label for="voice-search" class="sr-only">Search</label>
    <div class="relative w-full">
       
        <input type="text" wire:model="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter phone number" required>
   
    </div>
    <button type="submit" class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>Search
    </button>
</form>

   </div>
       

   @if ($getUserData)

   <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <h3 class="text-2xl font-extrabold dark:text-white mt-5 text-indigo-500">Your Trip Details</h3>

    <ul>
        <li class="text-lg font-medium text-gray-900 dark:text-white">Name: {{ $getUserData[0]->name }}</li>
        <li class="text-lg font-medium text-gray-900 dark:text-white">Phone: {{ $getUserData[0]->phone }}</li>
        <li class="text-lg font-medium text-gray-900 dark:text-white">Address: {{ $getUserData[0]->address }}</li>
    </ul>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                
                <th class="px-6 py-3">Trip Date</th>
                <th class="px-6 py-3">Boarding Point</th>
                <th class="px-6 py-3">Number of Seats</th>
                <th class="px-6 py-3">Total Fare</th>
            </tr>
        </thead>
        <tbody>
            @if ($getUserData->count() == 0)
                <tr>
                    <td colspan="10" class="px-6 py-4 text-center">No Trip Found!</td>
                </tr>
                
            @endif
            @foreach ($getUserData as $key=>$result)
                <tr class="text-center">
                    
                    @foreach ($result->seats as $key=>$seat)
                       <td>{{ $seat->trip_date }}</td> 
                    @endforeach
                    <td>{{ $result->seat_number }}</td>
                    <td>{{ $result->total_fare }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
       
   @endif
   

</div>
