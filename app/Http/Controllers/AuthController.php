<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // or any protected route
        }

        return back()->withErrors([
            'email' => 'Email or password is incorrect.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showRegisterForm(){
        return view('sign-up');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'string', 'max:191', 'unique:users,username'],
            'password' => ['required', 'confirmed', 'min:6'],
            'terms' => ['accepted'],
        ]);

        $user = User::create([
            'firstName' => $request->first_name,
            'lastName' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
            'password_hash' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/'); // or wherever you want to send them
    }

    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'status' => 'required|in:Draft,Published',
            'visibility' => 'required|in:public,private',
            'image_url' => 'nullable|image|max:5120',
            'comments_allowed' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image_url')) {
            // delete old image if exists
            if ($article->image_url) {
                Storage::disk('public')->delete($article->image_url);
            }

            $data['image_url'] = $request->file('image_url')->store('articles', 'public');
        }

        $data['comments_allowed'] = $request->has('comments_allowed');

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

}
