<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends ParentController
{
    /**
     * Home
     */
    public function index()
    {
        $response['user']=Auth::user();
        return view('pages.user.view')->with($response);
    }
}
