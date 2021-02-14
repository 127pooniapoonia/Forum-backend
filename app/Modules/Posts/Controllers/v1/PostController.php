<?php

namespace App\Modules\Posts\Controllers\v1;

use App\Post;
use App\Comment;
use App\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
//        dd($posts ->toArray());
        return view('home', ['post' => $posts]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate(request(), [
            //put fields to be validated here
        ]);

        $posts = new post();
        $posts->user_id = $request['userId'];
        $posts->topic_id = $request['topic_id'];
        $posts->description = $request['comment'];

        $posts->save();
        return redirect('/data');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $Post = Post::find($post);
        $Post->Post::delete();
        return redirect('/data');
    }

    public function getPosts()
    {
        $posts = Post::orderBy("id",'desc')->paginate(8);
        return response()->json(["success" => true, "data" => $posts]);
    }

    public function getUserPosts()
    {
        $user = Auth::user();
        $posts = $user->post()->orderBy("id",'desc')->get();
        return response()->json(["success" => true, "data" => $posts]);
    }
    public function userPost(Request $request)
    {
        $this->validate(request(), [
            //put fields to be validated here
        ]);

        $posts = new post();
        $posts->user_id = $request['user_id'];
        $posts->description = $request['description'];
        $posts->topic_id = $request['topic_id'];
        $posts->save();
        return response()->json(["success" => true]);

    }
    public function deletePost(post $post, $id=null)
    {
        $Post = Post::find($id);
        $Post->relatedData();
        $Post->delete();
        return response()->json(["success" => true]);
    }

    public function getPostById(post $post, $id=null)
    {
        $Post = Post::find($id);
        $Post->get();
//        dd($Post);
        return response()->json(["success" => true,"data" => $Post]);
    }

}
