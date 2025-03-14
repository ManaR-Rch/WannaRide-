@extends('layout')

@section('content')
    <div class="container mx-auto px-6 py-10 bg-gray-900 text-white">
        <!-- Trips Section -->
        <h2 class="text-4xl font-extrabold text-orange-500 mb-8">My Rides</h2>
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <table class="w-full text-sm text-gray-200">
                <thead class="bg-orange-700 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">From</th>
                        <th class="px-6 py-3 text-left">To</th>
                        <th class="px-6 py-3 text-left">Time</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Fare</th>
                        <th class="px-6 py-3 text-left">Options</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach($trips as $trip)
                    <tr class="hover:bg-gray-700">
                        <td class="px-6 py-4">{{ $trip->pickup_location }}</td>
                        <td class="px-6 py-4">{{ $trip->destination }}</td>
                        <td class="px-6 py-4">{{ $trip->departure_time->format('d M, H:i') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-{!! [
                                'pending' => 'yellow-500',
                                'accepted' => 'green-500',
                                'canceled' => 'red-500',
                                'completed' => 'blue-500'
                            ][$trip->status] !!}">
                                {{ ucfirst($trip->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ number_format($trip->price, 2) }} MAD</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('trips.show', $trip) }}" class="text-orange-400 hover:text-orange-200">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4 bg-gray-800">
                {{ $trips->links() }}
            </div>
        </div>

        <!-- Drivers Section -->
        <h2 class="text-4xl font-extrabold text-orange-500 mt-12 mb-8">Available Drivers</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($availableDrivers as $driver)
            <div class="bg-gray-800 rounded-lg shadow-lg p-6 hover:shadow-xl transition-transform transform hover:scale-105 border-l-4 border-orange-500">
                <div class="flex items-center space-x-4 mb-4">
                    <img src="{{ asset('storage/' . $driver->profile_photo) }}" class="w-14 h-14 rounded-full">
                    <div>
                        <h5 class="text-lg font-semibold">{{ $driver->name }}</h5>
                        <p class="text-sm text-gray-400">📞 {{ $driver->phone }}</p>
                    </div>
                </div>
                <div>
                    <p class="text-sm text-gray-400">🕒 Available:</p>
                    @foreach($driver->availabilities as $availability)
                    <p class="text-sm text-gray-300">{{ $availability->start_time->format('d M, H:i') }} → {{ $availability->end_time->format('H:i') }}</p>
                    @endforeach
                </div>
                <div class="mt-6">
                    <a href="{{ route('trips.create', ['driver_id' => $driver->id]) }}" class="block text-center bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-500">
                        Book Driver
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection