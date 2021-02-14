<?php

namespace App\Modules\Posts\Controllers\v1;

use App\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
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
        $this->validate(request(), [
            //put fields to be validated here
        ]);

        $topic = new Topic();
        $topic->title = $request['title'];
        $topic->description = $request['description'];

        $topic->save();
        return redirect('/data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }

    public function topic(Request $request)
    {
        $this->validate(request(), [
            //put fields to be validated here
        ]);

        $topic = new Topic();
        $topic->title = $request['title'];
        $topic->description = $request['description'];

        $topic->save();
        return response()->json(["success" => true]);
    }
    public function getTopics()
    {
       $topics=Topic::paginate(5);
        return response()->json(["success" => true, "data" => $topics]);
    }
    public function getAllTopics()
    {
       $topics=Topic::all();
        return response()->json(["success" => true, "data" => $topics]);
    }
    public function getTopicPosts($id=null)
    {
        $topic=Topic::find($id);
        $topics= $topic->posts()->paginate(5);
        return response()->json(["success" => true, "data" => $topics]);
    }

}
