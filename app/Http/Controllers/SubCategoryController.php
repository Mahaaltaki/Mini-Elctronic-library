<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\PublicCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories=subCategory::all();
       dd($subCategories);
        return view('subcategory.create',compact('subCategories'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { $pubcategories=PublicCategory::all();
        //dd($sub_categories);
        return view('subcategory.create',compact('pubcategories'));

   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name'=>'required|string',
                'category_id'=>'required|exists:sub_categories,id'
        ]);
        $sub=new SubCategory();
        //dd($sub);
        $sub->name=$request->name;
        $sub->pub_id=$request->category_id;
        //dd($sub);
         $sub->save();
        return redirect()->route('Book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
