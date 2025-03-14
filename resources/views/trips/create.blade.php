@extends('layout')

@section('content')
<div class="container mx-auto px-6 py-10 bg-gray-900 text-white">
    <!-- Form Title -->
    <h2 class="text-3xl font-bold text-orange-500 mb-6">Book a Trip</h2>

    <!-- Booking Form -->
    <form method="POST" action="{{ route('trips.store') }}" class="max-w-2xl mx-auto bg-gray-800 rounded-xl shadow-lg p-8 border border-gray-700">
        @csrf

        <!-- Hidden Driver ID Field -->
        @if(request()->has('driver_id'))
            <input type="hidden" name="driver_id" value="{{ request('driver_id') }}">
        @endif

        <!-- Pickup Location -->
        <div class="mb-6">
            <label for="pickup_location" class="block text-sm font-medium text-gray-300 mb-2">
                Pickup Location
            </label>
            <div class="relative">
                <input type="text" id="pickup_location" name="pickup_location" required
                      class="w-full px-4 py-2 pl-10 border border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300 bg-gray-700 text-white"
                      placeholder="Enter pickup location">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                </div>
            </div>
            @error('pickup_location')
                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Destination -->
        <div class="mb-6">
            <label for="destination" class="block text-sm font-medium text-gray-300 mb-2">
                Destination
            </label>
            <div class="relative">
                <input type="text" id="destination" name="destination" required
                      class="w-full px-4 py-2 pl-10 border border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300 bg-gray-700 text-white"
                      placeholder="Enter destination">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-location-arrow text-gray-400"></i>
                </div>
            </div>
            @error('destination')
                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Departure Time -->
        <div class="mb-6">
            <label for="departure_time" class="block text-sm font-medium text-gray-300 mb-2">
                Departure Time
            </label>
            <div class="relative">
                <input type="datetime-local" id="departure_time" name="departure_time" required
                      class="w-full px-4 py-2 pl-10 border border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300 bg-gray-700 text-white">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-clock text-gray-400"></i>
                </div>
            </div>
            @error('departure_time')
                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price -->
        <div class="mb-6">
            <label for="price" class="block text-sm font-medium text-gray-300 mb-2">
                Price
            </label>
            <div class="relative">
                <input type="number" step="0.01" id="price" name="price" required
                      class="w-full px-4 py-2 pl-10 border border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300 bg-gray-700 text-white"
                      placeholder="Enter price">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-dollar-sign text-gray-400"></i>
                </div>
            </div>
            @error('price')
                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit"
                    class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 hover-scale transition duration-300 inline-flex items-center justify-center">
                <i class="fas fa-car-side mr-2"></i>
                Book Trip
            </button>
        </div>
    </form>
</div>

<style>
    .hover-scale {
        transition: transform 0.2s ease-in-out;
    }
    .hover-scale:hover {
        transform: scale(1.05);
    }
</style>
@endsection