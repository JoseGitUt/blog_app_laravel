<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class LikeController extends Controller
{
    // Like or unlike
    public function likeOrUnlike($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response([
                'message' => 'Post not found'
            ], 404);
        }

        $like = $post->likes()->where('user_id', auth()->user()->id)->first();

        // Si el usuario ya dio like, se elimina (unlike)
        if ($like) {
            $like->delete();
            return response([
                'message' => 'Disliked'
            ], 200);
        }

        // Si no ha dado like, se crea el registro
        Like::create([
            'post_id' => $id,
            'user_id' => auth()->user()->id
        ]);

        return response([
            'message' => 'Liked'
        ], 200);
    }
}
