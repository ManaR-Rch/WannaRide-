<x-guest-layout>
    <div class="container mx-auto px-6 py-10 bg-gray-900 text-white">
        <h2 class="text-4xl font-extrabold text-orange-500 mb-8">Register</h2>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="bg-gray-800 rounded-lg shadow-lg p-6">
                <div class="mb-6">
                    <x-input-label for="name" :value="__('Name')" class="block text-sm font-medium text-gray-300 mb-2" />
                    <x-text-input id="name" class="w-full px-4 py-2 border border-gray-600 bg-gray-700 text-white rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300"
                                  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-300 mb-2" />
                    <x-text-input id="email" class="w-full px-4 py-2 border border-gray-600 bg-gray-700 text-white rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300"
                    type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="mb-6">
                    <x-input-label for="phone" :value="__('Phone Number')" class="block text-sm font-medium text-gray-300 mb-2" />
                    <x-text-input id="phone" class="w-full px-4 py-2 border border-gray-600 bg-gray-700 text-white rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300"
                                  type="text" name="phone" :value="old('phone')" autocomplete="tel" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="mb-6">
                    <x-input-label for="role" :value="__('Register As')" class="block text-sm font-medium text-gray-300 mb-2" />
                    <select id="role" name="role" class="w-full px-4 py-2 border border-gray-600 bg-gray-700 text-white rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300" required>
                        <option value="passenger" {{ old('role') == 'passenger' ? 'selected' : '' }}>Passenger</option>
                        <option value="driver" {{ old('role') == 'driver' ? 'selected' : '' }}>Driver</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="mb-6">
                    <x-input-label for="profile_photo" :value="__('Profile Photo')" class="block text-sm font-medium text-gray-300 mb-2" />
                    <input id="profile_photo" class="w-full px-4 py-2 border border-gray-600 bg-gray-700 text-white rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-orange-100 file:text-orange-700 hover:file:bg-orange-200"
                           type="file" name="profile_photo" accept="image/*" />
                    <x-input-error :messages="$errors->get('profile_photo')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="mb-6">
                    <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-300 mb-2" />
                    <x-text-input id="password" class="w-full px-4 py-2 border border-gray-600 bg-gray-700 text-white rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300"
                                  type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-medium text-gray-300 mb-2" />
                    <x-text-input id="password_confirmation" class="w-full px-4 py-2 border border-gray-600 bg-gray-700 text-white rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300"
                                  type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="flex justify-center">
                    <x-primary-button class="w-full bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition duration-300">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </div>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-sm text-orange-400 hover:text-orange-300 transition duration-300">
                {{ __('Already have an account?') }}
            </a>
        </div>
    </div>
</x-guest-layout>