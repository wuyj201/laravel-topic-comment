<?php


namespace Wuyj\LaravelComment\Traits;


use Wuyj\LaravelComment\Contracts\CommentReplyInterface;
use Wuyj\LaravelComment\Contracts\CommentTopicInterface;

trait CanComment
{
    /**
     * @param CommentTopicInterface $topic
     * @param array                 $data
     *
     * @return $this|\Illuminate\Database\Eloquent\Model|CommentReplyInterface
     */
    public function addComment(CommentTopicInterface $topic, array $data)
    {
        return $topic->comments()->create(array_merge($data, [
            'creator_id'   => $this->getCommentCreatorId(),
            'creator_type' => get_class($this),
        ]));
    }

    public function addReply(CommentReplyInterface $comment, array $data)
    {
        return $comment->addReply(array_merge($data, [
            'parent_id'    => $comment->getCommentId(),
            'creator_id'   => $this->getCommentCreatorId(),
            'creator_type' => get_class($this),
        ]));
    }

    public function getCommentCreatorId()
    {
        return $this->attributes['id'];
    }
}