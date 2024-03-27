<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role == 'admin') {
            return redirect('/admin/dashboard');
        }
        elseif(auth()->user()->role == 'driver'){
            return redirect('/driver/index');
        }
        elseif(auth()->user()->role == 'passenger'){
            return redirect('/passenger/index');
        }
        else{
            return auth()->logout();
        }
    }
}
