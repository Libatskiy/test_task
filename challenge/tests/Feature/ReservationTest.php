<?php

namespace Tests\Feature;


use App\Models\Hookah;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    public function testBooking()
    {
        $response = $this->get('api/v1/booking/active');
        $response->assertStatus(200);
    }

    public function testBookingInBar()
    {
        $response = $this->get('/api/v1/booking/active/1');
        $response->assertStatus(200);
    }



    public function testCreateReservation()
    {
        $data = [];

        $response = $this->post('api/v1/booking', $data);
        $response->assertStatus(422);

        $hookah = Hookah::find(1);
        $data = [
            "name"=> "Duncan",
            "number_people" => $hookah->pipe * 2,
            "hookah_id" => 1,
            "time_from" => 1000];


        $response = $this->post('api/v1/booking', $data);
        $response->assertStatus(201);

        $response = $this->post('api/v1/booking', $data);
        $response->assertStatus(422);

        $data = ['name' => 'BestHookah 2'];
        $response = $this->post('api/v1/booking', $data);
        $response->assertStatus(422);




    }
}
