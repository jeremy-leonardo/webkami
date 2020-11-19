<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('education_levels')->insert([
            [
                'name' => 'SD',
            ],
            [
                'name' => 'SMP',
            ],
            [
                'name' => 'SMA/SMK atau sederajat',
            ],
            [
                'name' => 'S1',
            ],
            [
                'name' => 'S2',
            ],
        ]);
    }
}
