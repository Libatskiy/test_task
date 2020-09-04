<?php

namespace Tests\Feature;


use Carbon\Carbon;
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
        $carbon = Carbon::parse('2021-09-10 17:00:00');
        $response = $this->get('api/v1/hookahs/find/bar=1/from=' .
            $carbon->toDateTimeString() . '/to=' .
            $carbon->addHour(2)->toDateTimeString() . '/people=2');
        $response->assertStatus(200);
    }


}
