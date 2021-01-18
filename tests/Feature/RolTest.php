<?php

namespace Tests\Feature;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RolTest extends TestCase {
    use RefreshDatabase;

    public function logIn() {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
    }

    public function test_display_a_listing_of_rols() {

        $rol1 = Rol::factory()->create();
        $rol2 = Rol::factory()->create();

        $this->logIn();

        $this->get('/rols')
            ->assertOk()
            ->assertSee($rol1->name)
            ->assertSee($rol2->name);
    }

    public function test_creation_form_can_be_rendered() {
        $this->logIn();

        $this->get('/rols/create')
            ->assertOk();
    }

    public function test_get_rol_by_id() {
        $rol = Rol::factory()->create();

        $this->logIn();

        $this->get(sprintf('/rols/%s', $rol->id))
            ->assertSee($rol->name);
    }

    public function test_store_new_rol() {

        $this->logIn();

        $response = $this->post('/rols', [
            'name' => 'TestRol',
            'permissions' => 'test permisision',
        ]);

        $this->get('/rols')
            ->assertSee('TestRol');

        $response->assertRedirect('/rols');
    }

    public function test_edit_form_can_be_rendered() {
        $rol = Rol::factory()->create();

        $this->logIn();

        $this->get(sprintf('/rols/%s/edit', $rol->id))
            ->assertOk()
            ->assertSee($rol->name);
    }

    public function test_edit_exist_rol() {
        $rol = Rol::factory()->create();

        $this->logIn();

        $response = $this->put(sprintf('/rols/%s', $rol->id), [
            'name' => 'TestRolEdited',
            'permissions' => $rol->permissions,
        ]);

        $this->get('/rols')
            ->assertSee('TestRolEdited');

        $response->assertRedirect('/rols');
    }

    public function test_delete_rol() {
        $rol = Rol::factory()->create();

        $this->logIn();

        $response = $this->delete(sprintf('/rols/%s', $rol->id));

        $this->get('/rols')
            ->assertDontSee($rol->name);

        $response->assertRedirect('/rols');
    }
}
