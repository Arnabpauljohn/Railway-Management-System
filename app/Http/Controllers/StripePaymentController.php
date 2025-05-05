<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use App\Models\Train;
use App\Models\Booking;

class StripePaymentController extends Controller
{
    /** Show the Stripe payment page */
    public function stripe($train_no)
    {
        $train = Train::where('train_no', $train_no)->firstOrFail();
        return view('user.stripe', compact('train'));
    }

    /** Process Stripe payment */
   // In StripePaymentController's stripePost() method
   public function stripePost(Request $request)
   {
       \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
   
       try {
           $train_no = $request->train_no;
           $train = Train::where('train_no', $train_no)->firstOrFail();
   
           // No need to validate from_city and to_city as they're part of the train data
           $from_city = $train->from_city;
           $to_city = $train->to_city;
   
           // Proceed with payment processing
           \Stripe\Charge::create([
               "amount" => $train->prize * 100,
               "currency" => "usd",
               "source" => $request->stripeToken,
               "description" => "Payment for Train Ticket"
           ]);
   
           // After successful payment, save the booking
           $booking = new Booking();
           $booking->user_id = auth()->user()->id;
           $booking->train_no = $train_no;
           $booking->from_city = $from_city;
           $booking->to_city = $to_city;
           $booking->departure_time = $train->departure_time;
           $booking->arrival_time = $train->arrival_time;
           $booking->ticket_price = $train->prize;
           $booking->payment_status = 'paid';
           $booking->payment_id = $request->payment_id;
           $booking->save();

        
            if ($train->name > 0) {
                $train->decrement('name');
            }

   
           return redirect()->route('stripe', ['train_no' => $train_no])->with('success', 'Payment successful!');
       } catch (\Exception $e) {
           \Log::error('Error: ' . $e->getMessage());  // Log the error
           return redirect()->route('stripe', ['train_no' => $train_no])->with('error', 'Payment failed! ' . $e->getMessage());
       }
   }
   
}

   

