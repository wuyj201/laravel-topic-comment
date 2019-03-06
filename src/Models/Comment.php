<?php

namespace Wuyj\LaravelTopicComment\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Wuyj\LaravelTopicComment\Contracts\CommentReplyInterface;

class Comment extends Model implements CommentReplyInterface
{
    protected $table = 'comments';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return MorphTo
     */
    public function creator()
    {
        return $this->morphTo('creator');
    }

    public function topic()
    {
        return $this->morphTo('topic');
    }

    /**
     * @param $data
     *
     * @return Model
     */
    public function addReply($data)
    {
        $comment = $this->replicate();
        $comment->fill($data)->save();
        return $comment;
    }

    public function getCommentId()
    {
        return $this->attributes['id'];
    }
}