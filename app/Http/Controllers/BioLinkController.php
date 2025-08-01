<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BioLinkController extends Controller
{
    public function __invoke(User $user)
    {
        return view('bio-links', [
            'user' => $user,
        ]);
    }
}
