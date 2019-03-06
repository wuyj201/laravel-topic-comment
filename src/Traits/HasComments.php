<?php


namespace Wuyj\LaravelComment\Traits;


trait HasComments
{
    public function comments()
    {
        return $this->morphMany(config('laravel-comment.model'), 'topic');
    }
}