<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::group(['middleware' => 'jwtAuth'], function () {
    // RESTful 
    /**
     * 公佈欄
     */
    Route::group(['prefix'=>'news'],function(){
        Route::get('getNewsData','NewsController@news');
        Route::post('comment', 'NewsController@comment');
        Route::PUT('updateNews', 'NewsController@updateCommentData');
        Route::DELETE('deleteNews', 'NewsController@deleteCommentData');
    });
    /**
     * 投票活動
     */
    Route::group(['prefix'=>'activity'],function(){
        Route::get('show','ActivityController@showActivity');
        Route::get('getActivityData','ActivityController@getCommentData');
        Route::PUT('updateActivity', 'ActivityController@updateActivityData');
        Route::DELETE('deleteActivity', 'ActivityController@deleteActivityData');
    });
    
    Route::get('getUserData', 'UserController@getUserData');
    Route::get('getUserComment', 'CommentController@getUserComment');
    Route::get('getCommentData','CommentController@getCommentData');
    Route::post('comment', 'CommentController@comment');
    Route::PUT('updateCommentData', 'commentController@updateCommentData');
    Route::DELETE('deleteCommentData', 'commentController@deleteCommentData');
    
});