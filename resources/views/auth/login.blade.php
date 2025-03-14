<x-guest-layout>
    <div class="container mx-auto px-6 py-10 bg-gray-900 text-white">
        <h2 class="text-4xl font-extrabold text-orange-500 mb-8">Login to RideShare</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="bg-gray-800 rounded-lg shadow-lg p-6 border-l-4 border-orange-500">
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-300 mb-2" />
                    <x-text-input id="email" class="w-full px-4 py-2 border border-gray-600 bg-gray-700 text-white rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300"
                                  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="mb-6">
                    <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-300 mb-2" />
                    <x-text-input id="password" class="w-full px-4 py-2 border border-gray-600 bg-gray-700 text-white rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300"
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="flex items-center justify-between mb-6">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-600 bg-gray-700 text-orange-500 shadow-sm focus:ring-orange-500"
                               name="remember">
                        <span class="ml-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-orange-400 hover:text-orange-300 transition duration-300" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="flex justify-center">
                    <x-primary-button class="w-full bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transform hover:scale-105 transition duration-300 font-bold">
                        {{ __('Get Moving') }}
                    </x-primary-button>
                </div>
            </div>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('register') }}" class="text-sm text-orange-400 hover:text-orange-300 transition duration-300">
                {{ __('Need a ride? Sign up now!') }}
            </a>
        </div>
        
        <div class="mt-8 flex justify-center space-x-6">
            <div class="flex items-center text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                    <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H11a2.5 2.5 0 014.9 0H17a1 1 0 001-1v-4a1 1 0 00-.293-.707L14 5.293V4a1 1 0 00-1-1H3z" />
                </svg>
                <span>Quick Rides</span>
            </div>
            <div class="flex items-center text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                </svg>
                <span>Safe Travel</span>
            </div>
            <div class="flex items-center text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                <span>24/7 Support</span>
            </div>
        </div>
    </div>
</x-guest-layout>