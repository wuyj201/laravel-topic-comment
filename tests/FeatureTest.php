<?php

namespace Tests;


use Illuminate\Database\Eloquent\Model;
use Wuyj\LaravelComment\Contracts\CommentTopicInterface;
use Wuyj\LaravelComment\Models\Comment;
use Wuyj\LaravelComment\Traits\CanComment;
use Wuyj\LaravelComment\Traits\HasComments;

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
        $comment = $user->addComment($book, [
            'title' => 'title',
            'content' => 'content'
        ]);
        $user = new User(['name' => 'user_r']);
        $user->save();
        $comment = $user->addReply($comment, [
            'title' => 'title_reply',
            'content' => 'content_reply'
        ]);
        $this->assertInstanceOf(Comment::class, $comment);
        $comments = $book->comments()->get();
        $this->assertCount(2, $comments);
    }
}

/**
 * Class User.
 */
class User extends Model
{
    use CanComment;

    protected $fillable = ['name'];
}

/**
 * Class User.
 */
class Book extends Model implements CommentTopicInterface
{
    use HasComments;

    protected $fillable = ['name'];
}
