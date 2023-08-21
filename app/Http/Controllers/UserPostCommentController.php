<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class UserPostCommentController extends Controller
{
    public function index()
    {
		$users = User::all();
		return view('user_post_comment', compact('users'));
    }

    public function getPosts(Request $request)
    {
        $userId = $request->get('user_id');
        $posts = Post::where('user_id', $userId)->get();
        return response()->json(['posts' => $posts]);
    }

    public function getComments(Request $request)
    {
        $postId = $request->get('post_id');
        $comments = Comment::where('post_id', $postId)->get();
        return response()->json(['comments' => $comments]);
    }

    public function processForm(Request $request)
    {
        // Handle form submission and processing here
    }
}
