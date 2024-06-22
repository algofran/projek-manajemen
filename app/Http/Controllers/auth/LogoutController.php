<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
 
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
