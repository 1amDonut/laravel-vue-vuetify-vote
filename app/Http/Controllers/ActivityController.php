<?php

namespace App\Http\Controllers;

use App\http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Services\ActivityService;
use Dotenv\Validator;

class ActivityController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/getActivity",
     *     tags={"API"},
     *     summary="獲取投票活動",
     *     description="獲取投票活動",
     *     operationId="TimeShow",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="access_token",
     *         in="query",
     *         description="用户授权",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="操作成功返回"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="发生错误"
     *     )
     * )
     */
    public function getActivity()
    {
        $activityService = new ActivityService();
        $activityService->Activity();
    }
    public function showActivity()
    {
        $activityService = new ActivityService();
        $result = $activityService->showActivity();
        return $this->sendResponse($result->toArray(), 'success');
    }
    /**
     * @OA\Post(
     *     path="/updateActivityData",
     *     tags={"API"},
     *     summary="修改投票資料",
     *     description="修改投票資料",
     *     operationId="SayHello",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="access_token",
     *         in="query",
     *         description="用户授权",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="操作成功返回"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="发生错误"
     *     )
     * )
     */
    public function updateActivityData(Request $request)
    {
        $postData = $request->all();
        $objValidor = Validator::make(
            $postData,
            [
                'comment_id' => [
                    'required',
                    'integer',
                ],
                'activityName' => [
                    'required',
                ],
                'startDate' => [
                    'required'
                ],
                'endDate' => [
                    'required'
                ],
                [
                    'rule' => [
                        'required',
                        'integer',
                    ]
                ],
                'activityDescription' => [
                    'required'
                ],
                'isVisible' => [
                    'required'
                ],
                'startAnnounce' => [
                    'required'
                ],
            ],
            [
                'cid.*' => 'error',
                'activityName.required' => '請輸入活動標題內容',
                'startDate.required' => '請輸入活動開始時間',
                'endDate' => '請輸入活動結束時間',
                'activityDescription' => '請輸入活動說明'
            ]
        );

        $activityService = new ActivityService();
        $result = $activityService->Activity($postData);
    }
    public function deleteActivityData(Request $request)
    {
        $postData = $request->all();
        $activityService = new ActivityService();
        $result = $activityService->deleteActivityData($postData);
    }
}
