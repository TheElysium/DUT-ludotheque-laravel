<?php

namespace App\Http\Controllers;


use App\Models\User;

class HomeController extends Controller
{


    /**
     * home Page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        return view('home.index', ['users' => $users]);
    }
}
