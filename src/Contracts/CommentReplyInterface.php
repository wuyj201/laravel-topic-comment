<?php


namespace Wuyj\LaravelComment\Contracts;


use Illuminate\Database\Eloquent\Model;

interface CommentReplyInterface
{
    /**
     * @param $data
     *
     * @return Model
     */
    public function addReply($data);

    public function getCommentId();
}