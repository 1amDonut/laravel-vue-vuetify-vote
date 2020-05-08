<?php

namespace App\Services;

use App\User;
use App\News;
use Illuminate\Support\Facades\Hash;

class NewsService
{
     public function News($data)
     {
          return News::all();
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
