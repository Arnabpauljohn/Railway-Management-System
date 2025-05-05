<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Train;

class AdminController extends Controller {
    public function showRegisterForm() {
        return view('admin.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        return redirect()->route('admin.login')->with('success', 'Admin registered successfully.');
    }
   // For admin login

    public function showLoginForm() {
        return view('admin.login');
    }
    
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            return redirect()->route('admin.dashboard');
        }
    
      //  return back()->withErrors(['email' => 'Invalid credentials']);
      return redirect()->route('admin.password_update')->with('Aceess Denied','Error');
    }
    // Update admin password 

    public function updatePasswordForm() {
        return view('admin.password_update');
    }
    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed'
        ]);
    
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
    
        auth()->user()->update(['password' => Hash::make($request->new_password)]);
    
        return back()->with('success', 'Password updated successfully');
    }
    public function dashboard() {
        // Fetch all trains from the database
        $trains = Train::all();

        // Pass the trains data to the view
        return view('admin.dashboard', compact('trains'));
    }
 
     // PDF or booking slip
    //public function viewBookings()
    // {
    //     $bookings = \App\Models\Booking::with('user')->orderBy('created_at', 'desc')->get();
     //    return view('admin.bookings', compact('bookings'));
    // }
     
     


}
