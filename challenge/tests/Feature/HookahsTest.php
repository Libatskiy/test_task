<?php

namespace Tests\Feature;


use Tests\TestCase;

class HookahsTest extends TestCase
{

    public function testHookahs()
    {
        $response = $this->get('/api/v1/hookahs');
        $response->assertStatus(200);
        $response->assertSeeText('Hookah');
    }

    public function testDeleteHookahs()
    {
        $response = $this->delete('/api/v1/hookahs/1');
        $response->assertStatus(204);
    }

    public function testDeleteNonExistHookahs()
    {
        $response = $this->delete('/api/v1/hookahs/10000');
        $response->assertStatus(404);
    }

    public function testCreateHookahs()
    {
        $data = [];
        $response = $this->post('/api/v1/hookahs', $data);
        $response->assertStatus(422);

        $data = ['name' => 'BestHookah',
                 'pipe' => '4',
                 'price' => 10,
                ];
        $response = $this->post('/api/v1/hookahs', $data);
        $response->assertStatus(201);
        $response->assertSee('BestHookah');

        $data = ['name' => 'BestHookah 2'];
        $response = $this->post('/api/v1/hookahs', $data);
        $response->assertStatus(422);

    }

    public function testFindHookahs()
    {
        $response = $this->get('api/v1/hookahs/find/bar=1/from=1000/to=11800/people=7');
        $response->assertStatus(200);
    }


}
