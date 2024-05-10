<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book= Book::Find($request->id);
        
        $request->validate([

            'evaluation'=>['integer','min:1','max:5'],
            ]);
           // return $book;
        
         if($book){
            $evaluate=new Evaluation();
            $evaluate->book_id=$request->id;
            $evaluate->evaluation=$request->evaluation;
            $evaluate->save();
            return response()->json($evaluate,200);
    }else{
        return response(null,'evaluation faild');
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
