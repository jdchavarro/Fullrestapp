<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\Rol;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase {
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered() {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register() {

        $rol = Rol::factory()->create();
        $employee = Employee::factory()->create();

        $response = $this->post('/register', [
            'username' => 'TestUser',
            'password' => 'password',
            'password_confirmation' => 'password',
            'rol_id' => $rol->id,
            'employee_id' => $employee->id
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
