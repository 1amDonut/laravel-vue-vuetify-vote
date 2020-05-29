<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Controllers\BaseController as BaseController;
use App\Classify;
use App\Department;
use App\Services\AdminService;

class AdminController extends BaseController
{
    /**
     * 取得投票類別
     * @return json
     * ex:類別 
     */
    public function getClassify()
    {
        $result = Classify::all();
        return $this->sendResponse($result->toArray(), 'success');
    }
    /**
     * 取得各單位
     * ex:校務資訊組
     * methods POST
     */
    public function getDev()
    {
        $result = Department::all();
        return $this->sendResponse($result->toArray(), 'success');
    }
    /**
     * 送出投票項目
     * methods POST
     * @return json
     */
    public function post(Request $request)
    {
        $postData = $request->all();
        // 建立投票活動者為管理員
        $postData["manager"] = "1310731047";

        // print_r($postData);
        print_r($postData["allowDesserts"]["0"]);
        // echo $postData["allowDesserts"][0];
        foreach ($postData["allowDesserts"] as $index => $item) {
            print_r($item);
        }

        return $this->sendResponse('success', 'success');
        // 建立報名時間`
        $postData["signupTime"] = date('Y-m-d H:i:s');
        $adminService = new AdminService();
        $result = $adminService->post($postData);
        if ($result) {
            echo 'true';
        } else {
            echo 'false';
        }
        return $this->sendResponse($result, 'success');
    }
    /**
     * 上傳功能
     * methods POST
     * @return json
     */
    public function upload()
    {
        $data = array("url" => "https://autos.yahoo.com.tw/p/r/w1200/car-trim/April2020/86f0ee25b04090de368f8202649df887.jpeg");

        // $data = array("message"=>"error");
        // $result = array("error"=>$data);
        return response()->json($data, 200);
    }
}
