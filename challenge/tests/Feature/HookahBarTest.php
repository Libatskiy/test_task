<?php

namespace Tests\Feature;


use Tests\TestCase;

class HookahBarTest extends TestCase
{
    public function testHookahBars()
    {
        $response = $this->get('/api/v1/bars');
        $response->assertStatus(200);
        $response->assertSee('First');
    }

    public function testDeleteHookahBars()
    {
        $response = $this->delete('/api/v1/bars/1');
        $response->assertStatus(204);
    }

    public function testCreateHookahBars()
    {
        $data = [];
        $response = $this->post('/api/v1/bars', $data);
        $response->assertStatus(422);

        $data = ['name' => 'Best Hookah Bar'];
        $response = $this->post('/api/v1/bars', $data);
        $response->assertStatus(201);
        $response->assertSee('Bar');

        $data = ['name' => 'Best Hookah Bar'];
        $response = $this->post('/api/v1/bars', $data);
        $response->assertStatus(422);

    }
}
