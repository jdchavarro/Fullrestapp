<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        /* DB::table('users')->insert([
            'username' => "jd",
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'rol_id' => Rol::factory(),
            'employee_id' => Employee::factory(),
        ]); */
        user::factory()->create([
            'username' => "jd",
            'password' => Hash::make('password'),
        ]);

        User::factory()->count(2)->create();
        //Rol::factory()->count(3)->create();
        //Employee::factory()->count(2)->create();
    }
}
