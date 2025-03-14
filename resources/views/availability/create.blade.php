@extends('layout')

@section('content')
<div class="container mx-auto px-6 py-10 bg-gray-900 text-white">
    <!-- Form Title -->
    <h2 class="text-3xl font-bold text-orange-500 mb-6">
        {{ isset($availability) ? 'Edit' : 'Create' }} Availability
    </h2>

    <!-- Availability Form -->
    <form method="POST" action="{{ isset($availability) ? route('availability.update', $availability) : route('availability.store') }}" class="max-w-2xl mx-auto bg-gray-800 rounded-xl shadow-lg p-8 border border-gray-700">
        @csrf
        @if(isset($availability))
            @method('PUT')
        @endif

        <!-- Start Time -->
        <div class="mb-6">
            <label for="start_time" class="block text-sm font-medium text-gray-300 mb-2">
                Start Time
            </label>
            <input type="datetime-local" id="start_time" name="start_time" required
                   class="w-full px-4 py-2 border border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300 bg-gray-700 text-white"
                   value="{{ isset($availability) ? $availability->start_time->format('Y-m-d\TH:i') : old('start_time') }}">
            @error('start_time')
                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- End Time -->
        <div class="mb-6">
            <label for="end_time" class="block text-sm font-medium text-gray-300 mb-2">
                End Time
            </label>
            <input type="datetime-local" id="end_time" name="end_time" required
                   class="w-full px-4 py-2 border border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300 bg-gray-700 text-white"
                   value="{{ isset($availability) ? $availability->end_time->format('Y-m-d\TH:i') : old('end_time') }}">
            @error('end_time')
                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Location -->
        <div class="mb-6">
            <label for="location" class="block text-sm font-medium text-gray-300 mb-2">
                Location
            </label>
            <div class="relative">
                <input type="text" id="location" name="location" required
                       class="w-full px-4 py-2 pl-10 border border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300 bg-gray-700 text-white"
                       value="{{ isset($availability) ? $availability->location : old('location') }}">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                </div>
            </div>
            @error('location')
                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit"
                    class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 hover-scale transition duration-300 inline-flex items-center justify-center">
                <i class="fas fa-check mr-2"></i>
                {{ isset($availability) ? 'Update' : 'Create' }} Availability
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