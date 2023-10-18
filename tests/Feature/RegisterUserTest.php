<?php

namespace Tests\Feature;

use App\Models\UserDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = factory(User::class)->create();
        $userDetails = factory(UserDetail::class)->create();
        $response = $this->actingAs()->post(route('register.user'),[
            
        ]);

        $response->assertStatus(200);
    }
}
