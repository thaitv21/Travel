<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Role;
use App\Models\Like;

class UserTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->user);
    }

    public function test_contains_valid_fillable_properties()
    {
        $this->assertEquals([
            'name', 
            'email',
            'password',
            'avatar',
            'status',
            'role_id',
        ], $this->user->getFillable());
    }

    public function test_contains_valid_hidden_properties()
    {
        $this->assertEquals([
            'password',
            'remember_token',
        ], $this->user->getHidden());
    }

    public function test_user_has_many_comments()
    {
        $this->assertHasMany(
            Comment::class,
            'user_id',
            $this->user->comments()
        );
    }

    public function test_user_belongsTo_role()
    {
        $this->assertBelongsTo(
            Role::class,
            'role_id',
            'id',
            $this->user->role()
        );
    }

    public function test_user_has_many_posts()
    {
        $this->assertHasMany(
            Post::class,
            'user_id',
            $this->user->posts()
        );
    }

    public function test_user_has_many_likes()
    {
        $this->assertHasMany(
            Like::class,
            'user_id',
            $this->user->likes()
        );
    }
}
