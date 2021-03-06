<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\Comment;
use App\Models\Post;

use App\Http\Requests\StoreCommentRequest;

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
    public function store(StoreCommentRequest $request): JsonResponse
    {
        $comment = Comment::find($request->comment_id);

        $post = $comment instanceof Comment ? $comment->post : Post::find($request->post_id);

        $comment = Comment::create([
            ...$request->validated(),
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
