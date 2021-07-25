<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function getComment($id)
    {
        $post = Post::with('blogcomments')->find($id);
        return view('posts.show')->with('post', $post);
    }

    // public function store(Post $post)
    // {
    //     $this->validate(request(),[
    //         'body'=>'required|min:2'
    //         ]);
    //     auth()->user()->publish(
    //        new Comment(request(['body','post_id']))
    //         );

    //     return back();
    // }
    // public function store(Request $request)
    // {
    //     $comment = new Comment;

    //     $comment->comment = $request->comment;

    //     $comment->user()->associate($request->user());

    //     $post = Post::find($request->post_id);

    //     $post->comments()->save($comment);

    //     return back();
    // }
    // public function replyStore(Request $request)
    // {
    //     $reply = new Comment();

    //     $reply->comment = $request->get('comment');

    //     $reply->user()->associate($request->user());

    //     $reply->parent_id = $request->get('comment_id');

    //     $post = Post::find($request->get('post_id'));

    //     $post->comments()->save($reply);

    //     return back();

    // }
}
