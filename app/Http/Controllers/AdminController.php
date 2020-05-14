<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Controllers\BaseController as BaseController;
use App\Classify;
class AdminController extends BaseController
{
    public function getClassify(){
        $result = Classify::all();
        return $this->sendResponse($result->toArray(),'success');
    }
}
