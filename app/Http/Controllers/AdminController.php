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
     */
    public function getClassify()
    {
        $result = Classify::all();
        return $this->sendResponse($result->toArray(), 'success');
    }
    /**
     * 取得各單位
     */
    public function getDev(){
        $result = Department::all();
        return $this->sendResponse($result->toArray(),'success');
    }
    /**
     * 送出投票項目
     * @post
     */
    public function post(Request $request)
    {
        $postData = $request->all();
        $postData["manager"] = "1310731047";
        $postData["startAnnounce"] = "2020-05-22";
        $adminService = new AdminService();
        $result = $adminService->post($postData);
        return $this->sendResponse($result, 'success');
    }
    /**
     * @get
     */
    public function upload(){
        $data = array("url"=>"https://autos.yahoo.com.tw/p/r/w1200/car-trim/April2020/86f0ee25b04090de368f8202649df887.jpeg");
        
        // $data = array("message"=>"error");
        // $result = array("error"=>$data);
        return response()->json($data,200);
    }
}
