<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileController extends Controller
{
    use AuthorizesRequests;
    public function show()
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    public function edit($username){
        $user = User::where('username', $username)->firstOrFail();

        // Optional: Ensure the logged-in user matches the profile user
        $this->authorize('update', $user);

        return view('user.edit', compact('user'));        
    }

    public function update(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $this->authorize('update', $user);

        $data = $request->validate([
            'firstName' => 'required|string|max:191',
            'lastName'  => 'required|string|max:191',
            'email'      => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'username'   => 'required|string|unique:users,username,' . $user->user_id . ',user_id',
            'bio'        => 'nullable|string|max:160',
            'profile_picture' => 'nullable|image|max:2048',
            'expertise' => 'nullable|string',
        ]);

        // Handle file upload
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $path = $file->store('profile_pictures', 'public');

            // Update user profile_picture_url
            $data['profile_picture_url'] = '/storage/' . $path;
        }

        if (isset($data['expertise'])) {
            $data['expertise'] = collect(explode(',', $data['expertise']))
                ->map(fn($e) => trim($e))
                ->filter()
                ->unique()
                ->values()
                ->toArray();
        } else {
            $data['expertise'] = [];
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Profile updated!');
    }
}
