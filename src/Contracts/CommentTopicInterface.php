<?php


namespace Wuyj\LaravelComment\Contracts;


use Illuminate\Database\Eloquent\Relations\MorphTo;

interface CommentTopicInterface
{
    /**
     * @return MorphTo
     */
    public function comments();
}