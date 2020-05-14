<?php

namespace App\Http\Controllers;

use App\http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Services\ActivityService;
use Dotenv\Validator;

class ActivityController extends BaseController
{
    public function getActivity()
    {
        $activityService = new ActivityService();
        $activityService->Activity();
    }
    public function showActivity()
    {
        $activityService = new ActivityService();
        $result = $activityService->showActivity();
        return $this->sendResponse($result->toArray(),'success');
    }
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
