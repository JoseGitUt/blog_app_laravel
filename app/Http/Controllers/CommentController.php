<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    //Get all comments for a post
    public function index($id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404, 'Post no encontrado');
        }

        return response([
            'comments' => $post->comments()->with('user:id,name,image')->get()
        ], 200);
    }

    // Create a comment
    public function store(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response([
                'message' => 'Post not found'
            ], 403);
        }

        $data  = $request->validate([
            'comment' => 'required|string'
        ]);

        Comment::create([
            'comment' => $data['comment'],
            'post_id' => $id,
            'user_id' => auth()->user()->id
        ]);

        return response([
            'message' => 'Comment created'
        ], 200);
    }

    // Update a comment
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response([
                'message' => 'Comment not found'
            ], 403);
        }
        if ($comment->user_id != auth()->user()->id) {
            return response([
                'message' => 'Permission denied'
            ], 403);
        }

        $data  = $request->validate([
            'comment' => 'required|string'
        ]);

        return response([
            'message' => 'Comment updated'
        ], 200);
    }

    // Delete a comment
    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response([
                'message' => 'Comment not found'
            ], 403);
        }
        if ($comment->user_id != auth()->user()->id) {
            return response([
                'message' => 'Permission denied'
            ], 403);
        }

        $comment->delete();
        return response([
            'message' => 'Comment deleted'
        ], 200);
    }
}
