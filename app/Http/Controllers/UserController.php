<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    final $paginate = 10;
    final $orderBy = 'display_name';
    final $direction = 'DESC';

    public function index(Request $request) {
        $users = User::orderBy($this->orderBy, $this->direction)->paginate($this->paginate);
        return Inertia::render('Users/IndexPage', [ 
            'users' => $users,
        ]);
    }

    public function create(Request $request) {
        return Inertia::render('Users/CreatePage');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:60',
            'email' => 'required|string|max:60|min:6|unique:users,email',
            'password' => 'required|string|max:60|min:8|confirmed',
        ])->validate();
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        return redirect()->route('users.index')->with('message', ['success','Usuario creado correctamente.']);
    }
}
