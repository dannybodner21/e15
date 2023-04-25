<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class PracticeController extends Controller
{
    /**
     * First practice example
     * GET /practice/1
     */
    public function practice1()
    {
        dump('This is the first example.');
    }

    public function practice2()
    {
       dump(DB::select('SHOW DATABASES;'));
    }

    public function practice3()
    {
       $book = new Book();
       $books = $book->where('title', 'LIKE', '%Harry Potter%')->get();

       //dump($books);

       //dump(Book::where('title', 'LIKE', '%Harry Potter%')->first());

       $books = Book::where('author', 'LIKE', '%Rowling%')->get();
        foreach($books as $book) {
            dump($book->title);
        }
    }

    public function practice4()
    {

        $book = new Book();
        //Retrieve the last 2 books that were added to the books table.
        $result1 = $book->oldest(2);
        
        //Retrieve all the books published after 1950.
        $restult2 = Book::where('published_year', '>', 1950)->get();

        //Retrieve all the books in alphabetical order by title.


        //Retrieve all the books in descending order according to published year.


        //Find any books by the author “J.K. Rowling” and update the author name to be “JK Rowling”
        
        
        //Remove any/all books with an author name that includes the string “Rowling”.

        
    }

    public function practice5()
    {
        $books = Book::all();
        echo $books;
    }


    /**
     * ANY (GET/POST/PUT/DELETE)
     * /practice/{n?}
     * This method accepts all requests to /practice/ and
     * invokes the appropriate method.
     * http://bookmark.yourdomain.com.loc/practice => Shows a listing of all practice routes
     * http://bookmark.yourdomain.com.loc/practice/1 => Invokes practice1
     * http://bookmark.yourdomain.com.loc/practice/5 => Invokes practice5
     * http://bookmark.yourdomain.com.loc/practice/999 => 404 not found
     */
    public function index(Request $request, $n = null)
    {
        $methods = [];

        # Load the requested `practiceN` method
        if (!is_null($n)) {
            $method = 'practice' . $n; # practice1

            # Invoke the requested method if it exists; if not, throw a 404 error
            return (method_exists($this, $method)) ? $this->$method($request) : abort(404);
        } # If no `n` is specified, show index of all available methods
        else {
            # Build an array of all methods in this class that start with `practice`
            foreach (get_class_methods($this) as $method) {
                if (strstr($method, 'practice')) {
                    $methods[] = $method;
                }
            }

            # Load the view and pass it the array of methods
            return view('practice')->with(['methods' => $methods]);
        }
    }
}