<?php

namespace Wuyj\LaravelComment\Models;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'parent_id',
        'title',
        'content',
        'related_id',
        'related_type',
    ];

    public function title($title)
    {
        if ($title) {
            $this->attributes['title'] = $title;
        }
        return $this;
    }

    public function content($content)
    {
        if ($content) {
            $this->attributes['content'] = $content;
        }
        return $this;
    }

    public function related($related_type, $related_id)
    {
        $this->attributes['related_type'] = $related_type;
        $this->attributes['related_id'] = $related_id;
        return $this;
    }

    public function comment($title, $content)
    {
        $this->attributes['title'] = $title;
        $this->attributes['content'] = $content;
        return $this;
    }

    public function reply($title, $content)
    {
        $this->attributes['title'] = $title;
        $this->attributes['content'] = $content;
        return $this;
    }
}