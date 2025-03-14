@extends('layout')

@section('content')
<div class="container mx-auto px-6 py-10 bg-gray-900 text-white">
    <h2 class="text-3xl font-bold text-orange-500 mb-6">Your Availability</h2>

    <a href="{{ route('availability.create') }}" class="inline-block bg-orange-600 text-white px-6 py-3 rounded-lg hover:bg-orange-700 hover-scale transition duration-300 mb-6">
        <i class="fas fa-plus mr-2"></i> Add New Availability
    </a>

    <div class="bg-gray-800 rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-orange-700">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        Start Time
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        End Time
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        Location
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-700">
                @foreach($availabilities as $availability)
                <tr class="hover:bg-gray-700 transition duration-200">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        {{ $availability->start_time->format('M d, Y H:i') }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        {{ $availability->end_time->format('M d, Y H:i') }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        {{ $availability->location }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-4">
                            <a href="{{ route('availability.edit', $availability) }}" class="text-yellow-400 hover:text-yellow-300 hover-scale transition duration-300">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <form action="{{ route('availability.destroy', $availability) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 hover-scale transition duration-300">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection