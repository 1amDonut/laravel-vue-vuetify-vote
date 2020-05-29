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
        $idActivity = "";
        // try {
        //     $newActivity = Activity::create($postdata);
        //     // Find Activity table column idActivity
        //     // $idActivity = Activity::select('idActivity')->find($newActivity->idActivity);
        // } catch (Exception $e) {
        //     return $e;
        // }

        // INSERT INTO Participate Then get Activity->idActivity
        // $postdata["desserts"]["idActivity"] = $newActivity->idActivity;
        try {
            // 新增參加投票名單至資料庫
            foreach ($postdata["allowDesserts"] as $item => $index) {
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
}
