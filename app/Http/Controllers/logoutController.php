<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class logoutController extends Controller
{
  public function logout () {
    //logout user
    auth()->logout();
    // redirect to homepage
    return redirect(' ');
}

}
