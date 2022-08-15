<?php

namespace Database\Seeders;

use App\Models\Questionnaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionnairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Questionnaire::create([
            'name' => 'Upitnik #1',
            'type' => 'OM',
            'target_group' => 'M',
        ]);
        Questionnaire::create([
            'name' => 'Upitnik #2',
            'type' => 'OM',
            'target_group' => 'Ž',
        ]);
    }
}
