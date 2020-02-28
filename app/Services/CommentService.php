<?php
namespace App\Services;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Hash;

class CommentService
{
    public function comment($data) {
        $data['account'] = $data['user']->account;
        $newComment = Comment::create($data);
        return Comment::select('comments.*', 'name')
            ->join('users', 'users.account', 'comments.account')
            ->find($newComment->comment_id);
    }

    public function getUserComment($data) {
        return Comment::select('comments.*')
                ->where('account',$data['account'])
                ->orderByDesc('comment_id')
                ->get();
                // ->toArray();
    }
   
    public function getCommentData($data) {
        return Comment::where('comment_id',$data)->get();
    }
    
    public function updateCommentData($data) {
        $comment = Comment::find($data['comment_id']);
        if ($comment) {
            $comment->update(['title' => $data['title'], 'content' => $data['content']]);
            return '留言修改成功';
        } else {
            return '無此留言';
        }
    }
    public function deleteCommentData($data) {
        $comment = Comment::find($data['comment_id']);
        if ($comment) {
            $comment->delete(['comment_id' => $data['comment_id']]);
            return '留言刪除成功';
        } else {
            return '無此留言';
        }
    }
}