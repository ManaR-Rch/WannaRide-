@extends('layout')

@section('content')
<div class="container mx-auto px-6 py-10 bg-gray-900 text-white">
    <h2 class="text-3xl font-bold text-orange-500 mb-6">
        {{ isset($availability) ? 'Edit' : 'Create' }} Availability
    </h2>

    <form method="POST" action="{{ isset($availability) ? route('availability.update', $availability) : route('availability.store') }}" class="max-w-2xl mx-auto bg-gray-800 rounded-lg shadow-lg p-8">
        @csrf
        @if(isset($availability))
            @method('PUT')
        @endif

        <div class="mb-6">
            <label for="start_time" class="block text-sm font-medium text-orange-400 mb-2">
                Start Time
            </label>
            <input type="datetime-local" id="start_time" name="start_time"
                   value="{{ isset($availability) ? $availability->start_time->format('Y-m-d\TH:i') : old('start_time') }}"
                   class="w-full px-4 py-2 border border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300 bg-gray-700 text-white"
                   required>
            @error('start_time')
                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="end_time" class="block text-sm font-medium text-orange-400 mb-2">
                End Time
            </label>
            <input type="datetime-local" id="end_time" name="end_time"
                   value="{{ isset($availability) ? $availability->end_time->format('Y-m-d\TH:i') : old('end_time') }}"
                   class="w-full px-4 py-2 border border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300 bg-gray-700 text-white"
                   required>
            @error('end_time')
                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="location" class="block text-sm font-medium text-orange-400 mb-2">
                Location
            </label>
            <input type="text" id="location" name="location"
                   value="{{ isset($availability) ? $availability->location : old('location') }}"
                   class="w-full px-4 py-2 border border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300 bg-gray-700 text-white"
                   placeholder="Enter location" required>
            @error('location')
                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="bg-orange-600 text-white px-6 py-3 rounded-lg hover:bg-orange-700 hover-scale transition duration-300">
                {{ isset($availability) ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>
</div>
@endsection