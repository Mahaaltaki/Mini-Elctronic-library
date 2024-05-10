<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\PublicCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Controllers\RoleController;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth') ;
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $books = Book::with(['public_categories'])->get();

        $list_Books = Book::all();
       // dd($books);
    
        return view('books.books',compact('list_Books'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sub_categories=SubCategory::all();
        //dd($sub_categories);
        return view('books.createBook',compact('sub_categories'));

    }
     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
                'sub_category_id'=>'required|exists:sub_categories,id'
        ]);
        $book=new Book();
        $book->name=$request->name;
        $book->sub_id=$request->sub_category_id;
        $book->save();
        // Book::create(
        //     ['name'=>$book->name,
        // ]
        // );
       return redirect()->route('Book.index');
    }
     /**
      * 
     * Display the specified resource.
     */
    public function show(Book $book)
    {
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
