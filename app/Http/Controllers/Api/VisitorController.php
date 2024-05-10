<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\PublicCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\bookResource;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index(){
    $book=bookResource::collection(Book::get());
    //dd($book);
     if($book){

    return $this->apiResponse($book,'ok',200);
     }
     else{return $this->apiResponse(null,'not found',404);
        }
        // $book=Book::all();
       //  return($book);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book=new bookResource(Book::find($id));
        if($book){
            return $this->apiResponse($book,'ok',200);
        }else{return $this->apiResponse(null,'not found',404);}
        
    }
    public function filter(Request $request){
            $request->validate([
             'find'=>['string'],
             ]);
             $pub= PublicCategory::where('name','LIKE','%'.$request->find.'%')->get();
            //  dd($pub);
            $sub= SubCategory::where('name','LIKE','%'.$request->find.'%')->get();
            // //dd($sub);
            if($pub->count()!== 0)  {
                   $category=$this->apiResponse($pub,'ok',200);
                   return $category;
            }elseif($sub){
                $category=$this->apiResponse($sub,'ok',200);
                return $category;
            }else{
               return $this->apiResponse(null,'not found',404);
            }
         
         
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
