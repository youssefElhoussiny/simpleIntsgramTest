<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
       
        $post=$posts[0];
       
        return view('posts.index' , compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**s
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'image'=>['required' , 'image' , 'mimes:png,jpg,gif,jpeg'],
            'description'=>'required',
        ]);
        $image = $request['image']->store('posts' , 'public');
        $data['image'] = $image;
        auth()->user()->posts()->create($data);
        return redirect()->route('create_post');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
        return view('posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edite' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            "image" =>['nullable','image' , "mimes:png,jpg,jpeg,gif"],
            "description"=>['required' , 'string' ]
        ]);
        if($request->has('image'))
        {
            $image = $request['image']->store('posts' , 'public');
            $data['image'] = $image;
        }
        
      $post->update($data);
      return redirect('/p/' . $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Storage::delete('public/'.$post->image);
        $post->delete();
        return redirect('/');
    }

    public function explore()
    {
        
        $posts = Post::whereRelation('owner' , 'private_account' , '=' , 0)
        ->whereNot('user_id' ,auth()->id())
        ->simplepaginate(9);
        // dd($posts->toArray());
        return view('posts.explore' , compact('posts'));
    }
}
