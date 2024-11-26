<?php

namespace Tests\Feature;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery\MockInterface;
use Tests\TestCase;

class UserTest extends TestCase
{
    //    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = \Faker\Factory::create();

        $this->admin = User::factory()->create([
            'role' => 'admin',
        ]);
    }

    protected function tearDown(): void
    {
        User::query()->forceDelete();
        parent::tearDown();
    }

    public function adminAccountRoute(): string
    {
        return route('systems.admin-account-get');
    }

    public function adminChangePasswordRoute($user): string
    {
        return route('systems.admin-change-password-post', $user);
    }

    public function test_admin_can_access_admin_account_page()
    {
        $this
            ->actingAs($this->admin)
            ->get($this->adminAccountRoute())
            ->assertViewIs('admin-setting.update');
    }

    public function test_admin_can_change_password_admin()
    {
        $password = '12345678';
        $this
            ->followingRedirects()
            ->actingAs($this->admin)
            ->from($this->adminAccountRoute())
            ->post($this->adminChangePasswordRoute($this->admin), [
                'password' => $password,
                'password_confirmation' => $password,
            ])
            ->assertSuccessful();
    }

    public function test_admin_cannot_change_password_when_throw_exception()
    {
        $this->mock(UserRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('updatePassword')->andReturnFalse();
        });
        $password = '12345678';
        $this
            ->followingRedirects()
            ->actingAs($this->admin)
            ->from($this->adminAccountRoute())
            ->post($this->adminChangePasswordRoute($this->admin), [
                'password' => $password,
                'password_confirmation' => $password,
            ])
            ->assertSuccessful();
    }
}
