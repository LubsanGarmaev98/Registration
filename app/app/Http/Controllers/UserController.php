<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use \Illuminate\Routing\Redirector;
use \Illuminate\Http\RedirectResponse;

class UserController extends Controller
{

    public function create(): Factory | View | Application
    {
        return view('auth.register');
    }

    public function store(StoreUserRequest $request): Redirector | Application | RedirectResponse
    {
        $params = $request->validated();
        $user = User::create([
            'name'  => $params['name'],
            'email' => $params['email'],
            'phone' => $params['phone'],
        ]);;

        Auth::login($user);

        return redirect("dashboard");
    }

    public function dashboard(): Factory | View | Application
    {
        return view('dashboard');
    }
}
