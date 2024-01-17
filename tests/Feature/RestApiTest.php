<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Part;
use App\Models\Product;
use App\Models\User;
use App\Models\Winning;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_winnings_get(): void
    {
        $response = $this->get('/api/winnings');
        $response->assertStatus(200);
    }

    public function test_part_delete(): void
    {
        // migrate:fresh előtte és működik, de mivel feljebb tettem a test_winning_posttól ezért működik mindenhogy

        $this->post('/api/parts', ['name' => 'TörölniKell']);
        $response = $this->delete('/api/parts/2');
        $response->assertStatus(200);
    }

    public function test_winning_post(): void
    {
        // enélkül nem megy a teszt :D, mert kitörli a factoryval létrehozott adatokat előtte
        $this->seed(DatabaseSeeder::class);

        $response = $this->post('/api/winnings', [
            'user_id' => 1,
            'brand_id' => 5,
            'part_id' => 6,
            'product_id' => 1,
            'date' => '2024-01-17'
        ]);
        $response->assertStatus(200);
    }


    public function test_user_id_auth(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/api/users/' . $user->id);
        $response->assertStatus(200);
    }

    public function test_part_update(): void
    {

        $response = $this->put('api/parts/1', ['name' => 'Fakanál']);
        $response->assertStatus(200);
    }
}
