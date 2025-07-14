<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordResetLinkController extends Controller
{
    public function create(){
        return view('auth.forgot-password');
    }

    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users']);

        $token = Str::random(60);

        // Remove old tokens
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        DB::table("password_reset_tokens")->insert([
            "email" => $request->email,
            "token" => $token,
            "created_at" => now(),
        ]);

        $resetUrl = url('/reset-password/' . $token) . '?email=' . urlencode($request->email);

        // Send email
        Mail::send('forgot-pass-template', ['resetUrl' => $resetUrl], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Your Password');
        });
        // Redirect with status message
        return redirect()->route('password.sent');
    }

    public function showLinkReset($token, Request $request)
    {
        $email = $request->query('email');
        return view('auth.reset-password', compact('token', 'email'));
    }

        public function storeNewPass(Request $request){
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        // ✅ 1. Retrieve the reset record properly
        $reset = DB::table("password_reset_tokens")
            ->where("email", $request->email)
            ->where("token", $request->token) // Plaintext match
            ->first();

        if (!$reset) {
            return back()->withErrors(['token' => 'Invalid or expired reset link.']);
        }

        // ✅ 2. Find the user
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'No user found.']);
        }

        // ✅ 3. Update password
        $user->password = Hash::make($request->password);
        $user->save();

        // ✅ 4. Delete the token
        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where("token", $request->token)
            ->delete();

        // ✅ 5. Redirect to login page with success message
        return redirect()->route('login')->with('status', 'Password reset link has been sent!');
    }
}
