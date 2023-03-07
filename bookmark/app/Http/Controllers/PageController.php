<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller {

    public function welcome() {
        
        return view('pages/welcome');
    }

    public function contact() {
        return view('pages/contact');
    }

}