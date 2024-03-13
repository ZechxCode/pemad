<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->is_admin) {

            return redirect(route('admin.dashboard'));
        } else {
            return redirect(route('client.dashboard'));
        }

        // if (Auth::user()->is_admin) {
        //     # code...
        //     return 'Kamu Admin';
        // } else {
        //     return 'Kamu Client';
        // }
    }
}
