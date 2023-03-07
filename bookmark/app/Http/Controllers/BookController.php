<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller {

public function index() {
    dd(config('app.timezone'));
    return 'Showing all books...';
}

public function show($title) {
    $bookFound = true;
    return view('books/show', [
        'title' => $title,
    ]);
}


}