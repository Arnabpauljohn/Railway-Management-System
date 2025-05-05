<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    // Show the form to request a password reset link
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Send password reset link
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $response = Password::sendResetLink(
            $request->only('email')
        );

        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('status', 'We have emailed your password reset link!');
        } else {
            return back()->withErrors(['email' => 'We couldn’t find a user with that email address.']);
        }
    }

    // Show the password reset form
    public function showResetForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    // Reset the user's password
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required',
        ]);

        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => bcrypt($request->password)
                ])->save();
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('user.login')->with('status', 'Your password has been reset!');
        } else {
            return back()->withErrors(['email' => 'Invalid token or email.']);
        }
    }
}
