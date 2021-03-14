<?php

namespace Tests\Feature;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PermissionTest extends TestCase {
    use RefreshDatabase;

    public function logIn() {
        Auth::login(User::factory()->create());
    }

    public function test_index_screen_can_be_rendered() {

        //$this->withoutExceptionHandling();

        $this->logIn();
        $response = $this->get('/permissions');

        $response->assertStatus(200);
    }

    public function test_display_a_list_of_permissions() {
        $permission1 = Permission::factory()->create();
        $permission2 = Permission::factory()->create();

        $this->logIn();

        $this->get('/permissions')
            ->assertOk()
            ->assertSee($permission1->type)
            ->assertSee($permission2->type);
    }

    public function test_creation_form_can_be_rendered() {
        $this->logIn();

        $this->get('/permissions/create')
            ->assertOk();
    }
}
