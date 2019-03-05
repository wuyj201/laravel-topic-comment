<?php

namespace Tests;


use Illuminate\Database\Eloquent\Model;
use Wuyj\LaravelComment\Traits\CanComment;

/**
 * Class FeatureTest.
 */
class FeatureTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function setUp()
    {
        parent::setUp();
    }

    public function testBasicFeatures()
    {
        $user = new User(['name' => 'user_1']);
        $user->save();
        $book = new Book(['name' => 'book_1']);
        $book->save();
        $user->related(Book::class, $book->id)
            ->comment('title', 'content')
            ->save();
    }
}

/**
 * Class User.
 */
class User extends Model
{
    use CanComment;

    protected $fillable = ['title'];
}

/**
 * Class User.
 */
class Book extends Model
{
    protected $fillable = ['title'];
}
