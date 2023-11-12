<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
   public function store(Post $post , Request $request)
   {
        $data = $request->validate([
            'body'=>'required'
        ]);
        $data['post_id']=$post->id;
        // $data['user_id']=auth()->id();
        // Comment::create($data);
        auth()->user()->comments()->create($data);
        return back();
   }
}
