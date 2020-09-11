<?php

namespace Tests\Unit\Controllers;

use Mockery;
use Tests\TestCase;
use App\Http\Controllers\UserController;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use Faker\Factory as Faker;
use Hash;

class UserControllerTest extends TestCase
{
    protected $userController;
    protected $userMock;
    protected $faker;

    protected function setUp(): void
    {
        $this->userMock = Mockery::mock(UserRepositoryInterface::class);
        $this->userController = new UserController($this->userMock);
        parent::setUp();
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_index_function()
    {
        $result = $this->userController->index();
        $this->assertEquals('admin_pages.add_user', $result->getName());
    }

    public function test_store_function()
    {
        $this->faker = Faker::create();
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => Hash::make('password'),
            'role_id' => config('constains.is_user'),
            'status' => config('constains.show'),
        ];
        $this->userMock
            ->shouldReceive('create')
            ->once()
            ->andReturn(true);
        $request = new RegisterRequest($data);
        $result = $this->userController->store($request);
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('users'), $result->headers->get('Location'));
        $this->assertArrayHasKey('success', $result->getSession()->all());
    }

    public function test_edit_function()
    {
        $this->userMock
            ->shouldReceive('find')
            ->with(config('constains.test_user_id'))
            ->once()
            ->andReturn(true);        
        $result = $this->userController->edit(config('constains.test_user_id'));
        $data = $result->getData();
        $this->assertIsArray($data);
        $this->assertEquals('admin_pages.update_user', $result->getName());
        $this->assertArrayHasKey('user', $data);
    }

    public function test_edit_function_fail()
    {
        $this->userMock
            ->shouldReceive('find')
            ->with(config('constains.test_user_id'))
            ->once()
            ->andThrow(new ModelNotFoundException);        
        $result = $this->userController->edit(config('constains.test_user_id'));
        $data = $result->getData();
        $this->assertIsArray($data);
        $this->assertEquals('404', $result->getName());
    }

    public function test_update_function()
    {
        $this->faker = Faker::create();
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => Hash::make('password'),
        ];

        $this->userMock
            ->shouldReceive('update')
            ->once()
            ->andReturn(true);
        $request = new UpdateProfileRequest($data);
        $result = $this->userController->update($request, config('constains.test_user_id'));
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('users'), $result->headers->get('Location'));
        $this->assertArrayHasKey('success', $result->getSession()->all());
    }

    public function test_update_function_fail()
    {
        $this->faker = Faker::create();
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => Hash::make('password'),
        ];

        $this->userMock
            ->shouldReceive('update')
            ->once()
            ->andThrow(new ModelNotFoundException);
        $request = new UpdateProfileRequest($data);
        $result = $this->userController->update($request, config('constains.test_user_id'));
        $this->assertEquals('404', $result->getName());
    }
}
