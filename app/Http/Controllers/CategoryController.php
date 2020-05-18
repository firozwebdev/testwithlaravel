<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $message = [
                'name.required' => 'Category is required',
                'name.max' => 'Category is too long',
                
                
            ];
            $rules = [
                'name' => 'required|max:100',
                
                
                //'createdBy' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules, $message);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

           

            Category::create($request->all());
            alert()->success('User Created');
           

            //return redirect()->route('categories.index')->with('message',"Category Created");

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        
        try{
            $message = [
                'name.required' => 'Category is required',
                'name.max' => 'Category is too long',
                
                
            ];
            $rules = [
                'name' => 'required|max:100',
                
                
                //'createdBy' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules, $message);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

           

            $category->name = $request->name;
            $category->save();
            alert()->success('Category Updated');

            return redirect()->route('categories.index');

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
         alert()->success('Category Deleted');

        //return redirect()->route('categories.index')->with('message',"Category Deleted");
    }
}
