<?php

namespace Wuyj\LaravelComment;


use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishMigration();

        $this->publishes([
            __DIR__ . '/../config/laravel-comment.php' => config_path('laravel-comment.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/config/laravel-comment.php', 'laravel-comment'
        );
    }

    private function publishMigration()
    {
        $filePath = __DIR__ . '/../database/migrations/2019_03_06_010203_create_comments_table.php';
        $this->publishes([
            $filePath => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_comments_table.php'),
        ], 'migrations');
    }
}