<?php

namespace Tests\Feature;

use App\Models\UserDetail;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    public function testHttp () : void
    {
        $response = $this->get(route("/api/register/detailUser"));
        $response->assertStatus(200);
    }

    public function test_can_register_user_detail_success(): void
    {
        if (! Features::enabled(Features::registration())) {
            $this->markTestSkipped('Registration support is not enabled.');

            return;
        }

        $response = $this->post('/api/register/detailUser', [
            'user_identity' => '123123123',
            'date_birth' => 1999-03-00,
            'place_birth' => '123123',
            'address_home' => 'pasasdasdsword',
            'province' => 'asdasd',
            'city' => 'sdasd',
            'district' => 'sdasd',
            'phone_number' => '123123',
            'mother_maiden' => 'sdasd',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
