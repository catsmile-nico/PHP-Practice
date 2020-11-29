<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($username)
    {
        // $user = User::findOrFail($user);
        $username = User::where('username',$username) -> firstOrFail();

        // pass User found to $user variable in view
        return view('home', ['user' => $username,]);
    }
}
