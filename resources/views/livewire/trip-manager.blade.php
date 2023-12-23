@section('title', '| Trip List')
<div class="container mx-auto">
    <h1 class="text-4xl font-extrabold dark:text-white mt-5 text-center">Trips List</h1>
    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" wire:click="create">Create Trip</button>
    
{{-- Tailwind CSS Form --}}

@if ($mode === 'create' || $mode === 'edit')
    <form wire:submit.prevent="save">

     

                <div class="grid gap-6 mb-6 md:grid-cols-3">
                    <div>
                        <label for="trip.bus_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bus Number</label>
                        <select id="trip.bus_number" wire:model.defer="trip.bus_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Bus</option>
                            <option value="001">001</option>
                          </select>
                    </div>
             
      
                    <div>
                        <label for="trip.trip_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trip Date</label>
                        <input type="date" wire:model="trip.trip_date" id="trip.trip_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                     </div>
             
      
                <div>
                    <label for="trip.departure_location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">From Location</label>
                    <select id="trip.departure_location" wire:model="trip.departure_location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a location</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                        @endforeach
                      </select>
                </div>
              
      
              <div>
                <label for="trip.arrival_location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">To Location</label>
                <select id="trip.arrival_location" wire:model="trip.arrival_location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a location</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                    @endforeach
                  </select>              
                </div>
             

      
              <div>
                <label for="trip.trip_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trip Type</label>
                <input id="trip.trip_type" wire:model="trip.trip_type" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional">
             </div>
              
             <div>
                <label for="trip.total_seats" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Seats</label>
                <input id="trip.total_seats" wire:model="trip.total_seats" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
             </div>
      
              <div>
                <label for="trip.trip_fare" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trip Fare</label>
                <input id="trip.trip_fare" wire:model="trip.trip_fare" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
          

      
              <div>
                <label for="trip.departure_date_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departure Date and Time</label>
                <input id="trip.departure_date_time" wire:model="trip.departure_date_time" type="datetime-local" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
              

      
              <div>
                <label for="trip.arrival_date_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Arrival Date and Time</label>
                <input id="trip.arrival_date_time" wire:model="trip.arrival_date_time" type="datetime-local" autocomplete="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
             

                
                <div>
                    <label for="trip.trip_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select id="trip.trip_status" wire:model="trip.trip_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a status</option>
                        <option value="1">Live</option>
                        <option value="0">Completed</option>
                      </select>
                </div>
              
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
                <th class="px-6 py-3">Trip Date</th>
                <th class="px-6 py-3">Bus No.</th>
                <th class="px-6 py-3">From Location</th>
                <th class="px-6 py-3">To Location</th>
                <th class="px-6 py-3">Type</th>
                <th class="px-6 py-3">Total Seats</th>
                <th class="px-6 py-3">Available Seats</th>
                <th class="px-6 py-3">Trip Fare</th>
                <th class="px-6 py-3">Departure Date and Time</th>
                <th class="px-6 py-3">Arrival Date and Time</th>
                <th class="px-6 py-3">Trip Status</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($trips->count() == 0)
                <tr>
                    <td colspan="10" class="px-6 py-4 text-center">No Trips Found!</td>
                </tr>
                
            @endif
            @foreach ($trips as $key=>$trip)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                    <td class="px-6 py-3">{{ ++$key }}</td>
                    <td>{{ $trip->trip_date }}</td>
                    <td>{{ $trip->bus_number }}</td>
                    <td>{{ $trip->departureLocation->location_name }}</td>
                    <td>{{ $trip->arrivalLocation->location_name }}</td>
                    <td>{{ $trip->trip_type }}</td>
                    <td>{{ $trip->total_seats }}</td>
                    <td>{{ $trip->available_seats }}</td>
                    <td>{{ $trip->trip_fare }}</td>
                    <td>{{ $trip->departure_date_time }}</td>
                    <td>{{ $trip->arrival_date_time }}</td>
                    @if ($trip->trip_status == 1)
                    <td><span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Live</span></td>
                    @else
                    <td><span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">Completed</span></td>
                        
                    @endif
                    <td>
                        <div class="flex space-x-2">
                        <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="edit({{ $trip->id }})">Edit</button>
                        <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" wire:click="delete({{ $trip->id }})">Del</button>
                       
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
