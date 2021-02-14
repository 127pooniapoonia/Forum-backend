<?php

use Illuminate\Support\Facades\Route;

$namespace = 'App\Modules\Posts\Controllers\v1';
$guardingMiddleware = ['auth:api', 'bindings','jwt.auth'];
$prefix = 'api/v1/posts';
// Guarded Routes
Route::group(
    [
        'namespace' => $namespace,
        'prefix' => $prefix,
        'middleware' => $guardingMiddleware
    ],
    function () {
        Route::get('/getUserPost', 'PostController@getUserPosts');
//        Route::get('/getPost', 'PostController@getPosts');
        Route::post('/userPost', 'PostController@userPost');
        Route::post('/userComment', 'CommentController@userComment');
        Route::post('/userReply', 'ReplyController@userReply');
        Route::delete('/deletePost/{id}', 'PostController@deletePost');
        Route::delete('/deleteComment/{id}', 'CommentController@deleteComment');
        Route::delete('/deleteReply/{id}', 'ReplyController@deleteReply');
        Route::post('/createTopic', 'TopicController@topic');
        Route::get('/getTopics', 'TopicController@getTopics');
        Route::get('/getAllTopics', 'TopicController@getAllTopics');
        Route::get('/getPostBy/{id}', 'PostController@getPostById');
        Route::get('/getTopicPost/{id}', 'TopicController@getTopicPosts');

    }
);

// Unguarded Routes
Route::group(
    [
        'namespace' => $namespace,
        'prefix' => $prefix,
        'middleware' => ['bindings']
    ],
    function () {
        Route::get('/getPost', 'PostController@getPosts');

    }
);
