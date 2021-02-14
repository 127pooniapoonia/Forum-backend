<?php

namespace App\Modules\Posts\Controllers\v1;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            //put fields to be validated here
        ]);

        $comment= new Comment();
        $comment->user_id= $request['userId'];
        $comment->post_id = $request['type'];
        $comment->description = $request['comment'];

        $comment->save();
        return redirect('/data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $Comment = Comment::find(id);
        $Comment->delete();
        return redirect('/data');
    }
    public function userComment(Request $request)
    {
        $this->validate(request(),[
            //put fields to be validated here
        ]);

        $comment= new Comment();
        $comment->user_id= $request['user_id'];
        $comment->post_id = $request['post_id'];
        $comment->description = $request['comment'];

        $comment->save();
        return response()->json(["success" => true]);
    }
    public function deleteComment(Comment $comment,$id=null)
    {
        $Comment = Comment::find($id);
        $Comment->relatedReplies();
        $Comment->delete();
        return response()->json(["success" => true]);
    }

}
