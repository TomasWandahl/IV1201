<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class SearchTest extends TestCase
{
    public function testSearchingComplete() {
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->withHeaders([
            'name' => 'tomas wändahl',
            'competence' => 'korvgrillning',
            'date' => '2018-04-01',
            'action' => 'from
            ',
        ])->json('get', '/searchForApplication');

        $response->assertStatus(200);

    }

    public function testSearchingWithoutName() {
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->withHeaders([
            'competence' => '',
            'date' => '',
            'action' => 'name',
        ])->json('get', '/searchForApplication');

        $response->assertStatus(200);
    }
    public function testSearchingWithoutCompetence() {
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->withHeaders([
            'name' => '',
            'date' => '',
            'action' => 'competence',
        ])->json('get', '/searchForApplication');

        $response->assertStatus(200);
    }

    public function testSearchingWithoutDate() {
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->withHeaders([
            'name' => '',
            'competence' => '',
            'action' => 'date',
        ])->json('get', '/searchForApplication');

        $response->assertStatus(200);

    }
}
