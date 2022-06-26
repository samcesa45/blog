<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
          $posts =  Post::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString();
          $categories = Category::all();
          $currentCategory=Category::where('slug',request('category'))->first();
    
   
   
    return view('posts.index')->with(['posts'=> $posts,'categories'=> $categories,'currentCategory'=>$currentCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
           $request->validate([
                    'title'=>'required',
                    'image' =>'required|mimes:jpg,png,jpeg|max:5048',
                    'slug' => ['required',Rule::unique('posts','slug')],
                    'excerpt'=>'required',
                    'body'=>'required',
                    'category_id'=>['required',Rule::exists('categories','id')]
                ]);

    //   $path = $request->file('thumbnail')->store('thumbnails');
       $path = time() . '-' . $request->name . '.' .
        $request->image->extension();

       $request->image->move(public_path('images'),$path);
    
        Post::create([
                'user_id'=>auth()->user()->id,
                'title'=>$request->input('title'),
                'slug'=>$request->input('slug'),
                'excerpt'=>$request->input('excerpt'),
                'body'=>$request->input('body'),
                'category_id'=>$request->input('category_id'),
                'image_path'=>$path,
            ]);
        
       
       return redirect('/');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
         return view('posts.show',[
        'post'=>$post
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
