<?php

// app/Http/Controllers/Api/PostController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::all(), 200);
    }

    public function show($id)
    {
        $post = Post::find($id);
        if ($post) {
            return response()->json($post, 200);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = Post::create($validated);
        return response()->json($post, 201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post) {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'body' => 'required|string',
            ]);

            $post->update($validated);
            return response()->json($post, 200);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return response()->json(['message' => 'Post deleted'], 200);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }
}
