<?php

namespace Tests\Unit\Http\Controllers;

use App\Models\User;
use Tests\TestCase as TestsTestCase;

class UserControllerTest extends TestsTestCase
{
    public function test_should_return_code_200()
    {
        $user = User::factory()->create();

        $response = $this->get("/api/profile/{$user->id}");
        $response->assertStatus(200);
    }

    public function test_should_return_code_404()
    {
        $response = $this->get("/api/profile/-1");
        $response->assertStatus(404);
    }

    public function test_should_return_sintaxe()
    {
        $user = User::factory()->create([
            'name' => "Bruno Oliveira"
        ]);

        $response = $this->get("/api/profile/{$user->id}");
        $response
            ->assertStatus(200)
            ->assertJson([
                'name' => "Bruno Oliveira",
                'alias' => "Bruno"
            ]);
    }
}
