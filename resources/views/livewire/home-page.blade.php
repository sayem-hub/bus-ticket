<div>

    <h1 class="text-4xl text-teal-600 font-extrabold dark:text-white mt-5 text-center">Welcome to Sayem Travels</h1>

    <h3 class="text-2xl font-extrabold dark:text-white mt-5 text-indigo-500">Find Your Trips</h3>
   
      

        <form class="m-8" wire:submit="search">

            <div class="grid gap-6 mb-6 md:grid-cols-2 w-1/2">
    
                <div>
                    <label for="trip.departure_location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">From</label>
                    <select id="trip.departure_location" wire:model="trip.departure_location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a location</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                        @endforeach
                      </select>
                      @error('trip.departure_location')<span class="text-red-500">{{ $message }}</span>@enderror
                </div>
    
    
                <div>
                    <label for="trip.arrival_location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">To</label>
                    <select id="trip.arrival_location" wire:model="trip.arrival_location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a location</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                        @endforeach
                    </select>
                    @error('trip.arrival_location')<span class="text-red-500">{{ $message }}</span>@enderror
                </div>
    
    
    
                    <div>
                        <label for="trip.trip_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Journey</label>
                        <input type="date" wire:model="trip.trip_date" id="trip.trip_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('trip.trip_date')<span class="text-red-500">{{ $message }}</span>@enderror
                     </div>
    
    
                     <div>
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Return (Optional)</label>
                        <select id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a location</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                            @endforeach
                          </select>
                    </div>
    
            </div>

            <div>
                <button class="bg-blue-600 hover:bg-blue-800 w-1/2 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-5-5m2-5a7 7 0 10-14 0 7 7 0 0014 0z"/>
                    </svg>
                    Search Trip
                </button>
            </div>
    
    </form>
    
   

    @if ($searchResults)
    <div>
        <h3 class="text-2xl font-extrabold dark:text-white mt-5 text-indigo-500">Search Results</h3>
      
        @if ($searchResults->count() > 0)
            <p class="text-lg font-bold dark:text-white text-center">From {{ $searchResults[0]->departureLocation->location_name }} to {{ $searchResults[0]->arrivalLocation->location_name }} on {{ $searchResults[0]->trip_date }}</p>
            @endif

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="text-center">
                            <th class="px-6 py-3">Bus No</th>
                            <th class="px-6 py-3">From</th>
                            <th class="px-6 py-3">To</th>
                            <th class="px-6 py-3">Total Seats</th>
                            <th class="px-6 py-3">Available Seats</th>
                            <th class="px-6 py-3">Seat Fare</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                       

                        @if ($searchResults->count() == 0)
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center">No Trip Found!</td>
                        </tr>
                        
                    @endif
                    
                        @foreach ($searchResults as $key=>$result)
                            <tr class="text-center">
                                <td>{{ $result->bus_number }}</td>
                                <td>{{ $result->departureLocation->location_name }}</td>
                                <td>{{ $result->arrivalLocation->location_name }}</td>
                                <td>{{ $result->total_seats }}</td>
                                <td>{{ $result->available_seats }}</td>
                                <td>{{ $result->trip_fare }}</td>
                                <td>
                                   <button class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="{{ route('seat.selection', ['tripId' => $result->id]) }}">Book Now</a></button>                           
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       
    </div>

    
@endif


</div>
