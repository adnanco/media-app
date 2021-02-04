<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;


class PersonTest extends TestCase
{

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_login_with_person_list()
    {


    }
}
