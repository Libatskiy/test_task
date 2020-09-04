<?php

namespace Tests\Feature;


use Tests\TestCase;

class RelationTest extends TestCase
{
    public function testDeleteHookahBars()
    {
        $response = $this->delete('/api/v1/hookah-in-bar/1');
        $response->assertStatus(204);
    }

}
