<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
        
    // Controller: BookingController.php
    public function showBookingSlip()
    {
        $user = auth()->user(); // Get logged-in user
        $booking = Booking::where('user_id', $user->id)
                          ->where('payment_status', 'paid')
                          ->latest()
                          ->first();
    
        if ($booking) {
            return view('booking.pdf', compact('booking'));
        } else {
            return redirect()->route('bookings')->with('error', 'No valid booking slip available.');
        }
    }
    

    // Download booking slip as PDF
    // PDF download logic
    public function downloadBookingSlip($booking_id)
    {
        $booking = Booking::find($booking_id);

        if ($booking && $booking->payment_status === 'paid') {
            $pdf = Pdf::loadView('booking.pdf', ['booking' => $booking, 'pdf' => true]);
            return $pdf->download('booking-slip-' . $booking->id . '.pdf');

        } else {
            return redirect()->route('bookings')->with('error', 'Payment not successful, cannot download booking slip.');
        }
    }


    // Check booking status before redirecting to download page
    public function checkBookingStatus($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return redirect()->route('dashboard')->with('error', 'No booking found.');
        }

        if ($booking->payment_status === 'paid') {
            // If payment is complete, redirect to the PDF download route
            return redirect()->route('download.booking', $booking->id);
        } else {
            // If payment is pending, redirect back with an error
            return redirect()->route('dashboard')->with('error', 'Payment is pending. Please complete the payment before downloading the slip.');
        }
    }
    
    public function handleStripePayment(Request $request)
    {
        try {
            $stripeToken = $request->input('stripeToken');
    
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $request->input('amount') * 100,
                'currency' => 'usd',
                'payment_method' => $stripeToken,
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);
    
            if ($paymentIntent->status === 'succeeded') {
                // Fetch the booking record
                $booking = Booking::find($request->input('booking_id'));
    
                if (!$booking) {
                    return redirect()->route('stripe')->with('error', 'Booking not found.');
                }
    
                // Update payment status
                $booking->payment_status = 'paid';
                $booking->payment_id = $paymentIntent->id;
                $booking->save();
    
                // Debugging: Check if booking_id exists
                \Log::info('Booking ID:', ['booking_id' => $booking->id]);
    
                // Store booking ID in session and redirect
                return redirect()->route('stripe.show')->with([
                    'success' => 'Payment Successful!',
                    'booking_id' => $booking->id
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->route('stripe')->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
    
    public function showStripeForm(Request $request)
    {
        $booking = Booking::where('user_id', auth()->id())->latest()->first();
    
        return view('stripe', compact('booking'));
    }

    public function generateBookingSlipPdf($booking_id)
    {
        $booking = Booking::find($booking_id);
        
        // Load the PDF view
        $pdf = PDF::loadView('booking.pdf', compact('booking'));
        
        // Download the PDF file with a custom name
        return $pdf->download('booking-slip-' . $booking->id . '.pdf');
    }
    
    

}
