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

// Route::group(['middleware' => ['jwtAuth','cors']], function () {
Route::group(['middleware' => ['cors']], function () {
    // RESTful 
    /**
     * 公佈欄
     */
    Route::group(['prefix' => 'news'], function () {
        Route::get('getNewsData', 'NewsController@news');
        Route::post('comment', 'NewsController@comment');
        Route::PUT('updateNews', 'NewsController@updateCommentData');
        Route::DELETE('deleteNews', 'NewsController@deleteCommentData');
    });
    /**
     * 投票活動
     */
    Route::group(['prefix' => 'activity'], function () {
        Route::get('show', 'ActivityController@showActivity');
        Route::post('getActivity', 'ActivityController@getActivityDetail');
        Route::get('get_Ticket','ActivityController@getTicket');
        Route::PUT('updateActivity', 'ActivityController@updateActivityData');
        Route::DELETE('deleteActivity', 'ActivityController@deleteActivityData');
    });
    /**
     * 後臺管理
     */
    Route::group(['prefix' => 'admin'], function () {
        Route::get('getClassify', 'AdminController@getClassify');
        Route::get('getDepartment', 'AdminController@getDev');
        Route::post('post', 'AdminController@post');
        Route::post('getPersonalData','AdminController@');
        Route::post('upload', 'AdminController@upload');
    });
});
