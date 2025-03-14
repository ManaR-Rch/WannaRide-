<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Exception\CardException;
use App\Models\Trip;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function showPaymentForm($trip_id, $price)
    {
        return view('payment', [
            'trip_id' => $trip_id,
            'price' => $price,
        ]);
    }
    private function getCardErrorMessage($declineCode)
    {
                return 'Your card was declined.';
        
    }

    public function processPayment(Request $request)
    {
        
        $validated = $request->validate([
            'price' => 'required|numeric|min:1',
            'stripeToken' => 'required|string',
            'trip_id' => 'required|exists:trips,id',
        ]);
    
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
    
        try {
           
            $charge = \Stripe\Charge::create([
                'amount' => $validated['price'] * 100, 
                'currency' => 'MAD',
                'source' => $validated['stripeToken'],
                'description' => 'Trip Booking Payment',
            ]);
    
            // Retrieve trip
            $trip = Trip::findOrFail($validated['trip_id']);
    
            // Store payment record
            Payment::create([
                'trip_id' => $trip->id,
                'passenger_id' => $trip->passenger_id,
                'driver_id' => $trip->driver_id,
                'amount' => $validated['price'],
                'currency' => 'MAD',
                'stripe_payment_intent_id' => $charge->id,
                'status' => 'passed',
            ]);
    
            return redirect()->route('dashboard')->with('success', 'Payment successful!');
    
        } catch (\Stripe\Exception\CardException $e) {
            return back()->withErrors(['error' => 'Payment failed: ' . $e->getMessage()]);
    
        } catch (\Exception $e) {
            \Log::error('Payment Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An unexpected error occurred. Please try again.']);
        }
    }
    

  
}