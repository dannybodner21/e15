<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    /**
    * GET /books/create
    * Display the form to add a new book
    */
    public function create(Request $request)
    {
        $authors = Author::orderBy('last_name')->select(['id', 'first_name'])->get();
        return view('books/create', [
            'authors' => $authors,
        ]);
    }

    /**
    * POST /books
    * Process the form for adding a new book
    */
    public function store(Request $request)
    {
        # Validate the request data
        # The `$request->validate` method takes an array of data
        # where the keys are form inputs
        # and the values are validation rules to apply to those inputs
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:books,slug',
            'author' => 'required',
            'published_year' => 'required|digits:4',
            'cover_url' => 'url',
            'info_url' => 'required|url',
            'purchase_url' => 'required|url',
            'description' => 'required|min:255'
        ]);

        # Note: If validation fails, it will automatically redirect the visitor back to the form page
        # and none of the code that follows will execute.

        $book = new Book();
        $book->title = $request->title;
        $book->slug = $request->slug;
        //$book->author = $request->author;
        $book->author_id = $request->author_id;
        $book->published_year = $request->published_year;
        $book->cover_url = $request->cover_url;
        $book->info_url = $request->info_url;
        $book->purchase_url = $request->purchase_url;
        $book->description = $request->description;
        $book->save();

        return redirect('/books/create')->with(['flash-alert' => 'Your book was added.']);
    }

    /**
    * GET /search
    * Show search results
    */
    public function search(Request $request)
    {
        $request->validate([
            'searchTerms' => 'required|alpha_num',
            'searchType' => 'required'
        ]);

        # If validation fails it will redirect back to `/`

        $bookData = file_get_contents(database_path('books.json'));
        $books = json_decode($bookData, true);

        $searchType = $request->input('searchType', 'title');
        $searchTerms = $request->input('searchTerms', '');
        $searchResults = [];
    
        foreach ($books as $slug => $book) {
            if (strtolower($book[$searchType]) == strtolower($searchTerms)) {
                $searchResults[$slug] = $book;
            }
        }

        # Redirect back to the form with data/results stored in the session
        # Ref: https://laravel.com/docs/responses#redirecting-with-flashed-session-data
        return redirect('/')->with([
            'searchResults' => $searchResults
        ])->withInput();
    }

    /**
     * GET /books
     * Show all the books
     */
    public function index()
    {
        ### PREVIOUS CODE FOR JSON FILE
        # Load book data using PHP’s file_get_contents
        # We specify the books.json file path using Laravel’s database_path helper
        #$bookData = file_get_contents(database_path('books.json'));

        # Convert the string of JSON text loaded from books.json into an
        # array using PHP’s built-in json_decode function
        #$books = json_decode($bookData, true);

        # Alphabetize the books by title using Laravel’s Arr::sort
        #$books = Arr::sort($books, function ($value) {
            #return $value['title'];
        #});

        ### CODE FOR DATABASE
        $books = Book::orderBy('title', 'ASC')->get();
    
        return view('books/index', ['books' => $books]);
    }

    /**
     * GET /books/{slug}
     * Show an individual book searching by slug
     */
    public function show($slug)
    {
        ### PREVIOUS CODE FOR JSON FILE
        # Load book data
        # @TODO: This code is redundant with loading the books in the index method
        #$bookData = file_get_contents(database_path('books.json'));
        #$books = json_decode($bookData, true);

        # Narrow down array of books to the single book we’re loading
        #$book = Arr::first($books, function ($value, $key) use ($slug) {
            #return $key == $slug;
        #});

        ### CODE FOR DATABASE
        $book = Book::where('slug', '=',  $slug)->first();

        return view('books/show', [
            'book' => $book
        ]);
    }

    /**
     * GET /books/filter/{category}/{subcategory}
     * Filter method that was demonstrate working with multiple route parameters
     */
    public function filter($category, $subcategory)
    {
        return 'Show all books in these categories: ' . $category . ',' . $subcategory;
    }
}