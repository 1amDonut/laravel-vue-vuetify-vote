<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\User;

use App\Services\UserService;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $postData = $request->all();
        return $postData;
        $objValidator = Validator::make(
            $postData,
            [
                'account' => [
                    'required',
                    'between:6,20',
                    'regex:/^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i',
                    'unique:users'
                ],
                'password' => [
                    'required',
                    'between:6,20',
                ],
                'name' => [
                    'required',
                    'max:20',
                ],
            ],
            [
                'account.required' => '請輸入帳號',
                'account.between' => '帳號需介於6-20字元',
                'account.regex' => '帳號須包含英文數字',
                'account.unique' => '帳號已存在',
                'password.required' => '請輸入密碼',
                'password.between' => '密碼需介於6-20字元',
                'name.required' => '請輸入暱稱',
                'name.max' => '暱稱不可超過20字元'
            ]
        );

        if ($objValidator->fails())
            return response()->json($objValidator->errors()->all(), 400);
        //SQL插入
        $userService = new UserService();
        $userService->register($postData);
        return response()->json("註冊成功", 200);
    }

    public function login(Request $request)
    {
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'account' => [
                    'required',
                ],
                'password' => [
                    'required',
                ],
            ],
            [
                'account.required' => '請輸入帳號密碼',
                'password.required' => '請輸入密碼',
            ]
        );
        if ($objValidator->fails())
            return response()->json($objValidator->errors()->all(), 400);
        $userService = new UserService();
        $result = $userService->login($postData);
        if (!is_string($result)) {
            $token = JWTAuth::fromUser($result);
            return response()->json($token, 200);
        } else {
            return response()->json([$result], 400);
        }
    }

    public function getUserData(Request $request)
    {
        $userData = $request->input('user');
        return response()->json($userData, 200);
    }
    public function phpinfo()
    {
        phpinfo();
        // $user = User::all();
        // return response()->json($user, 200);
    }
}
