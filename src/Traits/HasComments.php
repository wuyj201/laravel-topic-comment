<?php


namespace Wuyj\LaravelTopicComment\Traits;


trait HasComments
{
    public function comments()
    {
        return $this->morphMany(config('laravel-topic-comment.model'), 'topic');
    }
}