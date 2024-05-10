<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\PublicCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StorePubCategoryRequest;
use App\Http\Requests\StoreCategoryRequestapp;
class PublicCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicCategories=PublicCategory::with('subCategory')->get();
       
       return view('publicCategory.index',compact('publicCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pubCategory.create');
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePubCategoryRequest $request)
    {
        PublicCategory::create(
            ['name'=>$request->name]
        );
        return redirect()->route('Book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PublicCategory $publicCategory)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublicCategory $publicCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PublicCategory $publicCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublicCategory $publicCategory)
    {
        //
    }

}