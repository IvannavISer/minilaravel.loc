<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminController extends Controller
{
    public function show(){
        if(!Auth::check()){
            return redirect('/login');
        }
        $user = Auth::user();
        dump($user);
        return view('welcome');
    }
}
