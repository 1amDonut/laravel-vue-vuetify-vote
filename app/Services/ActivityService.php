<?php

namespace App\Services;

use App\Activity;
use Illuminate\Support\Facades\Hash;

class ActivityService
{
    public function showActivity()
    {
        return Activity::select('idActivity', 'activityName', 'startAnnounce', 'activityDescription')
            ->where('startAnnounce', '<=', date('Y-m-d H:i:s'))
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

    public function getActivity($id)
    {
        return Activity::select('activity.*')
            ->where('idActivity', $id)
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
