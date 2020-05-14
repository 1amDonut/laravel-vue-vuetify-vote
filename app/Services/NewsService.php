<?php

namespace App\Services;

use App\News;
use App\Comment;
use Illuminate\Support\Facades\Hash;

class NewsService
{
     public function News()
     {
          $postdata = [
               "title" => "josh1234",
               "content" => '測試',
               "account" => "root1234",
               "name" => "donut",
               "created_at" => "2020-05-04 05:39:08",
           ];
           //    return $data;
          $newComment = Comment::create($postdata);
          return Comment::select('comments.*', 'name')
            ->join('users', 'users.account', 'comments.account')
            ->find($newComment->comment_id);
          // News::create($data);
          // return News::all();
     }

     public function getNews($data)
     {
          return News::select('news.*')
               ->where('idNews', $data['account'])
               ->orderByDesc('publishTime')
               ->get();
          // ->toArray();
     }

     public function getAllData()
     {
          return News::all();
     }

     public function updateNews($data)
     {
          $news = News::find($data['idNews']);
          if ($news) {
               $news->update(['title' => $data['title'], 'detail' => $data['detail']]);
               return true;
          } else {
               return false;
          }
     }
     public function deleteCommentData($data)
     {
          $news = News::find($data['idNews']);
          if ($news) {
               $news->delete(['idNews' => $data['comment_id']]);
               return true;
          } else {
               return false;
          }
     }
}
