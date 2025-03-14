@extends('layout')

@section('content')
<div class="bg-gray-900 text-white py-8">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-6 text-center text-orange-500">Complete Your Payment</h2>

        @if ($errors->any())
        <div class="mb-6 max-w-2xl mx-auto">
            <div class="bg-red-800 border border-red-600 text-red-300 px-4 py-3 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <div class="max-w-2xl mx-auto bg-gray-800 rounded-lg shadow-lg p-8 border border-gray-700">
            <div class="mb-8">
                <h3 class="text-xl font-semibold mb-4 text-orange-400">Payment Details</h3>
                <div class="bg-gray-700 p-4 rounded-lg">
                    <p class="text-gray-300"><span class="font-medium text-gray-100">Trip ID:</span> {{ $trip_id }}</p>
                    <p class="text-gray-300"><span class="font-medium text-gray-100">Amount:</span> ${{ number_format($price, 2) }}</p>
                </div>
            </div>

            <form action="{{ route('payment.process') }}" method="POST" id="payment-form">
                @csrf
                <input type="hidden" name="stripeToken" id="stripeToken">
                <input type="hidden" name="trip_id" value="{{ $trip_id }}">
                <input type="hidden" name="price" value="{{ $price }}">

                <div class="mb-6">
                    <label for="card-element" class="block text-sm font-medium text-gray-300 mb-2">
                        Credit or Debit Card
                    </label>
                    <div id="card-element" class="w-full px-4 py-3 border border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300 bg-gray-700">
                        </div>
                    <div id="card-errors" role="alert" class="text-sm text-red-400 mt-2"></div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" id="submit-button" class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition duration-300 flex items-center hover-scale">
                        <span id="button-text">Pay Now</span>
                        <span id="button-spinner" class="ml-2 hidden">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ config('services.stripe.key') }}');
    var elements = stripe.elements();

    
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    var card = elements.create('card', { style: style });
    card.mount('#card-element');

    
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    
    var form = document.getElementById('payment-form');
    var submitButton = document.getElementById('submit-button');
    var buttonSpinner = document.getElementById('button-spinner');
    var buttonText = document.getElementById('button-text');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

       
        submitButton.disabled = true;
        buttonText.classList.add('hidden');
        buttonSpinner.classList.remove('hidden');

        stripe.createToken(card).then(function(result) {
            if (result.error) {
               
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;

              
                submitButton.disabled = false;
                buttonText.classList.remove('hidden');
                buttonSpinner.classList.add('hidden');
            } else {
                
                document.getElementById('stripeToken').value = result.token.id;
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
@endsection