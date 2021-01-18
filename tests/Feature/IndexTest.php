<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase {

    public function test_index_screen_can_be_rendered() {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
