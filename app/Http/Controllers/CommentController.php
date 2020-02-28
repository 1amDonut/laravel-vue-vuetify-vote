<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;
use Validator;

class CommentController extends Controller
{
    public function comment(Request $request) {
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'title' => [
                    'required',
                    'between:1,20',
                ],
                'content' => [
                    'required',
                    'between:5,60',
                ],
            ],
            [
                'title.required' => '請輸入標題內容',
                'title.between' => '留言內容需介於 1-20 字元',
                'content.required' => '請輸入留言內容',
                'content.between' => '留言內容需介於 5-60 字元',
            ]
        );
        if ($objValidator->fails())
            return response()->json($objValidator->errors()->all(), 400);

        $commentService = new CommentService();
        $newComment = $commentService->comment($postData);
        return response()->json($newComment, 200);
    }
    
    public function getUserComment(Request $request) {
        $getData = $request->all();
        $objValidator = Validator::make(
            $getData,
            [
                'account' => [
                    'required',
                ]
            ],
            [
                'account.*' => 'getUserComment_error'
            ]
        );
        if ($objValidator->fails())
            return response()->json($objValidator->errors()->all(), 400);
        $commentService = new CommentService();
        $result = $commentService->getUserComment($getData);
        return response()->json($result, 200);
    }

    public function getCommentData(Request $request) {
        $postData = $request->all();
        $commentService = new CommentService();
        $result=$commentService->getCommentData($postData);
        return response()->json($result, 200);
    }

    public function updateCommentData(Request $request) {
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'comment_id' => [
                    'required',
                    'integer',
                ],
                'title' => [
                    'required',
                    'between:1,20',
                ],
                'content' => [
                    'required',
                    'between:5,60',
                ],
            ],
            [
                'cid.*' => 'error',
                'title.required' => '請輸入標題內容',
                'title.between' => '留言內容需介於 1-20 字元',
                'content.required' => '請輸入留言內容',
                'content.between' => '留言內容需介於 5-60 字元',
            ]
        );
        if ($objValidator->fails())
            return response()->json($objValidator->errors()->all(), 400);
        $commentService = new CommentService();
        $result=$commentService->updateCommentData($postData);
        return response()->json($result, 200);
    }

    public function deleteCommentData(Request $request) {
        $postData = $request->all();
        $commentService = new CommentService();
        $result=$commentService->deleteCommentData($postData);
        return response()->json($result, 200);
    }
}
