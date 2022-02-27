<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Validator;

use App\Models\Comment;
use App\Models\Post;

use App\Http\Resources\CommentResource;

use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        return response()->json(
            CommentResource::collection(Comment::all())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $payload = $request->only((new Comment())->getFillable());

        $validator = Validator::make($payload, [
            'post_id' => 'sometimes|exists:posts,id',
            'comment_id' => 'sometimes|exists:comments,id',
            'user_id' => 'required|exists:users,id',
            'text' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => json_decode($validator->errors()->toJson())
            ], Response::HTTP_BAD_REQUEST)->setEncodingOptions(JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }

        $comment = Comment::find($request->comment_id);

        $post = $comment instanceof Comment ? $comment->post :  Post::find($request->post_id);

        $comment = Comment::create([
            ...$payload,
            'post_id' => $post->id
        ]);

        return response()->json(new CommentResource($comment), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment): JsonResponse
    {
        return response()->json(
            new CommentResource($comment)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment): JsonResponse
    {
        return response()->json([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment): JsonResponse
    {
        return response()->json([]);
    }
}
