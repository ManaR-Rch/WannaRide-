@extends('layout')

@section('content')
<div class="container mx-auto px-6 py-10 bg-gray-900 text-white">
    <h1 class="text-4xl font-extrabold text-orange-500 mb-8">Administrative Management</h1>

    <!-- User Management Section -->
    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-gray-700">
            <h2 class="text-2xl font-bold text-orange-500">User Management</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-orange-700 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Role</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Registration Date</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    @foreach ($users as $user)
                    <tr class="hover:bg-gray-700 transition duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $user->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $user->role }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Trip Statistics Section -->
    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-gray-700">
            <h2 class="text-2xl font-bold text-orange-500">Trip Statistics</h2>
        </div>
        <div class="px-6 py-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-gray-700 p-4 rounded-lg">
                    <p class="text-sm text-gray-300">Total Trips</p>
                    <p class="text-lg font-bold text-white">{{ $totalTrips }}</p>
                </div>
                <div class="bg-gray-700 p-4 rounded-lg">
                    <p class="text-sm text-gray-300">Canceled Trips</p>
                    <p class="text-lg font-bold text-white">{{ $canceledTrips }}</p>
                </div>
                <div class="bg-gray-700 p-4 rounded-lg">
                    <p class="text-sm text-gray-300">Completed Trips</p>
                    <p class="text-lg font-bold text-white">{{ $completedTrips }}</p>
                </div>
                <div class="bg-gray-700 p-4 rounded-lg">
                    <p class="text-sm text-gray-300">Revenue Generated</p>
                    <p class="text-lg font-bold text-white">{{ $revenue }} MAD</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Trip Management Section -->
    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-gray-700">
            <h2 class="text-2xl font-bold text-orange-500">Trip Management</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-orange-700 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Passenger</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Driver</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Departure Time</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Price</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    @foreach ($trips as $trip)
                    <tr class="hover:bg-gray-700 transition duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $trip->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $trip->passenger->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $trip->driver ? $trip->driver->name : 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $trip->departure_time->format('d/m/Y H:i') }}</td>
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
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $trip->price }} MAD</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Driver Availability Section -->
    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-gray-700">
            <h2 class="text-2xl font-bold text-orange-500">Driver Availability</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-orange-700 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Driver</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Start</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">End</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    @foreach ($availabilities as $availability)
                    <tr class="hover:bg-gray-700 transition duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $availability->driver->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $availability->start_time->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $availability->end_time->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection