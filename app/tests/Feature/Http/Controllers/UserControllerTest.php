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


    /**
     * @dataProvider dataProviderUsers
     */
    public function test_should_return_sintaxe($name, $alias)
    {
        $user = User::factory()->create([
            'name' => $name
        ]);

        $response = $this->get("/api/profile/{$user->id}");
        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => $user->id,
                'name' => $name,
                'alias' => $alias
            ]);
    }

    public function dataProviderUsers(): array {
        return [
            ['Everaldo da Costa Filho', 'Everaldo'],
            ['Lucas Almeida', 'Lucas'],
            ['Amanda Almeida', 'Amanda'],
            [' Joãozinho da Silva', 'Joãozinho'],
            [' Joãozinho  da Silva', 'Joãozinho'],
            [' joãozinho da Silva', 'Joãozinho'],
            [' Maria vitoria de Alencar', 'Maria Vitoria'],
        ];
    }
}
