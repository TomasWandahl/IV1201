<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class CompetenciesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    // This test tests if the form-input for uploading competencies handles that the assigned yearsOfExp is ¨
    // an String instead of an Int. If return is 200, everything works fine.
    public function testAddingCompetenceWithStringAsNumber()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->withHeaders([
            'comp' => 'Lorem',
            'yearsOfExp' => 'Ipsum',
            'compDesc' => 'Dolor',
            'action' => 'add',
        ])->json('get', '/uploadCompetenceProfile');

        $response->assertStatus(200);
    }

    public function testAddingGoodCompetence()
    {
        $user = factory(User::class)->create(['name' => 'pizzamuncher' ]);

        $response = $this->actingAs($user)->withHeaders([
            'comp' => 'Lorem',
            'yearsOfExp' => 12,
            'compDesc' => 'Dolor',
            'action' => 'add',
        ])->json('get', '/uploadCompetenceProfile');

        $response->assertStatus(200);

    /** 
        $response->assertStatus(200)->assertDatabaseHas('competenceprofiles', [
            'competenceDesc' => 'Dolor',
            'yearsOfExperience' => 12,
            'username' => 'pizzamuncher',
            'competence' => 'Lorem'
        ]); */
    }

    public function testAddingEmptyCompetence()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->withHeaders([
            'yearsOfExp' => '',
            'compDesc' => '',
            'action' => '',
        ])->json('get', '/uploadCompetenceProfile');

        $response->assertStatus(200);
    }

    public function testAddingPartiallyEmptyCompetence()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->withHeaders([
            'yearsOfExp' => 12,
            'action' => 'add',
        ])->json('get', '/uploadCompetenceProfile');

        $response->assertStatus(200);
    }

    public function testAddingCompetenceWithIntInsteadOfString()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->withHeaders([
            'comp' => 12,
            'yearsOfExp' => 12,
            'compDesc' => '',
            'action' => 'add',
        ])->json('get', '/uploadCompetenceProfile');

        $response->assertStatus(200);
    }
}
