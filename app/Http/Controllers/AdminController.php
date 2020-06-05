<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Controllers\BaseController as BaseController;
use App\Classify;
use App\Department;
use App\Services\ActivityService;
use App\Services\AdminService;

class AdminController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/AdminController/getClassify",
     *     tags={"API"},
     *     summary="投票類別之資料",
     *     description="投票類別之資料",
     *     operationId="getClassify",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="access_token",
     *         in="query",
     *         description="用戶授權",
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
     *         description="發生錯誤"
     *     )
     * )
     */
    public function getClassify()
    {
        $result = Classify::all();
        return $this->sendResponse($result->toArray(), 'success');
    }
    /**
     * @OA\Get(
     *     path="/AdminController/getDev",
     *     tags={"API"},
     *     summary="行政單位及教學單之資料",
     *     description="行政單位及教學單之資料",
     *     operationId="getDev",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="access_token",
     *         in="query",
     *         description="用戶授權",
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
     *         description="發生錯誤"
     *     )
     * )
     */
    public function getDev()
    {
        $result = Department::all();
        return $this->sendResponse($result->toArray(), 'success');
    }
    /**
     * @OA\Post(
     *     path="/AdminController/post",
     *     tags={"API"},
     *     summary="後臺建立投票活動接口",
     *     description="後臺建立投票活動接口",
     *     operationId="AdminController/post",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="access_token",
     *         in="query",
     *         description="用戶授權",
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
     *         description="發生錯誤"
     *     )
     * )
     */
    public function post(Request $request)
    {
        $postData = $request->all();
        // 建立投票活動者為管理員
        $postData["manager"] = "1310731047";

        $postData["signupTime"] = date('Y-m-d H:i:s');
        $adminService = new AdminService();
        $result = $adminService->post($postData);
        if ($result) $result = '資料新增成功';
        return $this->sendResponse($result, '00');
    }
    /**
     * @OA\Post(
     *     path="/AdminController/upload",
     *     tags={"API"},
     *     summary="後臺上傳檔案活動接口",
     *     description="後臺上傳檔案活動接口",
     *     operationId="/AdminController/upload",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="access_token",
     *         in="query",
     *         description="用戶授權",
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
     *         description="發生錯誤"
     *     )
     * )
     */
    public function upload()
    {
        $data = array("url" => "https://autos.yahoo.com.tw/p/r/w1200/car-trim/April2020/86f0ee25b04090de368f8202649df887.jpeg");

        // $data = array("message"=>"error");
        // $result = array("error"=>$data);
        return response()->json($data, 200);
    }
    /**
     * @OA\Get(
     *     path="/AdminController/personalActivity",
     *     tags={"API"},
     *     summary="",
     *     description="",
     *     operationId="/AdminController/upload",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="access_token",
     *         in="query",
     *         description="用戶授權",
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
     *         description="發生錯誤"
     *     )
     * )
     */
    public function personalActivity(Request $request)
    {
        $adminService = new AdminService();
        $user_id = $request->input('user_id');
        $result = $adminService->getPersonalActivity($user_id);
        if ($result) {
            return $this->sendResponse('success', '00');
        } else {
            return $this->sendResponse($result, '01');
        }
    }
}
