<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create(['nombre' => 'admin']);
        Rol::create(['nombre' => 'medico']);
        Rol::create(['nombre' => 'paciente']);
    }
}
