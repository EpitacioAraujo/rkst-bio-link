<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        /** @var User $user */
        $user = Auth::user();

        $links = $user->links()->orderBy('order', 'desc')->get();

        return view('dashboard', [
            'user' => $user,
            'links' => $links
        ]);
    }
}
