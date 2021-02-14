<?php

namespace App\Modules\Posts\Controllers\v1;

use App\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReplyController extends Controller
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

        $replies= new reply();
        $replies->user_id= $request['user_id'];
        $replies->post_id = $request['post_id'];
        $replies->comment_id = $request['comment_id'];
        $replies->description = $request['comment'];

        $replies->save();
        return redirect('/data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $Reply = Reply::find(id);
        $Reply->delete();
        return redirect('/data');
    }

    public function userReply(Request $request)
    {
        $this->validate(request(),[
            //put fields to be validated here
        ]);

        $replies= new reply();
        $replies->user_id= $request['user_id'];
        $replies->post_id = $request['post_id'];
        $replies->comment_id = $request['comment_id'];
        $replies->description = $request['comment'];

        $replies->save();
        return response()->json(["success" => true]);
    }
    public function deleteReply(Reply $reply, $id=null)
    {
        $Reply = Reply::find($id);
        $Reply->delete();
        return response()->json(["success" => true]);
    }
}
