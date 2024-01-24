<?php

namespace App\Http\Controllers;

use App\Events\SelectFriend;
use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function group(){
        return view('group');
    }

    public function settings(){
        return view('settings');
    }
}
