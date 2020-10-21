<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct(User $user)     
    {
        $this->user = $user;
    }
    public function index()
    {
        $users = $this->user->get();
        return view('user_admin.index', compact('users'));
    }
}
