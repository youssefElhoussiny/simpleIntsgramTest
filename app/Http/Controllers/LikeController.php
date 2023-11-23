<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->likes()->toggle($post);
        return back();
    }


    // public function like(Post $post)
    // {
    //     if(!$post->likes()->where('user_id' ,auth()->id())->first())
    //     {
    //         // $post->likes()->create(['user_id'=>auth()->id()]);
    //         // $post->likes()->attach(auth()->id());
    //         Like::create(['post_id'=>$post->id,'user_id'=>auth()->id()]);
    //     }else
    //     {
    //         // dd($post->likes()->where('user_id',auth()->id())->first());
    //         $like=Like::where('user_id',auth()->id())
    //         ->where('post_id' , $post->id)
    //         ->first();
    //         $like->delete();
    //     }
    //     return back();
    // }
}
