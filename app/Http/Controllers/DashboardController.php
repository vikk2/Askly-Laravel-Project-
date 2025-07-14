<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $articles = $user->articles()
            ->latest()
            ->paginate(12); // or ->where('status', 'Published')

        return view('user.dashboard', compact('user', 'articles'));
    }
}
