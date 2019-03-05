<?php


namespace Wuyj\LaravelComment\Traits;


use Wuyj\LaravelComment\Models\Comment;

trait CanComment
{
    public function related($related_type, $related_id)
    {
        $comment = new Comment();
        return $comment->related($related_type, $related_id);
    }
}