<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Cargo;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = Area::create([
            'nombre' => 'Administración',
        ]);
        $cargo = Cargo::create([
            'nombre' => 'Administrador',
        ]);
        $usuario = Usuario::create([
            'nombre' => 'Administrador',
            'apellido' => 'Administrador',
            'area_id' => $area->id,
            'cargo_id' => $cargo->id,
            'ci' => '00000000',
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@material.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'usuario_id' => $usuario->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
