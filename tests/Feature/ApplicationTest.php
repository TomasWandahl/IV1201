<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ApplicationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    public function testAddingApplicationWithoutDates()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->withHeaders([
            'action' => 'upload',
        ])->json('get', '/uploadCompetenceProfile');

        $response->assertStatus(200);
    }

    public function testAddingApplicationWithOnlyOneDate() {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->withHeaders([
            'from' => '2018-03-01',
            'action' => 'upload',
        ])->json('get', '/uploadCompetenceProfile');

        $response->assertStatus(200);

    }

    public function testAddingCompleteApplication() {
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->withHeaders([
            'from' => '2018-03-01',
            'to' => '2018-04-01',
            'action' => 'upload',
        ])->json('get', '/uploadCompetenceProfile');

        $response->assertStatus(200);

    }
}
