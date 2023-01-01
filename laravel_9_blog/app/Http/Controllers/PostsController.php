<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }



    public function index()
    {           
        return view('blog.index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    
    public function create()
    {
        return view('blog.create');
    }

    
    public function store(Request $request)
    {
        // dd($request);       
            $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid(). '-'. $request->title. '.'.
        $request->image->extension();
        // dd($newImageName);

        $request->image->move(public_path('assets/img'), $newImageName);

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'Your post has been added!');
    }

    
    public function show($slug)         // ===  ☣  $slug is essentiell here!, normal per default $id   ☢   ===
    {
        return view('blog.show')
            ->with('post', Post::where('slug', $slug)->first());
    }

    
    public function edit($slug)         // ===  ☣  $slug is essentiell here!, normal per default $id   ☢   ===
    {
        return view('blog.edit')
            ->with('post', Post::where('slug', $slug)->first());
    }

    
    public function update(Request $request, $slug)         // ===  ☣  $slug is essentiell here!, normal per default $id   ☢   ===
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                'user_id' => auth()->user()->id
            ]);
        
        return redirect('/blog')
                ->with('message', 'Your post has been updated!');
    }

    
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')
                ->with('message', 'Your post has been deleted!');
    }
}
