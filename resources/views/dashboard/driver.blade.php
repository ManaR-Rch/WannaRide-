@extends('layout')

@section('content')
<div class="container mx-auto px-6 py-10 bg-gray-900 text-white">
    <div class="grid grid-cols-1 gap-8">
        <!-- Reservations Section -->
        <div class="overflow-x-auto">
            <h2 class="text-4xl font-extrabold text-orange-500 mb-8">Your Reservations</h2>
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-orange-700 text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Passenger
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Pickup Location
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Destination
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Departure Time
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach($reservations as $trip)
                        <tr class="hover:bg-gray-700 transition duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                {{ $trip->passenger->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                {{ $trip->pickup_location }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                {{ $trip->destination }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                {{ $trip->departure_time->format('d M, H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-{{
                                    [
                                        'pending' => 'yellow-500',
                                        'accepted' => 'green-500',
                                        'canceled' => 'red-500',
                                        'completed' => 'blue-500'
                                    ][$trip->status]
                                }}">
                                    {{ ucfirst($trip->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                @if($trip->status === 'pending')
                                    <div class="flex space-x-2">
                                        <form action="{{ route('trips.update-status', $trip) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="accepted">
                                            <button type="submit" class="bg-orange-600 text-white px-3 py-1 rounded-lg hover:bg-orange-500 hover-scale transition duration-300">
                                                Accept
                                            </button>
                                        </form>
                                        <form action="{{ route('trips.update-status', $trip) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="canceled">
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 hover-scale transition duration-300">
                                                Reject
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-gray-400">No actions available</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Availability Section -->
        <div>
            <h2 class="text-4xl font-extrabold text-orange-500 mb-8">Your Availability</h2>
            <a href="{{ route('availability.create') }}" class="bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-500 hover-scale transition duration-300 mb-6 inline-block">
                Add Availability
            </a>
            <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($availabilities as $availability)
                <li class="bg-gray-800 rounded-lg shadow-lg p-4 hover:shadow-xl transition-transform transform hover:scale-105 border-l-4 border-orange-500">
                    <p class="text-sm text-white">
                        <strong>{{ $availability->start_time->format('d M H:i') }} → {{ $availability->end_time->format('d M H:i') }}</strong>
                    </p>
                    <p class="text-xs text-gray-400">Location: {{ $availability->location }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection