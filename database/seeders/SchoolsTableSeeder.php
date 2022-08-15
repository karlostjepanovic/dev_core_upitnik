<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
            'name' => 'Testna škola CORE',
            'address' => 'Borisa Papandopula 1',
            'place' => 'Sesvete',
            'oib' => '12385245691',
            'supervisor_id' => 1,
        ]);
    }
}
