<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create',compact('categories'));
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
                'title.required' => 'Post title  is required',
                'category_id.required' => 'Category is required',
                'category_id.categories' => 'Category is not  found',
                'description.required' => 'Post Description  is required',
                
                
                
            ];
            $rules = [
                'title' => 'required',
                'category_id' => 'required|categories:id',
                'description' => 'required'
                
                //'createdBy' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules, $message);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

           

            Post::create($request->all());
            alert()->success('Post Created');

            return redirect()->route('posts.index');

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        try{
            $message = [
                'title.required' => 'Post title  is required',
                'category_id.required' => 'Category is required',
                'category_id.categories' => 'Category is not  found',
                'description.required' => 'Post Description  is required',
                
                
                
            ];
            $rules = [
                'title' => 'required',
                'category_id' => 'required|categories:id',
                'description' => 'required'
                
                //'createdBy' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules, $message);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

           

            $post->title = $request->title;
            $post->category_id = $request->category_id;
            $post->description = $request->description;
            $post->save();
            alert()->success('Post updated');

            return redirect()->route('posts.index');

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        alert()->success('Post Deleted');

        return redirect()->route('posts.index');
    }
}
