<?php

namespace App\Http\Controllers;

class PageController extends Controller {

public function welcome() {
    return view('index', [
        'title' => 'Home Page',
    ]);
}


}