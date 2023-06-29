<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function editAllUsers()
    {
        $users = User::get();
        return view('users', compact('users'));
    }

    public function editUser(Request $request, User $user)
    {

        return view('edit', compact('user'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function update(Request $request, User $user)
    {
//        Приходит просто пользователь, нужно поменять у него данные
        $frd = $request;
        $user->update([
            'name'=>$frd['name']?? '',
            'email' => $frd['email']?? '',
            'password' => $frd['password']?? ''
        ]);
        $user->save();
        return view('dashboard');
    }
}
