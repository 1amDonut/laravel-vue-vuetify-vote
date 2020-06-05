<?php

namespace App\Services;
// import model
// 投票活動資料表
use App\Activity;
use App\Comment;
// 投票候選人資料表
use App\Candidate;
// 參加投票資料表
use App\Participants;
use Exception;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    public function post($postdata)
    {
        // 捕獲了異常回傳Mysql Error訊息
        try {
            /**
             *  ::create = > INSERT INTO
             * INSERT INTO Activity 
             *  */
            $newActivity = Activity::create($postdata);
            // Find Activity table column idActivity
            // $idActivity = Activity::select('idActivity')->find($newActivity->idActivity);
        } catch (Exception $e) {
            return $e;
        }

        // 捕獲了異常回傳Mysql Error訊息
        try {
            // 新增參加投票名單至資料庫
            foreach ($postdata["allowDesserts"] as $index => $item) {
                // INSERT INTO Participate Then get Activity->idActivity
                $item["idActivity"] = $newActivity->idActivity;
                $newParticipants = Participants::create($item);
            }
        } catch (Exception $e) {
            return $e;
        }


        return true;
    }
    public function showActivity()
    {
        return Activity::select('activityName', 'startAnnounce', 'activityDescription')
            ->orderByDesc('startAnnounce')
            ->get();
    }
    public function Activity()
    {
        $postdata = [
            "title" => "josh1234",
            "content" => '測試',
            "account" => "root1234",
            "name" => "donut",
            "created_at" => "2020-05-04 05:39:08",
        ];
        //    return $data;
        $newComment = Activity::create($postdata);
        return Activity::select('comments.*', 'name')
            ->join('users', 'users.account', 'comments.account')
            ->find($newComment->comment_id);
    }

    public function getActivity($data)
    {
        return Activity::select('activity.*')
            ->where('idActivity', $data['id'])
            ->get();
        // ->toArray();
    }

    public function getAllData()
    {
        return Activity::all();
    }

    public function updateActivity($data)
    {
        $news = Activity::find($data['idNews']);
        if ($news) {
            $news->update(['title' => $data['title'], 'detail' => $data['detail']]);
            return true;
        } else {
            return false;
        }
    }
    public function deleteActivityData($data)
    {
        $news = Activity::find($data['idNews']);
        if ($news) {
            $news->delete(['idNews' => $data['comment_id']]);
            return true;
        } else {
            return false;
        }
    }
    /**
     * @OA\Get(
     *     path="/Activity/getPersonalActivity",
     *     tags={"API"},
     *     summary="檢視管理者自行建立投票",
     *     description="檢視管理者自行建立投票",
     *     operationId="getPersonalActivity",
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
    public function getPersonalActivity()
    {
        return Activity::select('activityName', 'startAnnounce', 'activityDescription')
            ->where('startAnnounce', '<=', date('Y-m-d H:i:s'))
            ->orderByDesc('startAnnounce')
            ->get();
    }
}
