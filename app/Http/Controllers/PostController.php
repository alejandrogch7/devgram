<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostController extends Controller implements HasMiddleware
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['show', 'index']),
        ];
    }
    //
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->paginate(8);

        return view('dashboard',[
            'user' => $user,
            'posts' => $posts
        ]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|max:255',
            'description'=>'required|max:500',
            'image'=>'required'
        ]);

        // One method to create the post
        
        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'image' => $request->image,
        //     'user_id' => Auth::user()->id
        // ]);


        // Another way

        // $post = new Post;
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->image = $request->image;
        // $post->user_id = Auth::user()->id;
        // $post->save();

        // Laravel way
        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('posts.index', Auth::user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'user' => $user,
            'post' => $post
        ]);
    }

    public function destroy(Post $post)
    {
        if(Gate::authorize('delete', $post)){
            $post->delete();
        };

        // delete the image
        $image_path = public_path('uploads/' . $post->image);
        if(File::exists($image_path)){
            unlink($image_path);
        }

        return redirect()->route('posts.index', Auth::user()->username);
    }
}
