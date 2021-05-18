<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request) {
        return Inertia::render('Users/IndexPage', [ 
            'users' => User::all(),
        ]);
    }
}
