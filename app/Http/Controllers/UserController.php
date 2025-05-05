<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class UserController extends Controller {
    public function showRegisterForm() {
        return view('user.register');
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
            'role' => 'user'
        ]);

        return redirect()->route('user.login')->with('success', 'User registered successfully.');
    }
    // For user login

    public function showLoginForm() {
        return view('user.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt(array_merge($credentials, ['role' => 'user']))) {
            return redirect()->route('user.dashboard');
        }
    
        //return back()->withErrors(['email' => 'Invalid credentials']);
        return redirect()->route('user.password_update')->with('Access Denied', 'Error.');
    }
    // Update user password
    
    public function updatePasswordForm() {
        return view('user.password_update');
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
    
        return redirect()->route(view('user.login'))->with('success', 'Password updated successfully');
    }
    public function dashboard() {
       
       return view('user.dashboard');
    }
     

    // Show Logout Confirmation Page
    public function showLogoutConfirm()
    {
        return view('user.logout'); // Loads logout.blade.php
    }

    //user logout
    public function logout(Request $request)
    {
        Auth::logout(); // Logout the user
    
        // Clear session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Redirect to login page after logout
        return redirect()->route('user.login')->with('success', 'You have been logged out successfully.');
    }
    

    
}

