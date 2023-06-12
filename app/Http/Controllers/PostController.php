<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::paginate(5);

        return view('posts.index', ['posts'=> $posts]);
    }

    public function blog()
    {
        $posts = Post::all();

        return view('blog')->with('posts', $posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show')->with([
            'post'=>$post,
            'recent_posts'=>Post::latest()->get()->except($post->id)->take(2)
        ]);

    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with('post', $post);
    }

    public function store(StorePostRequest $request)
    {
        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);
        }

        $post = Post::create([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'part' => $request->part,
            'photo' => $path ?? null
        ]);

        $post->save();

        return redirect()->route('posts.index');
    }

    public function update(StorePostRequest $request, Post $post)
    {
        if ($request->hasFile('photo')){

            if (isset($post->photo)){
                Storage::delete($post->photo);
            }
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);
        }

        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'part' => $request->part,
            'photo' => $path ?? $post->photo
        ]);

        $post->save();

        return redirect()->route('posts.show', ['post'=>$post->id]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
